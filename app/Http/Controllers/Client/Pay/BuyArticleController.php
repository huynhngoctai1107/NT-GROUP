<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Voucher;


class BuyArticleController extends Controller{

    public $post;
    public $voucher;

    public $transaction;
        public $price = 50000 ;

    public function __construct(){

        $this->post        = new Post();
        $this->voucher     = new Voucher();
        $this->transaction = new Transaction();
    }

    function buyVipNew($slug){

        $condition = [
            'posts.slug' => $slug
        ];
        $post      = $this->post->firstPost($condition);

        if ($post->id_user == auth()->user()->id){
            if (Auth::user()->wallet >= $this->price){
                if ($post->featured_news == 0 && $post->delete_posts == 0){

                    return view('client.pages.buyarticle',
                        ['post' => $post, 'user' => auth()->user(), 'total' => $this->price]);
                }else{
                    return Redirect()
                        ->route('error')
                        ->with('error',
                            "Bài viết đã mua tin VIP hoặc đã xóa trước đó! ."); //404
                }
            }else{
                return redirect()
                    ->back()
                    ->with('error-post',
                        'Ví dư không khả dụng để mua bài viết VIP. Xin vui lòng nạp tiền số tiền tối thiểu của 1 tin VIP là 50.000 VND');
            }
        }else{
            return Redirect()
                ->route('error')
                ->with('error',
                    "Tài khoản không khớp với tài khoản người đăng bài viết."); //404
        }
    }

    function voucher(Request $request){

        $request->session()->forget('voucher');


        $conditon = [
            ['code', '=', $request->voucher],
            ['quantify', '>=', 1],
            ['delete', '=', 0],
            ['status', '=', 1],
        ];

        if ($voucher = $this->voucher->editVoucher($conditon)){
            $condition    = [
                ['transactions.id_user', '=', $request->id_user],
                ['id_category_transaction', '=', 2],
                ['transactions.voucher', '=', $request->voucher]
            ];
            $checkVoucher = $this->transaction->getHistory($condition);

            if ($checkVoucher->isEmpty()){
                $today          = new DateTime();
                $expirationDate = new DateTime($voucher->expiration_date);
                if ($today < $expirationDate){
                    $values = [
                        'code'     => $request->voucher,
                        'discount' => $voucher->discount,
                        'quantify' => $voucher->quantify
                    ];
                    session()->push('voucher', $values);

                    return redirect()->back()->with('success', 'Áp dụng voucher thành công!');
                }else{
                    return redirect()
                        ->back()
                        ->with('error', 'Voucher đã hết hạn sử dụng. Xin vui lòng thử lại sau !');

                }
            }else{

                return redirect()
                    ->back()
                    ->with('error',
                        'Bạn đã sử dụng voucher này trước đó! Xin vui lòng kiểm tra lại');

            }


        }else{
            return redirect()
                ->back()
                ->with('error', 'Voucher không tồn tại. Xin vui lòng thử lại sau !');

        }

    }

    function checkOut(Request $request){

            if ((Auth::user()->wallet - $request->total) >= 0){
                $values = [
                    'id_user'                 => Auth::user()->id,
                    'id_category_transaction' => 2,
                    'id_method'               => 5,
                    'price'                   => - $request->total,
                    'surplus'                 => auth()->user()->wallet - $request->total,
                    'status'                  => 1,
                    'voucher'                 => $request->session()
                                                         ->get('voucher')[0]['code'] ?? '',
                    'created_at'              => date('Y-m-d'),
                    'content'                 => "Giao dịch thành công",
                ];
                if ($request->session()->has('voucher')){
                    $condition    = [
                        ['transactions.id_user', '=', $request->id_user],
                        ['id_category_transaction', '=', 2],
                        ['transactions.voucher', '=', $request->session()->get('voucher')[0]['code']]
                    ];
                    $checkVoucher = $this->transaction->getHistory($condition);

                    if ($checkVoucher->isEmpty()){
                        $conditon   = [
                            'code' => $request->session()->get('voucher')[0]['code'],
                        ];
                        $dataUpdate = [
                            'quantify' => $request->session()->get('voucher')[0]['quantify'] - 1,
                        ];
                        $this->voucher->updateVoucher($conditon, $dataUpdate);
                    }else{
                        $request->session()->forget('voucher');
                        return redirect()
                            ->back()
                            ->with('error', 'Voucher đã sử dụng trước đó! Xin vui lòng thử lại sau.');
                    }

                }
                $conditon   = [
                    'slug' => $request->slug,
                ];
                $dataUpdate = [
                    'featured_news'   => 1,
                    'expiration_date' => Carbon::now()->addDays(30)
                ];
                $this->post->updatePost($conditon, $dataUpdate);
                $this->transaction->addTransaction($values);
                $user         = User::find($request->id_user);
                $user->wallet = auth()->user()->wallet - $request->total;
                $user->save();
                $request->session()->forget('voucher');

                return redirect()
                    ->route('postNew')
                    ->with('success',
                        'Mua tin vip thành công');
            }else{
                return redirect()
                    ->route('postNew')
                    ->with('error-post',
                        'Ví dư không khả dụng. Xin vui lòng nạp tiền');
            }



    }

}
