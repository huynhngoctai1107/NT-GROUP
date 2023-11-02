<?php

namespace App\Http\Controllers\Admin\EmailNew;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;

class DeleteEmailController extends Controller
{
    public $email;
    public function __construct(){
        $this->email = new Email();
    }

    function deleteEmail($id){
        $condition = [
            ['id', '=', $id],
        ];
        $value     = [
            'delete' => 1,
        ];
        $this->email->updateEmail($condition,$value);
        return redirect()->back()->with('success', 'Đã xóa email thành công');
    }

}
