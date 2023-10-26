<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;


class ListUserController extends Controller
{
    public $user;

    public function __construct(){
        $this->user = new User();
    }
    public function listUser()
    {
        $condition=[];
        $data=$this->user->listUser($condition);


        return view('admin.user.list', ['list' => $data]);
    }

    public function statusUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            if ($user->status) {
                $user->status = 0;
            } else {
                $user->status = 1;
            }
            $user->save();
        }
        return back();
    }
}