<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Customer_reports extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [

            [
                'id'      => 1,
                'post_id' => 1,
                'user_id' => 1,
                'content' => 'Tin đăng không chính xác về giá',
                'status' => 1,
                'delete' => 1,

            ],
            [
                'id'      => 2,
                'post_id' => 2,
                'user_id' => 1,
                'content' => 'Tin đăng không chính xác vị trí nơi bất động sản',
                'status' => 1,
                'delete' => 1,

            ],
            [
                'id'      => 3,
                'post_id' => 3,
                'user_id' => 2,
                'content' => 'Bất động sản đã có người mới sở hữu. Vui lòng xóa bài viết này',
                'status' => 1,
                'delete' => 0,

            ],
            [
                'id'      => 4,
                'post_id' => 2,
                'user_id' => 1,
                'content' => 'Bất động sản không tồn tại. Vui lòng kiểm tra lại',
                'status' => 1,
                'delete' => 0,

            ],




        ];
        foreach ($data as $item){
            DB::table('customer_reports')->insert($item);
        }
    }
}
