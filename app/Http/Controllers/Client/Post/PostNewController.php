<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
 
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostNewController extends Controller
{
    public $post;
 
    public function __construct()
    {
        $this->post = new Post();
  
    }
    function postNew(Request $request){
        $request->session()->forget('voucher');

        $condition = [
            'posts.delete'  => 0,
            'featured_news' => 0,
            'id_user'=> auth()->user()->id,
        ];
        $postList  = $this->post->getPost($condition);

        $condition  = [
            'posts.delete'  => 0,
            'featured_news' => 1,
            'id_user'=> auth()->user()->id,
        ];
        $postVip    = $this->post->getPost($condition);
        $condition  = [
            'posts.delete' => 1,
            'id_user'=> auth()->user()->id,
        ];
        $postDelete = $this->post->getPost($condition);
        
     
        return view('Client.Pages.PostNew',['postList'=>$postList, 'postVip'=> $postVip, 'postDelete'=>$postDelete]);
    }

    function status($slug, Request $request){
       
        if($request->status==1){
            $value = ['status'=> 0];
            $condition=[
                'slug'=>$slug,
                'id_user'=> auth()->user()->id,
            ];
        }else{
            $value = ['status'=> 1];
            $condition=[
                'slug'=>$slug,
                'id_user'=> auth()->user()->id,
            ];
        }
       $this->post->updatePost($condition,$value);
       return Redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }
}
