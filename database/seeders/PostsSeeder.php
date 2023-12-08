<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class PostsSeeder extends Seeder{

    /**
     * Run the database seeds.
     */

    public function run()
    : void{
        include(base_path('\Database\Seeders\simple_html_dom.php'));

        $arrContextOptions = [
            "ssl" => [
                "verify_peer"      => TRUE,
                "verify_peer_name" => TRUE,
            ],
        ];

        $links               = ['https://homedy.com/ban-nha-dat-huyen-phu-quoc-kien-giang','https://homedy.com/ban-can-ho-kien-giang','https://homedy.com/ban-dat-kien-giang','https://homedy.com/ban-nha-mat-pho-kien-giang'];
        $post                = [];
        $id                  = 0;
        $coordinates_vietnam = [];

        for ($i = 0; $i < 30; $i ++){
            $longitude             = mt_rand(102, 109) + (mt_rand(0, 999) / 1000);
            $latitude              = mt_rand(8, 24) + (mt_rand(0, 999) / 1000);
            $coordinates_vietnam[] = ['longitude' => $longitude, 'latitude' => $latitude];
        }


        foreach ($links as $linkitem){

            $response = file_get_html($linkitem, 0, stream_context_create($arrContextOptions));

            $elements = $response->find('.product-item-top');

            foreach ($elements as $key => $element){
                $id ++;
                $title     = $element->find('.title.padding-hoz', 0)->{'title'};
                $address   = $element->find('li.address', 0)->plaintext;
                $subtitles = $element->find('.description.padding-hoz', 0)->plaintext;
                $parts     = explode(', ', $address);
                if (count($parts) === 4){
                    $customaddress = "Tĩnh " . $parts[3] . ' - ' . $parts[2] . ' - ' . $parts[1] . ' - ' . $parts[0];
                }elseif (count($parts) === 3){
                    $customaddress = "Tĩnh " . $parts[2] . ' - ' . $parts[1] . ' - ' . $parts[0];
                }elseif (count($parts) === 2){
                    $customaddress = "Tĩnh " . $parts[1] . ' - ' . $parts[0];
                }else{
                    $customaddress = "Tĩnh " . $parts[0]; // Trường hợp mảng không có phần tử nào
                }
                $link = $element->find('a.thumb-image', 0)->href;

                $simple = file_get_html("https://homedy.com/" . $link, 0,
                    stream_context_create($arrContextOptions));

                $content = $simple->find('.description.readmore', 0)->plaintext;

                $date        = $simple->find('.code', 0)->plaintext;
                $acreage     = $simple->find('.acreage', 0)->plaintext;
                $acreage     = explode(' ', $acreage);
                $prices      = [
                    150000000, 500000000, 600000000, 800000000, 900000000, 1000000000, 1100000000, 1200000000, 1250000000, 1300000000,
                    1400000000, 1600000000, 2000000000, 5000000000, 1000000000, 12000000000, 11000000000, 15000000000, 1600000000, 6000000000, 10000000000
                ];
                $randomIndex = rand(0, 20);
                $randomPrice = $prices[$randomIndex];

                $acreages       = [
                    10, 20, 30, 40, 60, 100, 120, 158, 200, 300, 400, 500, 600, 700, 800, 1000, 1500, 2000, 3000, 4000, 4500, 50000
                ];
                $randomIndex    = rand(0, 21);
                $randomAcreages = $acreages[$randomIndex];
                $categories     = $simple->find('.product-attributes--item', 0)
                                         ->find('span', 1)->plaintext;
                $demand         = $simple->find('.code', 2)->plaintext;
                $mappedValue    = ($demand === "Thuê") ? 1 : 2;
                $tableCategory  = new \App\Models\Category();
                $data           = $tableCategory->GetSeeder();

                $catogory = NULL;
                foreach ($data as $value){
                    if ($value->name === html_entity_decode($categories)){
                        $catogory = $value->id;
                        break;
                    }
                }
                $tablePrice  = new \App\Models\Price();
                $priceRanges = $tablePrice->GetPrice();
                $matchingId  = NULL;
                foreach ($priceRanges as $range){
                    if ($randomPrice >= $range->name_min && $randomPrice < $range->name_max){
                        $matchingId = $range->id;
                        break; // Nếu tìm thấy, thoát khỏi vòng lặp
                    }
                }
                $tableAcreage  = new \App\Models\Acreage();
                $acreageRanges = $tableAcreage->GetAcreage();
                $acreageId     = NULL;
                foreach ($acreageRanges as $acreage){
                    if ($randomAcreages >= $acreage->name_min && $randomAcreages < $acreage->name_max){
                        $acreageId = $acreage->id;
                        break; // Nếu tìm thấy, thoát khỏi vòng lặp
                    }
                }
                $coordinates = rand(0, 29);
                $coordinate  = $coordinates_vietnam[$coordinates];
                $post[]      = [
                    'id'            => $id,
                    'id_category'   => $catogory ?? 1,
                    'id_demand'     => $mappedValue,
                    'id_user'       =>  rand(1, 10),
                    'id_price'      => $matchingId,
                    'id_acreage'    => $acreageId ?? 2 ,
                    'slug'          => Str::slug(html_entity_decode($title).Carbon::now()->second),
                    'title'         => html_entity_decode($title),
                    'content'       => $content,
                    'price'         => $randomPrice,
                    'acreages'      => $randomAcreages,
                    'subtitles'     => $subtitles,
                    'featured_news' =>  $expiration_date = rand(0, 1),
                    'expiration_date' => ($expiration_date == 1 ? Carbon::now()->addDays(30) : Null ) ,
                    'link_youtube'  => 'https://youtu.be/qKrqdTVrEMM?si=iUUbbVvEOOwArugJ',
                    'address'       => html_entity_decode($customaddress),
                    'status'        => 1,
                    'delete'        => 0,
                    'number_views'  => rand(1, 1000),
                    'longitude'     => $coordinate['longitude'],
                    'latitude'      => $coordinate['latitude'],
                    'compilation'   => '',
                    'created_at'    => trim(date('Y-m-d', strtotime(str_replace('/', '-', $date)))),
                ];


            }


        }


        foreach ($post as $item){
            DB::table('posts')->insert($item);

        }


    }
}
