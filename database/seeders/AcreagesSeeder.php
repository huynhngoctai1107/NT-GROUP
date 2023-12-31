<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcreagesSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [

            [
                'id'      => 1,
                'name_min' => 0,
                'name_max' => 5,

            ],
            [
                'id'      => 2,
                'name_min' => 5,
                'name_max' => 10,

            ],
            [
                'id'      => 3,
                'name_min' => 10,
                'name_max' => 15,

            ],
            [
                'id'      => 4,
                'name_min' => 15,
                'name_max' => 20,

            ],
            [
                'id'      => 5,
                'name_min' => 20,
                'name_max' => 25,

            ],
            [
                'id'      => 6,
                'name_min' => 25,
                'name_max' => 35,

            ],
            [
                'id'      => 7,
                'name_min' => 35,
                'name_max' => 50,

            ],
            [
                'id'      => 8,
                'name_min' => 50,
                'name_max' => 100,

            ],
            [
                'id'      => 9,
                'name_min' => 50,
                'name_max' => 100,

            ],
            [
                'id'      => 10,
                'name_min' => 100,
                'name_max' => 200,

            ],
            [
                'id'      => 11,
                'name_min' => 200,
                'name_max' => 500,

            ],
            [
                'id'      => 12,
                'name_min' => 500,
                'name_max' => 1000,

            ],
            [
                'id'      => 13,
                'name_min' => 1000,
                'name_max' => 3000,

            ],
            [
                'id'      => 14,
                'name_min' => 3000,
                'name_max' => 5000,

            ],
            [
                'id'      => 15,
                'name_min' => 5000,
                'name_max' => 10000,

            ],

        ];
        foreach ($data as $item){
            DB::table('acreages')->insert($item);
        }
    }
}
