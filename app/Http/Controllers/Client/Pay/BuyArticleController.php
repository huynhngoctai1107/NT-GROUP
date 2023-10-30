<?php

namespace App\Http\Controllers\Client\Pay;

use App\Http\Controllers\Controller;
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

    public function __construct(){

        $this->post    = new Post();
        $this->voucher = new Voucher();
    }

    function buyVipNew($slug){

        $condition = [
            'posts.slug' => $slug
        ];
        $post      = $this->post->firstPost($condition);

        if ($post->id_user === Auth::user()->id){
            if (Auth::user()->wallet >= 50000){
                if ($post->featured_news == 0 && $post->delete_posts == 0){

                    return view('client.pages.buyarticle',
                        ['post' => $post, 'user' => Auth::user(), 'total' => 50000]);
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
        if( $voucher  = $this->voucher->editVoucher($conditon)){
            $today          = new DateTime();
            $expirationDate = new DateTime($voucher->expiration_date);
            if($today < $expirationDate){
                $values = [
                        'code' =>$request->voucher,
                        'discount' =>$voucher->discount

                    ];
                session()->push('voucher', $values);

                return redirect()->back()->with('success','Áp dụng voucher thành công!');
            }else{
                return redirect()->back()->with('error','Voucher đã hết hạn sử dụng. Xin vui lòng thử lại sau !');

            }
        }else{
            return redirect()->back()->with('error','Voucher không tồn tại. Xin vui lòng thử lại sau !');

        }




    }
}
