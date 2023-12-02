<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;

class DeleteContactController extends Controller{

  public $faqs;

    public function __construct(){
       $this->faqs = new Faqs();
    }

    function deleteContact($id){
        $condition = [
            ['id', '=', $id],
            ['status', '=', 0],
        ];
        $value     = [
            'delete' => 1,
            'status' => 1,
        ];
        $this->faqs->updateContact($condition,$value);
        return redirect()->back()->with('success', 'Đã xóa vài viết thành công');
    }
    function restoreContact($id){
        $condition = [
            ['id', '=', $id],
        ];
        $value = [
            'delete' => 0,
        ];
        $this->faqs->updateContact($condition, $value);
        return redirect()->back()->with('success', 'Đã khôi phục bài viết thành công');
    }
}
