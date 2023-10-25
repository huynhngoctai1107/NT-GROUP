<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\AddClientPostRequest;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddPostController extends Controller
{
    public $posts;
    public $media;

    public function __construct()
    {
        $this->posts = new Post();
        $this->media = new Media();
    }

    function post(){

        $condition = [];
        $demand    = $this->posts->Show($condition, 'demands');
        $category  = $this->posts->Show($condition, 'category_posts');
        $price     = $this->posts->Show($condition, 'prices');
        $acreage   = $this->posts->Show($condition, 'acreages');

        return view('client.pages.addpost', ['demand' => $demand, 'category' => $category, 'price' => $price, 'acreage' => $acreage]);
    }

    function addClientPosts(AddClientPostRequest $request)
    {
        $value = [
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'id_demand' => $request->id_demand,
            'id_category' => $request->id_category,
            'id_user' => $request->id_user,
            'id_price' => $request->id_price,
            'id_acreage' => $request->id_acreage,
            'price' => $request->price,
            'subtitles' => $request->subtitles,
            'content' =>  $request->content,
            'link_youtube' => $request->link_youtube,
            'address' => $request->input('address1') . ' ' . $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'compilation' => $request->compilation,
            'created_at' => now(),
        ];
       $idPost = $this->posts->addPost($value);
       if ($request->hasFile('uploadfile')) {
           // Xử lý khi trường uploadfile không rỗng
           $countImg = count($request->uploadfile);
           if ($countImg > 0) {
               for ($i = 0; $i < $countImg; $i++) {
                   $filename = time() . '-' . 'medias' . '.' . $request->uploadfile[$i]->extension();
                   $request->uploadfile[$i]->move(public_path("images"), $filename);
                   $request->merge(['image' => $filename]);
                   // Thay đổi 'image' thành 'images' trong mảng dữ liệu
                   $data = [
                       "image" => $request->image, // Thay đổi 'image' thành 'images' ở đây
                       "id_post" => $idPost,
                   ];
                   $this->media->addMedia($data); // Chỉnh sửa thành 'addMedia'
               }
           }
       }

        return redirect()->route('index')->with('success', 'Đã thêm thành công');
    }
}
