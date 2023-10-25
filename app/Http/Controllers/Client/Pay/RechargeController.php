<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{
    function Recharge()
    {
        return view('client.pages.Pay');
    }
    function Pay(Request $request)
    {
        // dd($request->all());
        // check phương thức thanh toán nào sau đó mới đẩy đi controller xử lý
        if ($request['payments'] == 2) {
            return redirect()->route('vnpay-payment');
        }
        // $price = $request->input('price');
        // return view('client.pages.PayMomo', ['price'=>$price]);
    }
    public function vnpayPayment(Request $request)
    {
        if ($request['payments'] == 2) {
            //    dd($request->all());
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('vnpay-success');
            $vnp_TmnCode = "CAL4BV81"; //Mã website tại VNPAY
            $vnp_HashSecret = "VJMBKWWRRCWMVNQHRLSLPDSRQSSNTOAV"; //Chuỗi bí mật

            $vnp_TxnRef = uniqid(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = $vnp_TxnRef; // thanh toán đơn hàng, trạng thái
            $vnp_OrderType = "online";
            $vnp_Amount = $request['price'] * 100; // lấy ở form về * 100 => ra tiền đúng, in vào DB thì /100
            $vnp_Locale = "VN";
            $vnp_BankCode = $request['bank_code'];
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($request['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
        else{
            return redirect()->back()->with('error', 'Vui vòng chọn phương thúc thanh toán VnPay.');
        }
    }
    public function vnpaySuccess(Request $request)
    {
        $this->storeTransaction($request);
        // dd($request);
        return redirect()->route('account');
    }
    public function storeTransaction(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->wallet += $request['vnp_Amount'] / 100;
        // dd($user);
        $user->save();

        // model transaction méo thấy đâu luôn u là trời
        $transaction = new Transaction();
        $transaction->id_category_transaction = 1;
        $transaction->id_user = Auth::user()->id;
        $transaction->price = $request['vnp_Amount'] / 100;
        $transaction->status = 1;
        $transaction->surplus = $user->wallet;
        $transaction->content = "Giao dịch thành công";
        // dd($user, $transaction);
        $transaction->save();
    }
}