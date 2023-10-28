<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Faqs extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [
            [
                'id'         => 1,
                'fullname'   => 'Hồng Nhi',
                'email'      => 'hongnhi@gmail.com',
                'phone'      => '0949856941',
                'address'    => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Bình - 170 Hoàng Quốc Việt',
                'content'    => 'Tôi muốn đăng tin thì phải làm như thế nào? . Mong admin sớm trả lời',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 2,
                'fullname'   => 'Duy Hòa',
                'email'      => 'duyhoa21@gmail.com',
                'phone'      => '0758965421',
                'address'    => 'Thành phố Cần Thơ - Quận Cái Răng - Phường Hưng Thạnh - 254 Huỳnh thị hai',
                'content'    => 'Tôi muốn đăng tin và đăng ký tài khoản người dùng thì phải làm như thế nào? . Mong admin sớm trả lời',
                'created_at' => date('Y-m-d'),
            ],


        ];

        foreach ($data as $item){
            DB::table('faqs')->insert($item);

        }
    }
}
