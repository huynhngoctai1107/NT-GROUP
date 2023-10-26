<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactClient;

class DeleteContactController extends Controller
{
    public $Contact;

    public function __construct()
    {
        $this->contact = new ContactClient();
    }
    function deleteContact($id){
            $condition = [
                ['id', '=', $id],
            ];
            $this->contact->deleteContact($condition);

            return redirect()->route('listContact');
        }
}
