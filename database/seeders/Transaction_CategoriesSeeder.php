<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Transaction_CategoriesSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [

            [
                'id'         => 1,
                'name'       => 'Nạp tiền',
                'slug'       => 'nap-tien',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 2,
                'name'       => 'Mua tin vip',
                'slug'       => 'mua-tip-vip',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
        ];
        foreach ($data as $item){
            DB::table('transaction_categories')->insert($item);
        }
    }
}
