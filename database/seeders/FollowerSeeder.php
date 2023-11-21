<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowerSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [
            [
                'id'          => 1,
                'id_user'     => 1,
                'id_follower' => 2
            ],
            [
                'id'          => 2,
                'id_user'     => 1,
                'id_follower' => 3
            ],
            [
                'id'          => 3,
                'id_user'     => 2,
                'id_follower' => 1
            ], [
                'id'          => 4,
                'id_user'     => 2,
                'id_follower' => 3
            ],
            [
                'id'          => 5,
                'id_user'     => 3,
                'id_follower' => 1
            ], [
                'id'          => 6,
                'id_user'     => 3,
                'id_follower' => 2
            ],
        ];
        foreach ($data as $item){
            DB::table('followers')->insert($item);

        }
    }
}
