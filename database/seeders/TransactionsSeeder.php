<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $data = [

            [
                'id'                      => 1,
                'id_category_transaction' => 1,
                'id_user'                 => 1,
                'surplus'                 => 0,
                'voucher'                 => '',
                'price'                   => 100000,
                'status'                  => 1,
                'content'                 => 'Giao dịch thành công',
                'created_at'              => date('Y-m-d'),
            ],
            ['id'                      => 2,
             'id_category_transaction' => 2,
             'id_user'                 => 2,
             'surplus'                 => 100000,
             'voucher'                 => '',
             'price'                   => - 50000,
             'status'                  => 1,
             'content'                 => 'Giao dịch thành công',
             'created_at'              => date('Y-m-d'),
            ],
        ];
        foreach ($data as $item){
            DB::table('transactions')->insert($item);
        }
    }
}
