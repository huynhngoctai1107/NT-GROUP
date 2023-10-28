<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [

            [
                'id'       => 1,
                'name_min' => 0,
                'name_max' => 200000000,

            ],
            [
                'id'       => 2,
                'name_min' => 200000000,
                'name_max' => 400000000,

            ],
            [
                'id'       => 3,
                'name_min' => 400000000,
                'name_max' => 600000000,

            ],
            [
                'id'       => 4,
                'name_min' => 600000000,
                'name_max' => 1000000000,

            ],
            [
                'id'       => 5,
                'name_min' => 1000000000,
                'name_max' => 2000000000,

            ],
            [
                'id'       => 6,
                'name_min' => 2000000000,
                'name_max' => 4000000000,

            ],
            [
                'id'       => 7,
                'name_min' => 4000000000,
                'name_max' => 7000000000,

            ],
            [
                'id'       => 8,
                'name_min' => 7000000000,
                'name_max' => 10000000000,

            ],
            [
                'id'       => 9,
                'name_min' => 10000000000,
                'name_max' => 200000000000,

            ],
            [
                'id'       => 10,
                'name_min' => 20000000000,
                'name_max' => 500000000000,

            ],


        ];
        foreach ($data as $item){
            DB::table('prices')->insert($item);
        }
    }
}
