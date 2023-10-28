<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{

        $positions    = [
            "Giám đốc kinh doanh",
            "Giám đốc bán hàng",
            "Trưởng phòng kinh doanh",
            "Chuyên viên kinh doanh",
            "Chuyên viên tư vấn bất động sản",
            "Chuyên viên marketing bất động sản",
            "Chuyên viên pháp lý bất động sản",
            "Chuyên viên tài chính bất động sản",
            "Chuyên viên IT bất động sản"
        ];
        $random_index = rand(0, count($positions) - 1);
        $name         = $positions[$random_index];
        $images    = [
            "user-1.png",
            "user-2.jpg",
            "user-3.jpg",
            "user-4.jpg",
            "user-5.jpg",
            "user-6.jpg",
             
        ];
        $random_images = rand(0, count($images) - 1);
        $images         = $images[$random_images];
        $data         = [
            [
                'id'       => 1,
                'id_post'  => 1,
                'position' => $name,
                'phone'    => '0949615859',
                'image'=> $images,
            ],
            [
                'id'       => 2,
                'id_post'  => 1,
                'position' => $name,
                'phone'    => '0475982351',
                'image'=> $images,
            ],
            [
                'id'       => 3,
                'id_post'  => 2,
                'position' => $name,

                'phone' => '0758462559',
                'image'=> $images,
            ],
            [
                'id'       => 4,
                'id_post'  => 2,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 5,
                'id_post'  => 3,
                'position' => $name,

                'phone' => '0758462559',
                'image'=> $images,
            ],
            [
                'id'       => 6,
                'id_post'  => 3,
                'position' => $name,
                'phone'    => '0856851255',
                'image'    => 'user-4.jpg',
            ],
            [
                'id'       => 7,
                'id_post'  => 4,
                'position' => $name,
                'phone'    => '0758462559',
                'image'=> $images,
            ],
            [
                'id'       => 8,
                'id_post'  => 4,
                'position' => $name,

                'phone' => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 9,
                'id_post'  => 5,
                'position' => $name,

                'phone' => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 10,
                'id_post'  => 5,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 11,
                'id_post'  => 6,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 12,
                'id_post'  => 6,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 13,
                'id_post'  => 7,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 14,
                'id_post'  => 7,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 15,
                'id_post'  => 8,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 16,
                'id_post'  => 8,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 17,
                'id_post'  => 9,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 18,
                'id_post'  => 9,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 19,
                'id_post'  => 10,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
            [
                'id'       => 20,
                'id_post'  => 10,
                'position' => $name,
                'phone'    => '0856851255',
                'image'=> $images,
            ],
           
        ];

        foreach ($data as $item){
            DB::table('contacts')->insert($item);

        }
    }
}
