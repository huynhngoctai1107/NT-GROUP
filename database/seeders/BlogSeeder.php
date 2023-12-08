<?php

namespace Database\Seeders;

use GuzzleHttp\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        $client = new Client();
//        $response = $client->get('https://nt-group.top/wp-json/wp/v2/posts?per_page=35');
//        $blogs = json_decode($response->getBody(), TRUE);
//        foreach ($blogs as $blog) {
//            $imageUrl = $blog['yoast_head_json']['og_image'];
//            // Chuyển đổi mảng thành chuỗi nếu cần
//            if (is_array($imageUrl)) {
//                $imageUrl = json_encode($imageUrl);
//            }
//            DB::table('blogs')->insert([
//                'title'      => $blog['title']['rendered'],
//                'id_user'    => 1,
//                'id_category_blog' => 1,
//                'image'      =>$imageUrl,
//                'slug'       => $blog['slug'],
//                'content'    => $blog['content']['rendered'],
//                'excerpt'    => $blog['excerpt']['rendered'],
//                'created_at' => date('Y-m-d H:i:s', strtotime($blog['date'])),
//                'updated_at' => date('Y-m-d H:i:s', strtotime($blog['date'])),
//            ]);
//        }
    }
}
