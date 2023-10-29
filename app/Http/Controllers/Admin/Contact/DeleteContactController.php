<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactClient;

class DeleteContactController extends Controller{

    public $Contact;

    public function __construct(){
        $this->contact = new ContactClient();
    }

    function deleteContact($id){
        $condition = [
            ['id', '=', $id],
        ];
        $value     = [
            'delete' => 1,
            'status' => 0,
        ];
        $this->contact->updateContact($condition,$value);
        return redirect()->back()->with('success', 'Đã xóa vài viết thành công');
    }
    function restoreContact($id){
        $condition = [
            ['$id', '=', $id],
        ];
        $value     = [
            'delete' => 0,
        ];
        $this->contact->updateContact($condition, $value);
        return redirect()->back()->with('success', 'Đã khôi phục bài viết thành công');
    }
}
