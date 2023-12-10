<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\User;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaypalController extends Controller{

    public $paypal;
    public $transaction;

    public function __construct(){
        $this->paypal      = new PayPalClient();
        $this->transaction = new Transaction();
    }

    function paypalPayment(Request $request){

        $request->session()->forget('paypal');
        $price = str_replace(['.', ','], '', $request->price);
        $values = [
            'id_user'                 => Auth::user()->id,
            'id_category_transaction' => 1,
            'id_method'               => $request->payments,
            'price'                   => $price,
            'surplus'                 => Auth::user()->wallet + $price,
            'status'                  => 1,
            'created_at'              => date('Y-m-d'),
            'content'                 => "Giao dịch thành công",
        ];

        session()->push('paypal', $values);

        $usd = (round($price / 24580, 2));

        $this->paypal->setApiCredentials(config('paypal'));
        $paypalToken = $this->paypal->getAccessToken();
        $response    = $this->paypal->createOrder([

            "intent"              => "CAPTURE",
            "application_context" => [
                "return_url" => route('paypal_success'),
                "cancel_url" => route('paypal_canel')
            ],
            "purchase_units"      => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value"         => $usd
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && !empty($response['id'])){
            foreach ($response['links'] as $link){
                if ($link['rel'] === 'approve'){
                    return Redirect()->away($link['href']);
                }
            }
        }
    }

    function paypalSuccess(Request $request){
        $paypalToken = $this->paypal->getAccessToken();
        $this->paypal->setApiCredentials(config('paypal'));
        $response = $this->paypal->capturePaymentOrder($request->token);
        if (isset($response['error'])){
            return Redirect()
                ->route('error')
                ->with('error',
                    "Phiên bản đã hết hạn"); //404
        }else{
            $this->transaction->addTransaction($request->session()->get('paypal'));

            $user         = User::find($request->session()->get('paypal')[0]['id_user']);
            $user->wallet = $request->session()->get('paypal')[0]['surplus'];
            $user->save();
            session()->forget('paypal');

            return Redirect()
                ->route('account')
                ->with(['success' => 'Nạp tiền vào ví thành công', 'active' => 'payment']);


        }
    }

    function paypalCanel(){
        session()->forget('paypal');

        return Redirect()
            ->route('error')
            ->with('error',
                "Thanh toán không hợp lệ. Xin vui lòng thử lại"); //404
    }

}
