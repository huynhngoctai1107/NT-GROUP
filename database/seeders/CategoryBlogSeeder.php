<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [
            [
                'id'          => 1,
                'name'     => 'Du Lịch',
                'slug' => 'du-lich',
                'description'=>'abc',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'          => 2,
                'name'     => 'Văn Hóa',
                'slug' => 'van-hoa',
                'description'=>'abc',
                'created_at' => date('Y-m-d'),
            ],
        ];
        foreach ($data as $item){
            DB::table('category_blogs')->insert($item);

        }
    }
}
