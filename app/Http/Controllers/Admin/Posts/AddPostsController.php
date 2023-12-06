<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\AddPostRequest;
use App\Models\Contact;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AddPostsController extends Controller
{

    public $posts;
    public $media;
    public $contact;

    public function __construct()
    {
        $this->posts = new Post();
        $this->media = new Media();
        $this->contact = new Contact();
    }

    function addFormPosts()
    {
        $condition = [];
        $condition1 = [
            ['delete', '=', 0],
        ];
        $demand    = $this->posts->Show($condition1, 'demands');
        $category  = $this->posts->Show($condition1, 'category_posts');
        $user      = $this->posts->Show($condition, 'users');
        $price     = $this->posts->Show($condition, 'prices');
        $acreage   = $this->posts->Show($condition, 'acreages');

        return view('Admin.PostsCategory.Add', ['page' => 'posts', 'demand' => $demand, 'category' => $category, 'user' => $user, 'price' => $price, 'acreage' => $acreage]);
    }

    function addPosts(AddPostRequest $request)
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
            'acreages' => $request->acreage,
            'subtitles' => $request->subtitles,
            'content' =>  $request->input('content'),
            'featured_news' => $request->featured_news ?? 0,
            'link_youtube' => $request->link_youtube,
            'address' => $request->input('address1') . ' ' . $request->address,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'compilation' => $request->id_user,
            'created_at' => now(),
        ];
        $validatedData = $request->validated();

        if (empty($validatedData)) {
            return redirect()->back();
        }// kiểm tra giá trc khi thêm
        $idPost = $this->posts->addPost($value);
        if ($request->hasFile('uploadfile')) {
            // Xử lý khi trường uploadfile không rỗng
            $countImg = count($request->uploadfile);
            if ($countImg > 0) {
                for ($i = 0; $i < $countImg; $i++) {
                    $filename = time() . '-' . 'medias' . '.' . $request->uploadfile[$i]->extension();
                    $request->uploadfile[$i]->move(public_path("images/medias"), $filename);
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
        if (!empty($request->name1)) {
            $filename = time() . '-' . 'contact' . '.' . $request->img1->extension();
            $request->img1->move(public_path("images/contacts"), $filename);
            $request->merge(['image' => $filename]);
            $data = [
                "position" => $request->name1,
                "id_post" => $idPost,
                "phone" =>$request->phone1,
                "image" => $request->image ?? '',
                'created_at' => now(),
            ];
            $this->contact->addContact($data);
        }
        if (!empty($request->name2)) {
            $filename = time() . '-' . 'contact' . '.' . $request->img2->extension();
            $request->img2->move(public_path("images/contacts"), $filename);
            $request->merge(['image' => $filename]);
            $data = [
                "position" => $request->name2,
                "id_post" => $idPost,
                "phone" =>$request->phone2,
                "image" => $request->image ?? '',
                'created_at' => now(),
            ];
            $this->contact->addContact($data);
        }

        return redirect()->route('listPosts')->with('success', 'Thêm bài viết " ' . $request->title . ' " thành công');
    }
}
