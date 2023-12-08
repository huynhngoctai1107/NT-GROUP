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
                'fullname'  => 'Duy Hòa',
                'slug'      => 'duy-hoa',
                'social_id' => '0',
                'email'     => 'duyhoa102201@gmail.com',
                'image'     => 'user-1.png',
                'id_role'   => 3,
                'phone'     => '0949585858',
                'address'   => 'Phường An Khánh, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'  => Hash::make('Duyhoa@123'),
                'wallet'    => 0,
                'delete'    => 0,
                'token'     => strtoupper(Str::random(10)),
                'gender'    => 'Nam',
                'status'    => 1
            ],
            [
                'id'         => 2,
                'fullname'   => 'Lê Hồng Nhi',
                'slug'       => 'le-hong-nhi',
                'social_id'  => '0',
                'email'      => 'amimon552@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0948585965',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('bangtan@%.com'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 3,
                'fullname'   => 'Tuyết Ngân',
                'slug'       => 'tuyet-ngan',
                'social_id'  => '0',
                'email'      => 'tuyetngan17072003z@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('17072003Ngan@'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 4,
                'fullname'   => 'Nguễn Văn A',
                'slug'       => 'nguyen-van-a',
                'social_id'  => '0',
                'email'      => 'hoandps23837@fpt.edu.vn',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 5,
                'fullname'   => 'Nguyễn Văn B',
                'slug'       => 'nguyen-van-c',
                'social_id'  => '0',
                'email'      => '0306191027@caothang.edu.vn',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 6,
                'fullname'   => 'Nguyễn Văn D',
                'slug'       => 'nguyen-van-d',
                'social_id'  => '0',
                'email'      => 'duyhoa28122001@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ], [
                'id'         => 7,
                'fullname'   => 'Nguyễn Văn E',
                'slug'       => 'nguyen-van-e',
                'social_id'  => '0',
                'email'      => 'tieutam102201@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 8,
                'fullname'   => 'Lưu Thị Bảo Trân',
                'slug'       => 'luu-thi-bao-tran',
                'social_id'  => '0',
                'email'      => 'hoand28.dev@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 9,
                'fullname'   => 'Mỹ Ngân',
                'slug'       => 'my-ngan',
                'social_id'  => '0',
                'email'      => 'toan11156@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],
            [
                'id'         => 10,
                'fullname'   => 'Hồng Ngọc',
                'slug'       => 'hong-ngoc',
                'social_id'  => '0',
                'email'      => 'toan11158@gmail.com',
                'image'      => 'user-2.jpg',
                'id_role'    => 3,
                'phone'      => '0125849578',
                'address'    => 'Phường Hương Lợi, Quận Ninh Kiều, Thành Phố Cần Thơ',
                'password'   => Hash::make('Nt-group.top'),
                'wallet'     => 0,
                'token'      => strtoupper(Str::random(10)),
                'gender'     => 'Nữ',
                'delete'     => 0,
                'status'     => 1,
                'created_at' => date('Y-m-d'),

            ],


        ];

        foreach ($data as $item){
            DB::table('users')->insert($item);

        }
    }
}
