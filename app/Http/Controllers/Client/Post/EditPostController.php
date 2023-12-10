<?php

namespace App\Http\Controllers\Client\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\EditPostClientRequest;
use App\Http\Requests\Post\EditPostRequest;
use App\Models\Contact;
use App\Models\Media;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EditPostController extends Controller
{
    public $posts;
    public $media;
    public $contact;

    public function __construct(){
        $this->posts   = new Post();
        $this->media   = new Media();
        $this->contact = new Contact();
    }
    function editPostsClient($slug){
        $where        = ['slug' => $slug,];
        $idPost       = $this->posts->getId($where);
        $whereMedia   = ['id_post' => $idPost,];
        $condition    = [];
        $data         = $this->posts->editPost($where);
        $demand       = $this->posts->Show($condition, 'demands');
        $category     = $this->posts->Show($condition, 'category_posts');
        $user         = $this->posts->Show($condition, 'users');
        $price        = $this->posts->Show($condition, 'prices');
        $acreage      = $this->posts->Show($condition, 'acreages');
        $media        = $this->media->showMedia($whereMedia);
        $contact      = $this->contact->showContact($whereMedia);
        $addressParts = explode(' - ', $data['address']);
        //        dd($addressParts);
        $address = [
            'province' => $addressParts[0] ?? '',
            'district' => $addressParts[1] ?? '',
            'ward' => $addressParts[2] ?? '',
            'street' => $addressParts[3] ?? '',
        ];

        return view('Client.Pages.EditPost', [
            'page' => 'posts',
            'data' => $data,
            'demand' => $demand,
            'category' => $category,
            'user' => $user,
            'price' => $price,
            'acreage' => $acreage,
            'media' => $media,
            'address' => $address,
            'contact' => $contact,
        ]);
    }

    function storePostsClient(EditPostClientRequest $request, $slug){
        $price = str_replace(['.', ','], '', $request->price);
        $value = [
            'title' => $request->title,
            'slug' => Str::slug(!empty($request->input('slug')) ? $request->input('slug') : $request->input('title')),
            'id_demand' => $request->id_demand,
            'id_category' => $request->id_category,
            'id_user' => $request->id_user,
            'id_price' => $request->id_price,
            'id_acreage' => $request->id_acreage,
            'price' => $price,
            'acreages' => $request->acreage,
            'subtitles' => $request->subtitles,
            'content' => $request->input('content'),
            'featured_news' => $request->input('featured_news') ?? 0,
            'link_youtube' => $request->input('link_youtube'),
            'address' => $request->input('address1') . ' ' . $request->address,
            'longitude' => $request->input('longitude'),
            'latitude' => $request->input('latitude'),
            'compilation' => $request->id_user,
        ];
        $validatedData = $request->validated();

        if (empty($validatedData)){
            return redirect()->back();
        } // kiểm tra giá mới được cập nhật
        $condition = [
            ['slug', '=', $slug],
        ];
        $data = $this->posts->updatePost($condition, $value);
        if ($request->hasFile('uploadfile')){
            // Nếu 'uploadfile' có file được tải lên
            $where    = $condition;
            $idPost   = $request->id_post;
            $countImg = count($request->uploadfile);
            if ($countImg > 0){
                for ($i = 0; $i < $countImg; $i ++){
                    $filename = time() . '-' . 'medias' . '.' . $request->uploadfile[$i]->extension();
                    $request->uploadfile[$i]->move(public_path("images/medias"), $filename);
                    $request->merge(['image' => $filename]);
                    // Thay đổi 'image' thành 'images' trong mảng dữ liệu
                    $data = [
                        "image"   => $request->image, // Thay đổi 'image' thành 'images' ở đây
                        "id_post" => $idPost,
                    ];
                    $this->media->addMedia($data); // Chỉnh sửa thành 'addMedia'
                }
            }
        }

        if ($request->hasFile('img1')){
            $condition = [
                ['id', '=', $request->id1],
            ];
            $filename = time() . '-' . 'contact' . '.' . $request->img1->extension();
            $request->img1->move(public_path("images/contacts"), $filename);
            $request->merge(['image' => $filename]);
            $data = [
                "position" => $request->name1,
                "phone" => $request->phone1,
                "image" => $request->image ?? '',
            ];
            $this->contact->updateContact($condition,$data);
        }else{
            $condition = [
                ['id', '=', $request->id1],
            ];
            $data = [
                "position" => $request->name1,
                "phone" => $request->phone1,
            ];
            $this->contact->updateContact($condition,$data);
        }
        //
        if ($request->hasFile('img2')){
            $condition = [
                ['id', '=', $request->id2],
            ];
            $filename = time() . '-' . 'contact' . '.' . $request->img2->extension();
            $request->img2->move(public_path("images/contacts"), $filename);
            $request->merge(['image' => $filename]);
            $data = [
                "position" => $request->name2,
                "phone" => $request->phone2,
                "image" => $request->image ?? '',
            ];
            $this->contact->updateContact($condition,$data);
        }else{
            $condition = [
                ['id', '=', $request->id2],
            ];
            $data = [
                "position" => $request->name2,
                "phone" => $request->phone2,
            ];
            $this->contact->updateContact($condition,$data);
        }

        return redirect()->route('postNew')->with('success', 'Sửa bài viết " ' . $request->title . ' " thành công');
    }


    function deleteMedia($id){
        $condition = [['id', '=', $id],];
        $data = $this->media->deleteMedia($condition);

        return redirect()->back()->with('success', 'Đã xóa ảnh thành công');
    }
}
