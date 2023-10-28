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
        $data = [
            [
                'id'       => 1,
                'id_post'  => 1,
                'position' => 'Giám đốc',
                'phone'    => '0949615859',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 2,
                'id_post'  => 1,
                'position' => 'Kế toán',
                'phone'    => '0475982351',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 3,
                'id_post'  => 2,
                'position' => 'Giám đốc ',
                'phone'    => '0758462559',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 4,
                'id_post'  => 2,
                'position' => 'Thứ kí',
                'phone'    => '0856851255',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 5,
                'id_post'  => 3,
                'position' => 'Giám đốc ',
                'phone'    => '0758462559',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 6,
                'id_post'  => 3,
                'position' => 'Thứ kí',
                'phone'    => '0856851255',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 7,
                'id_post'  => 4,
                'position' => 'Giám đốc',
                'phone'    => '0758462559',
                'image'    => 'user-2.jpg',
            ],
            [
                'id'       => 8,
                'id_post'  => 4,
                'position' => 'Phòng kế toán',
                'phone'    => '0856851255',
                'image'    => 'user-2.jpg',
            ],

        ];

        foreach ($data as $item){
            DB::table('contacts')->insert($item);

        }
    }
}
