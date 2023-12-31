<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostListController extends Controller
{
    public $post;
    public $category;
    public function __construct()
    {
        $this->post = new Post();
        $this->category = new Category();
    }
    function listPost(){
        $condition = [
            ['posts.delete', '=', 0],
            ['status', '=', 1],
        ];
        $data = $this->post->getPostList($condition, null, false,8);
        $lq = $this->post->getPostList($condition, null, true)->take(3);
        return view('Client.Pages.ListPostAll',['page'=>'post', 'list'=>$data, 'lq'=>$lq]);
    }


    public function SearchPost(Request $request){
        $condition = [
            ['posts.delete', '=', 0],
            ['status', '=', 1],
        ];
        $condition1 = [
            ['posts.delete', '=', 0],
            ['status', '=', 1],
        ];

        $keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

        if ($keyword !== null) {
            if(!$request->keyword) {
               return redirect()->back();
            }
            $keyword = $request->keyword;
            $keyword = str_replace('/\s+/',' ',$keyword);
            $keyword = trim($keyword);
            $condition[] = ['title', 'LIKE', "%$keyword%"];
        }

        if ($request->filled('category') && $request->category !== "Loại BDS") {
            $category = $request->category;
            $condition[] = ['id_category', '=', $category];
        }

        if ($request->filled('demand') && $request->demand !== "Nhu Cầu") {
            $demand = $request->demand;
            $condition[] = ['id_demand', '=', $demand];
        }

        if ($request->filled('ward') && $request->filled('district') && $request->filled('city')) {
            $ward = implode(' - ', [$request->city, $request->district, $request->ward]);
            $condition[] = ['address', 'LIKE', "%$ward%"];
        } elseif ($request->filled('district') && $request->filled('city')) {
            $district = implode(' - ', [$request->city, $request->district]);
            $condition[] = ['address', 'LIKE', "%$district%"];
        } elseif ($request->filled('city')) {
            $city = $request->city;
            $condition[] = ['address', 'LIKE', "%$city%"];
        }


        if ($request->filled('price') && $request->price !== "Giá") {
            $price = $request->price;
            $condition[] = ['id_price', '=', $price];
        }

        if ($request->filled('acreage') && $request->acreage !== "Diện tích") {
            $acreage = $request->acreage;
            $condition[] = ['id_acreage', '=', $acreage];
        }
        $data = $this->post->getPostList($condition, null, false,8);
        $sale = $this->post->getPostList($condition1, null, true)->take(3);
        if ($data->isEmpty()) {
            return view('Client.Pages.Search', ['page' => 'search', 'list' => $data, 'sale' => $sale])
                ->with('message', 'Không tìm thấy kết quả.');
        } else {
            if(count($condition) === 2){
                return view('Client.Pages.ListPostAll',
                    ['page' => 'post', 'list' => $data, 'lq' => $sale]);
            }else{
                return view('Client.Pages.Search',
                    ['page' => 'search', 'list' => $data, 'sale' => $sale]);
            }
        }
    }
}
