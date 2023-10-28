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
                'id_acreage'    => 2,
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
                'acreages'      => 8,
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
                'acreages'      => 8,
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
            ],
            [
                'id'            => 3,
                'id_category'   => 2,
                'id_demand'     => 1,
                'id_user'       => 3,
                'id_price'      => 8,
                'id_acreage'    => 12,
                'slug'          => 'cho-thue-nha-tret-2-lau-hem-11-nguyen-van-linh-an-khanh-ninh-kieu-can-tho',
                'title'         => 'CHỦ GỬI CHO THUÊ NHÀ TRỆT 2 LẦU HẺM 11 ĐƯỜNG NGUYỄN VĂN LINH - AN KHÁNH - NINH KIỀU - CẦN THƠ',
                'content'       => 'CHỦ GỬI CHO THUÊ NHÀ TRỆT 2 LẦU HẺM 11 ĐƯỜNG NGUYỄN VĂN LINH - AN KHÁNH - NINH KIỀU - CẦN THƠ ',
                'price'         => 8300000000,
                'acreages'      => 8,
                'subtitles'     => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news' => 1,
                'link_youtube'  => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'       => 'Thành phố Cần Thơ - Quận Cái Răng - Phường Hưng Phú - 123 Quốc lộ 1',
                'status'        => 1,
                'delete'        => 0,
                'number_views'  => 200,
                'longitude'     => '105.73966156616213',
                'latitude'      => '10.009167913560061',
                'compilation'   => '',
                'created_at'    => date('Y-m-d'),
            ],
            [
                'id'            => 4,
                'id_category'   => 5,
                'id_demand'     => 3,
                'id_user'       => 2,
                'id_price'      => 7,
                'id_acreage'    => 2,
                'slug'          => 'giam-gia-cuc-soc-cat-lo-1-1-ty-ban-nha-moi-xay-1-tret-2-lau-san-thuong',
                'title'         => 'GIẢM GIÁ CỰC SỐC CẮT LỖ 1,1 TỶ BÁN NHÀ MỚI XÂY 1 TRỆT 2 LẦU, SÂN THƯỢNG',
                'content'       => 'GIẢM GIÁ CỰC SỐC CẮT LỖ 1,1 TỶ
                BÁN NHÀ MỚI XÂY 1 TRỆT 2 LẦU, SÂN THƯỢNG
                ĐƯỜNG SỐ 13 KHU VĂN HOÁ TÂY ĐÔ - HƯNG THẠNH - CÁI RĂNG - CẦN THƠ
                - Diện tích: 5m x19.75 m = 98.75 m2 - DTSD khoản = 400 m2
                - Pháp lý: Sổ hồng hoàn công
                - Hướng: Tây nam
                - Lộ giới: 15.5M + Hẻm kỹ thuật phía sau 2m
                - Giá mới: 6.8 tỷ TL
                - Vị trí: Đường số 01 thông thoáng, ngay chợ, cách trường học cấp 1.2 200M, cách bờ kè 15m, đối diện công viên, thích hợp ở, kinh doanh, spa, phòng mạch...
                - Kết cấu nhà gồm: 1 phòng khách rộng rãi đậu ôtô, 4 phòng ngủ lớn, 5 toilet, 1 nhà ăn + bếp, 1 sân phơi, sân thượng + ban công thoáng mát. ',
                'price'         => 6350000000,
                'acreages'      => 10,
                'subtitles'     => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news' => 1,
                'link_youtube'  => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'       => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Khánh - 123 Nguyễn Văn Cừ',
                'status'        => 1,
                'delete'        => 0,
                'number_views'  => 200,
                'longitude'     => '105.75465202331543',
                'latitude'      => '10.033513316182958',
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
        ];

        foreach ($post as $item){
            DB::table('posts')->insert($item);

        }
        foreach ($images as $item){
            DB::table('medias')->insert($item);

        }

    }
}
