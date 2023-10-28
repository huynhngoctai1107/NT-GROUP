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
                'id_post' => 1,
                'image'   => '0003-post.jpg',
            ],
            [
                'id'      => 4,
                'id_post' => 1,
                'image'   => '0004-post.jpg',
            ],
            [
                'id'      => 5,
                'id_post' => 2,
                'image'   => '0005-post.jpg',
            ],
            [
                'id'      => 6,
                'id_post' => 2,
                'image'   => '0006-post.jpg',
            ],
            [
                'id'      => 7,
                'id_post' => 2,
                'image'   => '0007-post.jpg',
            ],
            [
                'id'      => 8,
                'id_post' => 2,
                'image'   => '0008-post.jpg',
            ],
            [
                'id'      => 9,
                'id_post' => 2,
                'image'   => '0009-post.jpg',
            ],
            [
                'id'      => 10,
                'id_post' => 2,
                'image'   => '00010-post.jpg',
            ],
            [
                'id'      => 11,
                'id_post' => 4,
                'image'   => '00011-post.jpg',
            ],
            [
                'id'      => 12,
                'id_post' => 4,
                'image'   => '00012-post.jpg',
            ],
            [
                'id'      => 13,
                'id_post' => 4,
                'image'   => '00013-post.jpg',
            ],
            [
                'id'      => 14,
                'id_post' => 4,
                'image'   => '00014-post.jpg',
            ],
            [
                'id'      => 15,
                'id_post' => 4,
                'image'   => '00015-post.jpg',
            ],
            [
                'id'      => 16,
                'id_post' => 3,
                'image'   => '00016-post.jpeg',
            ], [
                'id'      => 17,
                'id_post' => 3,
                'image'   => '00017-post.jpeg',
            ],
            [
                'id'      => 18,
                'id_post' => 3,
                'image'   => '00018-post.jpeg',
            ],
            [
                'id'      => 19,
                'id_post' => 3,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 20,
                'id_post' => 3,
                'image'   => '00020-post.jpeg',
            ],
            [
                'id'      => 21,
                'id_post' => 4,
                'image'   => '00016-post.jpg',
            ],
            [
                'id'      => 22,
                'id_post' => 4,
                'image'   => '00017-post.jpg',
            ],
            [
                'id'      => 23,
                'id_post' => 4,
                'image'   => '00018-post.jpg',
            ],
            [
                'id'      => 24,
                'id_post' => 4,
                'image'   => '00019-post.jpg',
            ],
            [
                'id'      => 25,
                'id_post' => 5,
                'image'   => '00020-post.jpg',
            ],
            [
                'id'      => 26,
                'id_post' => 5,
                'image'   => '00021-post.jpeg',
            ],
            [
                'id'      => 27,
                'id_post' => 5,
                'image'   => '00022-post.jpeg',
            ],
            [
                'id'      => 28,
                'id_post' => 6,
                'image'   => '00023-post.jpeg',
            ],
            [
                'id'      => 29,
                'id_post' => 6,
                'image'   => '00024-post.jpeg',
            ],
            [
                'id'      => 30,
                'id_post' => 6,
                'image'   => '00018-post.jpeg',
            ],
            [
                'id'      => 31,
                'id_post' => 6,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 32,
                'id_post' => 7,
                'image'   => '00014-post.jpg',
            ],
            [
                'id'      => 33,
                'id_post' => 7,
                'image'   => '00011-post.jpg',
            ],
            [
                'id'      => 34,
                'id_post' => 7,
                'image'   => '00020-post.jpg',
            ],
            [
                'id'      => 35,
                'id_post' => 8,
                'image'   => '00021-post.jpg',
            ],
            [
                'id'      => 36,
                'id_post' => 8,
                'image'   => '00022-post.jpg',
            ],
            [
                'id'      => 37,
                'id_post' => 9,
                'image'   => '00023-post.jpg',
            ],
            [
                'id'      => 38,
                'id_post' => 9,
                'image'   => '00024-post.jpg',
            ],
            [
                'id'      => 39,
                'id_post' => 9,
                'image'   => '00025-post.jpg',
            ],
            [
                'id'      => 40,
                'id_post' => 10,
                'image'   => '00026-post.jpg',
            ],
            [
                'id'      => 41,
                'id_post' => 10,
                'image'   => '00027-post.jpg',
            ],
            [
                'id'      => 42,
                'id_post' => 10,
                'image'   => '00018-post.jpeg',
            ],
            [
                'id'      => 43,
                'id_post' => 10,
                'image'   => '00019-post.jpeg',
            ],
            [
                'id'      => 44,
                'id_post' => 10,
                'image'   => '00020-post.jpeg',
            ],
        ];


        foreach ($images as $item){
            DB::table('medias')->insert($item);

        }
    }
}
