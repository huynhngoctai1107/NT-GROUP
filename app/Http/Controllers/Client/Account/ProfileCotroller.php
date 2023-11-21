<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileCotroller extends Controller
{


    public $post;
    public $category;
    public $user;
    public function __construct()
    {
        $this->user = new User();
        $this->post = new Post();
        $this->category = new Category();
    }
  public function Profile($email){
        $condition=[
                'email'=> $email,
                    'delete'=> 0,
                    'status'=>1
        ];
     $user = $this->user->first($condition);
     if($user){
         $condition = [
             ['id_user','=',$user->id],
             ['posts.delete', '=', 0],
             ['posts.status', '=', 1],
         ];

         return view('client.pages.profile',['post'=> $this->post->getPostList($condition, null, false,1),'user'=>$user]);
     }else{
         return Redirect()
             ->route('error')
             ->with(['error'=> "Không tìm thấy tài khoản này","title"=>404]); //404

     }



  }
}
