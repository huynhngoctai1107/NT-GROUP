<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{


        $data = [
            [
                'id'        => 1,
                'fullname'  => 'Huỳnh Ngọc Tài',
                'social_id' => '0',
                'email'     => 'hoa@gmail.com',
                'image'     => 'user-1.png',
                'id_role'   => 3,
                'phone'     => '0949585858',
                'address'   => 'Phường An Khánh, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'  => Hash::make('Nt-group@123'),
                'wallet'    => 0,
                'token'     => strtoupper(Str::random(10)),
                'gender'    => 'Nam',
                'status'    => 1
            ],
            [
                'id'         => 2,
                'fullname'   => 'Nguyễn Minh Nhi',
                'social_id'  => '0',
                'email'      => 'nhi@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0948585965',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group@123'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],

        ];

        foreach ($data as $item){
            DB::table('users')->insert($item);

        }
    }
}