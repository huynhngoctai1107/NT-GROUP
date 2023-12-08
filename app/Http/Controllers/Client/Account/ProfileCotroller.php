<?php

namespace App\Http\Controllers\Client\Account;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class ProfileCotroller extends Controller{


    public $post;
    public $category;
    public $user;
    public $modelFollow;

    public function __construct(){
        $this->modelFollow = new Follower();
        $this->user        = new User();
        $this->post        = new Post();
        $this->category    = new Category();
    }

    public function Profile($slug){

        $follow = FALSE;

        $condition = [
            'slug'   => $slug,
            'delete' => 0,
            'status' => 1
        ];
        $user      = $this->user->first($condition);
        if ($user){
            if (Auth::check()){
                if (Auth::user()->id != $user->id){
                    $follow        = TRUE;
                    $condition     = [
                        'followers.id_user'     => $user->id,
                        'followers.id_follower' => Auth::user()->id,
                    ];
                    $checkFollower = $this->modelFollow->first($condition);

                }else{

                    $follow = FALSE;
                }
            }else{
                $follow = FALSE;
            }


            $ViewFollow = [
                'total'   => $this->modelFollow->sumTotal(['followers.id_user' => $user->id],
                    "id_follower"),
                'getview' => $this->modelFollow->getFollowers(['followers.id_user' => $user->id],
                    'id_follower',
                    'followers.id_follower'),
            ];

            $followed = [
                'total'   => $this->modelFollow->sumTotal(['followers.id_follower' => $user->id],
                    "id_user"),
                'getview' => $this->modelFollow->getFollowers(['followers.id_follower' => $user->id],
                    'id_user',
                    'followers.id_user'),
            ];

            $condition = [
                ['id_user', '=', $user->id],
                ['posts.delete', '=', 0],
                ['posts.status', '=', 1],
            ];

            if ($followed['getview'] !== NULL){
                $values = [];
                foreach ($followed['getview'] as $item){
                    $values[] = $item->id;
                }
                $postFollow = $this->post->getPostFollow($values, 4);
            }


            return view('Client.Pages.Profile',
                ['postUser'      => $this->post->getPostList($condition, NULL, FALSE, NULL),
                 'postFollow'    => $postFollow ?? NULL,
                 'user'          => $user,
                 'slug'          => $slug,
                 'ViewFollow'    => $ViewFollow,
                 'followed'      => $followed,
                 'checkFollower' => $checkFollower ?? "",
                 'follow'        => $follow]);
        }else{
            return Redirect()
                ->route('error')
                ->with(['error' => "Không tìm thấy tài khoản, tài khoản chưa được kích hoạt, hoặc đã tạm khóa", "title" => 404]); //404

        }


    }

    public function follow(Request $request){

        if (Auth::user()->id != $request->id_follower){
            $condition = [
                'followers.id_user'     => $request->id_user,
                'followers.id_follower' => $request->id_follow,
            ];

            $checkFollower = $this->modelFollow->first($condition);

            if (empty($checkFollower)){
                $values = [
                    'id_user'     => $request->id_follower,
                    'id_follower' => $request->id_user,
                ];
                $this->modelFollow->addFollower($values);

                return redirect()
                    ->back()
                    ->with('success',
                        "Theo dõi tài khoản thành công, bạn sẽ nhận được tin tức sớm nhất.");

            }else{
                return redirect()
                    ->back()
                    ->with('error', "Theo dõi tài khoản thất bại");
            }


        }else{
            return redirect()
                ->back()
                ->with('error', "Theo dõi tài khoản thất bại");

        }


    }

    public function unFollow(Request $request){


        if ($request->has('checkAccount')){

            if ($request->id_follower == Auth::user()->id && $request->id_follow != $request->id_user){
                $condition = [
                    'id_user'     => $request->id_user,
                    'id_follower' => $request->id_follower,
                ];
                $data      = $this->modelFollow->unFollow($condition);

                return redirect()
                    ->back()
                    ->with('success', "Bỏ theo dõi thành công");
            }else{

                return redirect()
                    ->back()
                    ->with('error', "bỏ theo dõi thất bại");

            }
        }else{
            if ($request->id_follower != $request->id_user){
                $condition = [
                    'id_user'     => $request->id_user,
                    'id_follower' => $request->id_follower,
                ];
                $this->modelFollow->unFollow($condition);

                return redirect()
                    ->back()
                    ->with('success', "Bỏ theo dõi thành công");
            }else{
                return redirect()
                    ->back()
                    ->with('error', "bỏ theo dõi thất bại");

            }
        }


    }
}
