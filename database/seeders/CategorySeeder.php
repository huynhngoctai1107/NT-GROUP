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
                'name'       => 'Nhà riêng',
                'slug'       => 'nha-rieng',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 2,
                'name'       => 'Nhà phố thương mại Shophouse',
                'slug'       => Str::slug('Nhà phố thương mại Shophouse'),
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
                'name'       => 'Nhà trọ, phòng trọ',
                'slug'       => Str::slug('Nhà trọ, phòng trọ'),
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 5,
                'name'       => 'Nhà mặt phố',
                'slug'       => 'Nha-mat-pho',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 6,
                'name'       => 'Nhà biệt thự, liền kề',
                'slug'       => Str::slug('Nhà biệt thự, liền kề'),
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 7,
                'name'       => 'Bất động sản khác',
                'slug'       => Str::slug('Bất động sản khác'),
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ], [
                'id'         => 8,
                'name'       => 'Đất',
                'slug'       => 'dat',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 9,
                'name'       => 'Văn Phòng',
                'slug'       => 'van-phong',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ]];

        foreach ($data as $item){
            $model->AddCategory($item);

        }
    }
}
