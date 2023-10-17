<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\EditPostRequest;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditPostsController extends Controller
{

    public $posts;
    public $media;
    public function __construct()
    {
        $this->posts = new Post();
        $this->media = new Media();
    }

    function editFormPosts($slug)
    {
        $where = [
            'slug' => $slug,
        ];
        $idPost = $this->posts->getId($where);
        $whereMedia = [
            'id_post' => $idPost,
        ];
        $condition = [];
        $data = $this->posts->editPost($where);
        $demand    = $this->posts->Show($condition, 'demands');
        $category  = $this->posts->Show($condition, 'category_posts');
        $user      = $this->posts->Show($condition, 'users');
        $price     = $this->posts->Show($condition, 'prices');
        $acreage   = $this->posts->Show($condition, 'acreages');
        $media   = $this->media->showMedia($whereMedia);
        $addressParts = explode(' - ', $data['address']);
//        dd($addressParts);
        $address = [
            'province' => $addressParts[0] ?? '',
            'district' => $addressParts[1] ?? '',
            'ward' => $addressParts[2] ?? '',
            'street' => $addressParts[3] ?? ''
        ];

        return view('admin.postscategory.edit', ['page' => 'posts', 'data' => $data, 'demand' => $demand, 'category' => $category, 'user' => $user, 'price' => $price, 'acreage' => $acreage, 'media' => $media, 'address'=> $address]);
    }

    function editPosts(EditPostRequest $request, $slug)
    {
        $value = [
            'title' => $request->title,
            'slug' => Str::slug(!empty($request->input('slug')) ? $request->input('slug') : $request->input('title')),
            'id_demand' => $request->id_demand,
            'id_category' => $request->id_category,
            'id_user' => $request->id_user,
            'id_price' => $request->id_price,
            'id_acreage' => $request->id_acreage,
            'price' => $request->price,
            'subtitles' => $request->subtitles,
            'content' => $request->input('content'),
            'featured_news' => $request->input('featured_news'),
            'link_youtube' => $request->input('link_youtube'),
            'address' => $request->input('address1').' '.$request->address,
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'compilation' => $request->input('compilation'),
        ];
        $condition = [
            ['slug', '=', $slug],
        ];
        $data = $this->posts->updatePost($condition, $value);
        if ($request->hasFile('uploadfile')) {
            // Nếu 'uploadfile' có file được tải lên
            $where = $condition;
            $idPost = $request->id_post;
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
        return redirect()->route('listPosts')->with('success', 'Đã thêm nhu cầu thành công');
    }


    function deleteMedia($id)
    {
        $condition = [
            ['id', '=', $id],
        ];
        $data = $this->media->deleteMedia($condition);
        return redirect()->back()->with('success', 'Đã xóa ảnh thành công');
    }
}
