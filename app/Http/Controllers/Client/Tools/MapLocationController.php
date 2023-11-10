<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Tools\MapLocationRequest;

class MapLocationController extends Controller{

    public $location ;

    public function __construct(){

        $this->location = new Post() ;

    }

    function mapLocation(){
      $condition = [
            ['posts.delete', '=', 0],
            ['posts.status', '=', 1],
        ];
        $locations= $this->location->Show($condition,'posts');
        return view('client.pages.maplocations',['locations'=>$locations]);
    }
    function checkMap(MapLocationRequest $request){
        $condition = [
            'posts.id_price' => $request->price,
            'posts.id_acreage' => $request->acreage,
        ];
        $location =  explode(',',$request->location) ;
        $kilometer = $request->kilometer == 100 ? 10000000 : $request->kilometer ;

        if($distance = $this->location->distance($condition,$location,$kilometer)){
            session()->flash("notification","Tìm thấy ".count($distance)." Kết quả");
            return view('client.pages.maplocations',['locations'=>$distance]);
         }else{
            $condition = [
                ['posts.delete', '=', 0],
                ['posts.status', '=', 1],
            ];
            session()->flash("notification","Tìm thấy ".count($distance)." Kết quả");
            return view('client.pages.maplocations',['locations'=>$this->location->Show($condition,'posts')]);


        }



    }

}
