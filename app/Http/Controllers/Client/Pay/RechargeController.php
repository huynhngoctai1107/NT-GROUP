<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Client\Pay\PaypalController;

class RechargeController extends Controller{

    public $paypal;

    public function __construct(){
        $this->paypal = new PaypalController();

    }

    public function PaymentMethod(Request $request){

        if ($request->payments == 1){
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_Url        = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl  = route('vnpay-success');
            $vnp_TmnCode    = "CAL4BV81"; //Mã website tại VNPAY
            $vnp_HashSecret = "VJMBKWWRRCWMVNQHRLSLPDSRQSSNTOAV"; //Chuỗi bí mật

            $vnp_TxnRef    = uniqid(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = $vnp_TxnRef; // thanh toán đơn hàng, trạng thái
            $vnp_OrderType = "online";
            $price = str_replace(['.', ','], '', $request['price']);
            $vnp_Amount    = $price * 100; // lấy ở form về * 100 => ra tiền đúng, in vào DB thì /100
            $vnp_Locale    = "VN";
            $vnp_BankCode  = $request['bank_code'];
            $vnp_IpAddr    = $_SERVER['REMOTE_ADDR'];

            $inputData = [
                "vnp_Version"    => "2.1.0",
                "vnp_TmnCode"    => $vnp_TmnCode,
                "vnp_Amount"     => $vnp_Amount,
                "vnp_Command"    => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode"   => "VND",
                "vnp_IpAddr"     => $vnp_IpAddr,
                "vnp_Locale"     => $vnp_Locale,
                "vnp_OrderInfo"  => $vnp_OrderInfo,
                "vnp_OrderType"  => $vnp_OrderType,
                "vnp_ReturnUrl"  => $vnp_Returnurl,
                "vnp_TxnRef"     => $vnp_TxnRef
            ];

            if (isset($vnp_BankCode) && $vnp_BankCode != ""){
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != ""){
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query    = "";
            $i        = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value){
                if ($i == 1){
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                }else{
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i        = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)){
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url       .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = [
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            ];
            if (isset($request['redirect'])){
                header('Location: ' . $vnp_Url);
                die();
            }else{
                echo json_encode($returnData);
            }
        }elseif ($request->payments == 2){
            return $this->paypal->paypalPayment($request);
        }else{
            return redirect()
                ->back()
                ->with(['error' => 'Vui vòng chọn phương thúc thanh toán VnPay.', 'active' => 'payment']);
        }
    }

    public function vnpaySuccess(Request $request){

        $user         = User::findOrFail(Auth::user()->id);
        $user->wallet += $request['vnp_Amount'] / 100;
        $user->save();
        $transaction                          = new Transaction();
        $transaction->id_category_transaction = 1;
        $transaction->id_user                 = Auth::user()->id;
        $transaction->id_method               = 1;
        $transaction->price                   = $request['vnp_Amount'] / 100;
        $transaction->status                  = 1;
        $transaction->surplus                 = $user->wallet;
        $transaction->content                 = "Giao dịch thành công";
        $transaction->save();
        session()->forget('method');

        return redirect()
            ->route('account')
            ->with(['success' => 'Nạp tiền vào tài khoản thành công.', 'active' => 'payment']);
    }

}
