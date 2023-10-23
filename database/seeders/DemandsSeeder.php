<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Demand;

class DemandsSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run(){
        $model = new Demand();
        $data  = [
            [
                'id'         => 1,
                'name'       => 'Thuê',
                'slug'       => 'thue',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
            [
                'id'         => 2,
                'name'       => 'Mua',
                'slug'       => 'mua',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],

            [
                'id'         => 3,
                'name'       => 'Bán',
                'slug'       => 'ban',
                'note'       => '',
                'created_at' => date('Y-m-d'),
            ],
        ];
        foreach ($data as $item){
            $model->addDemands($item);

        }
    }
}
