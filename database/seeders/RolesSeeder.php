<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{

        $data = [
            [
                'id'   => 1,
                'name' => 'Quản Trị Viên',
            ],
            [
                'id'   => 2,
                'name' => 'Biên Tập Viên',

            ],

            [
                'id'   => 3,
                'name' => 'Khách Hàng',

            ],


        ];
        foreach ($data as $item){
            DB::table('roles')->insert($item);

        }
    }
}
