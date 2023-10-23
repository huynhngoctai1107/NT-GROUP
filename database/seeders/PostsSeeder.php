<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder{

    /**
     * Run the database seeds.
     */
    public function run()
    : void{
        $post   = [

            [
                'id'            => 1,
                'id_category'   => 3,
                'id_demand'     => 1,
                'id_user'       => 1,
                'id_price'      => 1,
                'id_acreage'    => 1,
                'slug'          => 'cho-thue-mini-house-xay-moi-chi-con-1-phong-duy-nhat',
                'title'         => 'CHO THUÊ MINI HOUSE XÂY MỚI CHỈ CÒN 1 PHÒNG DUY NHẤT',
                'content'       => 'CHỈ CÒN 1 PHÒNG DUY NHẤT CHO THUÊ MINI HOUSE MẶT TIỀN ĐƯỜNG NGUYỄN VĂN LINH MỚI 100%
                Nhà cao ráo không ngập, đường cũng không ngập
                Có khóa vân tay riêng , giờ giấc tự do, được nuôi PET
                GẦN ĐẠI HỌC CẦN THƠ ,ĐẠI HỌC Y DƯỢC ,ĐẠI HỌC FPT, ĐẠI HỌC NAM CẦN THƠ
                BÁN KÍNH 2KM CÓ ĐẦY ĐỦ CÁC BỆNH VIỆN LỚN NHẤT CẦN THƠ
                Diện tích: 4 x 5m dtsd :35 m2, có bãi đậu ô tô
                Kết cấu: phòng khách, bếp, tolet và gác lửng, phòng ngủ có cửa sổ.
                Giá 4 triệu : Nội thất gồm Máy lạnh , máy nước nóng, tủ treo đồ decor, rèm cửa , rèm tầng lửng, 1 Sofa, 1 bàn Học.
                Giá: 5 triệu : Đầy đủ Nội thất: Sofa, Máy lạnh, tủ lạnh, màn cửa, tủ bếp,tủ quần áo, máy nước nóng.
                Liên hệ: 0979.660.889',
                'price'         => 150000000,
                'subtitles'     => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news' => 0,
                'link_youtube'  => 'https://youtu.be/qKrqdTVrEMM?si=iUUbbVvEOOwArugJ',
                'address'       => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Bình - 170 Hoàng Quốc Việt',
                'status'        => 1,
                'delete'        => 0,
                'number_views'  => 999,
                'longitude'     => '105.55567485205235',
                'latitude'      => '9.92902662619871',
                'compilation'   => '',
                'created_at'    => date('Y-m-d'),
            ],
            [
                'id'            => 2,
                'id_category'   => 5,
                'id_demand'     => 3,
                'id_user'       => 1,
                'id_price'      => 2,
                'id_acreage'    => 2,
                'slug'          => 'ban-nha-mat-tien-duong-tran-nam-phu-gan-ho-bun-xang',
                'title'         => 'BÁN NHÀ MẶT TIỀN ĐƯỜNG TRẦN NAM PHÚ GẦN HỒ BÚN XÁNG',
                'content'       => 'BÁN NHÀ MẶT TIỀN ĐƯỜNG TRẦN NAM PHÚ GẦN HỒ BÚN XÁNG
                Diện tích: 4 x 30 = 120m2.
                - DTSD= 240m2
                - Pháp lý thổ cư 100%
                - Lộ giới 12m
                - Hướng Đông bắc
                - Vị trí: Cách bờ hồ 50m. Nằm trên con đường ăn uống sầm uất nhất, thông xuống bờ hồ bún Xáng. Xung quanh nhà cửa đông đúc đèn đường , đầy đủ tiện ích.
                Liên hệ 0979.660.889',
                'price'         => 350000000,
                'subtitles'     => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news' => 0,
                'link_youtube'  => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'       => 'Thành phố Cần Thơ - Quận Cái Răng - Phường Hưng Thạnh - 254 Huỳnh thị hai',
                'status'        => 1,
                'delete'        => 0,
                'number_views'  => 200,
                'longitude'     => '105.72046981583686',
                'latitude'      => '10.056292916135257',
                'compilation'   => '',
                'created_at'    => date('Y-m-d'),
            ]


        ];
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
        ];

        foreach ($post as $item){
            DB::table('posts')->insert($item);

        }
        foreach ($images as $item){
            DB::table('medias')->insert($item);

        }

    }
}
