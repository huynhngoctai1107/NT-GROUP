<?php

namespace App\Http\Controllers\Client\Tools;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\Tools\MapLocationRequest;

class MapLocationController extends Controller{

    public $location;

    public function __construct(){

        $this->location = new Post();

    }

    function mapLocation(){
        $condition = [
            ['posts.delete', '=', 0],
            ['posts.status', '=', 1],
        ];
        $locations = $this->location->Show($condition, 'posts');

        return view('Client.Pages.Maplocations',
            ['locations' => $locations]);
    }

    function checkMap(MapLocationRequest $request){

        $condition = [
            'posts.delete' => 0,
            'posts.status' => 1,
        ];
        $kilometer = ((int) $request->kilometer == 100 ? 1000000 : $request->kilometer);
        $a         = $request->price == 100 ? 100 : $condition['id_price'] = $request->price;
        $b         = $request->acreage == 100 ? 100 : $condition['id_acreage'] = $request->acreage;
        $location = explode(',', $request->location);
        $distance = $this->location->distance($condition, $location, $kilometer);

        if (!empty($distance)){


            session()->flash("notification", "Tìm thấy " . count($distance) . " Kết quả");

            return view('Client.Pages.Maplocations',
                ['locations' => $distance,
                 'price'     => $request->price,
                 'acreage'   => $request->acreage,
                 'kilometer' => $request->kilometer]);
        }else{
            $condition = [
                ['posts.delete', '=', 0],
                ['posts.status', '=', 1],
            ];
            session()->flash("notification", "Tìm thấy " . count($distance) . " Kết quả");

            return view('Client.Pages.Maplocations',
                ['locations' => $this->location->Show($condition, 'posts'),
                 'price'     => $request->price,
                 'acreage'   => $request->acreage,
                 'kilometer' => $request->kilometer]
            );


        }


    }


}
