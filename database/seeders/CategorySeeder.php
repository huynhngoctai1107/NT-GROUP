<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(){
        $data = [
            ['id' => 3, 'id_demand'=>1, 'name' => 'thuê trọ', 'slug' => 'thue-nha', 'note' => 'test',]
        ];

        foreach ($data as $item){
            Category::create($item);

        }
    }
}
