<?php

namespace App\Livewire\Client\Pages;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Maplocations extends Component{

    public $geolocation;

    public $kilometer;

    public $locations ;


    public function __construct(){

        $condition = [
            ['posts.delete', '=', 0],
            ['posts.status', '=', 1],
        ];
       $this->locations= $this->getPost($condition);

    }

    public function render(){
        return view('livewire.client.pages.maplocations');
    }

    public function checkform(){

    }
    public function getPost($condition)
    {
        return DB::table('posts')->where($condition)->get();
    } // sửa sau 15 tây


}
