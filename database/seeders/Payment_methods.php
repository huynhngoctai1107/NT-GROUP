<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Payment_methods extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'id'       => 1,
                'name' => 'Thanh toán qua VNPAY',
                'status' => 1,

            ],
            [
                'id'       => 2,
                'name' => 'Thanh toán qua PayPal',
                'status' => 1,

            ],
            [
                'id'       => 3,
                'name' => 'Thanh toán qua MOMO',
                'status' =>0,

            ],
            [
                'id'       => 4,
                'name' => 'Thanh toán qua Ngân Hàng',
                'status' => 0,

            ],
            [
                'id'       => 5,
                'name' => 'Rút tiền',
                'status' => 1,

            ],



        ];
        foreach ($data as $item){
            DB::table('payment_methods')->insert($item);
        }
    }
}
