<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run(){
        $model = new Category();
        $data  = [
            [
                'id'         => 1,
                'name'       => 'Đất ',
                'slug'       => 'dat',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 2,
                'name'       => 'Nhà Trọ',
                'slug'       => 'nha-tro',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],

            [
                'id'         => 3,
                'name'       => 'Căn Hộ',
                'slug'       => 'can-ho',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 4,
                'name'       => 'Văn Phòng',
                'slug'       => 'van-phong',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 5,
                'name'       => 'Nhà',
                'slug'       => 'nha',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],


        ];
        foreach ($data as $item){
            $model->AddCategory($item);

        }
    }
}
