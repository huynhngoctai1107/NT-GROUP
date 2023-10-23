<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class VouchersSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [
            [
                'id'              => 1,
                'name'            => 'Giảm giá cho khách hàng nạp lần đầu',
                'code'            => 'XINCHAO30',
                'slug'            => 'giam-gia-cho-khach-hang-nap-lan-dau',
                'condition'       => 2,
                'discount'        => '30000',
                'quantify'        => '10',
                'status'          => 0,
                'expiration_date' => '2023-10-24',
                'content'         => 'Giành tặng cho khách hàng tin tưởng nạp lần đầu. X...',
                'image'           => 'voucher-30.png',
                'created_at'      => date('Y-m-d'),

            ],

        ];

        foreach ($data as $item){
            DB::table('vouchers')->insert($item);
        }
    }
}
