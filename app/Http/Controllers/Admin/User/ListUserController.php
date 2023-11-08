<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class ListUserController extends Controller{

    public $user;

    public function __construct(){
        $this->user = new User();
    }

    public function listUser(){
        $condition = ['delete' => 0,];
        $data      = $this->user->listUser($condition);

        return view('admin.user.list', ['list' => $data]);
    }

    public function statusUser($userId){
        $user = User::find($userId);

        if ($user){
            if ($user->status){
                $user->status = 0;
            }else{
                $user->status = 1;
            }
            $user->save();
        }

        return back();
    }

    function ListUserHistory(){
        $condition = [
            ['delete', '=', 1],
        ];
        $data      = $this->user->listUser($condition);

        return view('admin.user.UserHistory', ['page' => 'history', 'query' => $data]);
    }

    public function searchUser(Request $request)
    {
        $condition = [
            ['delete', '=', 0],
            ['status', '=', 1],
        ];

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $condition[] = ['email', 'LIKE', "%$keyword%"];
        }

        $users = User::where($condition)->paginate(5);

        $users->appends($request->query());

        if ($users->isEmpty()) {
            return view('admin.user.list', ['list' => $users])
                ->with('message', 'Không tìm thấy email tài khoản .');
        } else {
            return view('admin.user.list', ['list' => $users]);
        }
    }
}