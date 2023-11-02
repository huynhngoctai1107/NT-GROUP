<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmailNews extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'id'      => 1,
                'email' => 'muoiman@gmail.com',
              'interaction_count' => 0 ,
            ],
            [
                'id'      => 2,
                'email' => 'tuyetngan17072003z@gmail.com',
                'interaction_count' => 0 ,
            ],
            [
                'id'      => 3,
                'email' => 'nganlttpc04307@fpt.edu.vn',
                'interaction_count' => 0 ,
            ],
            [
                'id'      => 4,
                'email' => 'duyhoa102201@gmail.com',
                'interaction_count' => 0 ,
            ],
            [
                'id'      => 5,
                'email' => 'hoandps23837@fpt.edu.vn',
                'interaction_count' => 0 ,
            ],




        ];
        foreach ($data as $item){
            DB::table('email_news')->insert($item);
        }
    }
}
