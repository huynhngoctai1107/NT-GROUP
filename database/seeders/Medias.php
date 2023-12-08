<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Medias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            [
                'id'      => 1,
                'id_post' => 1,
                'image'   => '0001-post.jpg',
            ],
            [
                'id'      => 2,
                'id_post' => 1,
                'image'   => '0002-post.jpg',
            ],
            [
                'id'      => 3,
                'id_post' => 2,
                'image'   => '0003-post.jpg',
            ],
            [
                'id'      => 4,
                'id_post' => 2,
                'image'   => '0004-post.jpg',
            ],
            [
                'id'      => 5,
                'id_post' => 2,
                'image'   => '0005-post.jpg',
            ],
            [
                'id'      => 6,
                'id_post' => 3,
                'image'   => '0006-post.jpg',
            ],
            [
                'id'      => 7,
                'id_post' => 3,
                'image'   => '0007-post.jpg',
            ],
            [
                'id'      => 8,
                'id_post' => 4,
                'image'   => '0008-post.jpg',
            ],
            [
                'id'      => 9,
                'id_post' => 4,
                'image'   => '0009-post.jpg',
            ],
            [
                'id'      => 10,
                'id_post' => 5,
                'image'   => '00010-post.jpg',
            ],
            [
                'id'      => 11,
                'id_post' => 5,
                'image'   => '00011-post.jpg',
            ],
            [
                'id'      => 12,
                'id_post' => 6,
                'image'   => '00012-post.jpg',
            ],
            [
                'id'      => 13,
                'id_post' => 6,
                'image'   => '00013-post.jpg',
            ],
            [
                'id'      => 14,
                'id_post' => 7,
                'image'   => '00014-post.jpg',
            ],
            [
                'id'      => 15,
                'id_post' => 7,
                'image'   => '00015-post.jpg',
            ],
            [
                'id'      => 16,
                'id_post' => 8,
                'image'   => '00016-post.jpeg',
            ], [
                'id'      => 17,
                'id_post' => 8,
                'image'   => '00017-post.jpeg',
            ],
            [
                'id'      => 18,
                'id_post' => 9,
                'image'   => '00018-post.jpeg',
            ],
            [
                'id'      => 19,
                'id_post' => 3,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 20,
                'id_post' => 9,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 21,
                'id_post' => 10,
                'image'   => '00016-post.jpg',
            ],
            [
                'id'      => 22,
                'id_post' => 10,
                'image'   => '00017-post.jpg',
            ],
            [
                'id'      => 23,
                'id_post' => 11,
                'image'   => '00018-post.jpg',
            ],
            [
                'id'      => 24,
                'id_post' => 11,
                'image'   => '00019-post.jpg',
            ],
            [
                'id'      => 25,
                'id_post' => 12,
                'image'   => '00020-post.jpg',
            ],
            [
                'id'      => 26,
                'id_post' => 12,
                'image'   => '00021-post.jpeg',
            ],
            [
                'id'      => 27,
                'id_post' => 13,
                'image'   => '00022-post.jpeg',
            ],
            [
                'id'      => 28,
                'id_post' => 13,
                'image'   => '00023-post.jpeg',
            ],
            [
                'id'      => 29,
                'id_post' => 14,
                'image'   => '00024-post.jpeg',
            ],
            [
                'id'      => 30,
                'id_post' => 14,
                'image'   => '00018-post.jpeg',
            ],
            [
                'id'      => 31,
                'id_post' => 15,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 32,
                'id_post' => 15,
                'image'   => '00014-post.jpg',
            ],
            [
                'id'      => 33,
                'id_post' => 16,
                'image'   => '00011-post.jpg',
            ],
            [
                'id'      => 34,
                'id_post' => 17,
                'image'   => '00020-post.jpg',
            ],
            [
                'id'      => 35,
                'id_post' => 18,
                'image'   => '00021-post.jpg',
            ],
            [
                'id'      => 36,
                'id_post' => 18,
                'image'   => '00022-post.jpg',
            ],
            [
                'id'      => 37,
                'id_post' => 19,
                'image'   => '00023-post.jpg',
            ],
            [
                'id'      => 38,
                'id_post' => 19,
                'image'   => '00024-post.jpg',
            ],
            [
                'id'      => 39,
                'id_post' => 20,
                'image'   => '00025-post.jpg',
            ],
            [
                'id'      => 40,
                'id_post' => 20,
                'image'   => '00026-post.jpg',
            ],
            [
                'id'      => 41,
                'id_post' => 21,
                'image'   => '00027-post.jpg',
            ],
            [
                'id'      => 42,
                'id_post' => 21,
                'image'   => '00018-post.jpeg',
            ],
            [
                'id'      => 43,
                'id_post' => 22,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 45,
                'id_post' => 22,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 46,
                'id_post' => 23,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 47,
                'id_post' => 23,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 48,
                'id_post' => 24,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 49,
                'id_post' => 24,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 50,
                'id_post' => 25,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 51,
                'id_post' => 25,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 52,
                'id_post' => 26,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 53,
                'id_post' => 26,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 54,
                'id_post' => 27,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 55,
                'id_post' => 27,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 56,
                'id_post' => 28,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 57,
                'id_post' => 28,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 58,
                'id_post' => 29,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 59,
                'id_post' => 29,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 60,
                'id_post' => 30,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 61,
                'id_post' => 30,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 62,
                'id_post' => 31,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 63,
                'id_post' => 31,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 64,
                'id_post' => 32,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 65,
                'id_post' => 32,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 66,
                'id_post' => 33,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 67,
                'id_post' => 33,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 68,
                'id_post' => 34,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 69,
                'id_post' => 34,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 70,
                'id_post' => 35,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 71,
                'id_post' => 35,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 72,
                'id_post' => 36,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 73,
                'id_post' => 36,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 74,
                'id_post' => 37,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 75,
                'id_post' => 37,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 76,
                'id_post' => 38,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 77,
                'id_post' => 38,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 78,
                'id_post' => 39,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 79,
                'id_post' => 39,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 80,
                'id_post' => 40,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 81,
                'id_post' => 40,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 82,
                'id_post' => 41,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 83,
                'id_post' => 41,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 84,
                'id_post' => 42,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 85,
                'id_post' => 42,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 86,
                'id_post' => 43,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 87,
                'id_post' => 43,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 88,
                'id_post' => 44,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 89,
                'id_post' => 44,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 90,
                'id_post' => 45,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 91,
                'id_post' => 45,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 92,
                'id_post' => 46,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 93,
                'id_post' => 46,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 94,
                'id_post' => 47,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 95,
                'id_post' => 47,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 96,
                'id_post' => 48,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 97,
                'id_post' => 48,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 98,
                'id_post' => 49,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 99,
                'id_post' => 49,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 100,
                'id_post' => 50,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 101,
                'id_post' => 50,
                'image'   => '00020-post.jpeg',
            ],
        ];


        foreach ($images as $item){
            DB::table('medias')->insert($item);

        }
    }
}
