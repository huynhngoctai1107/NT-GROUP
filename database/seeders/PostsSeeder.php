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
        $post = [

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
                'id'              => 3,
                'id_category'     => 2,
                'id_demand'       => 1,
                'id_user'         => 3,
                'id_price'        => 8,
                'id_acreage'      => 12,
                'slug'            => 'cho-thue-nha-tret-2-lau-hem-11-nguyen-van-linh-an-khanh-ninh-kieu-can-tho',
                'title'           => 'CHỦ GỬI CHO THUÊ NHÀ TRỆT 2 LẦU HẺM 11 ĐƯỜNG NGUYỄN VĂN LINH - AN KHÁNH - NINH KIỀU - CẦN THƠ',
                'content'         => 'CHỦ GỬI CHO THUÊ NHÀ TRỆT 2 LẦU HẺM 11 ĐƯỜNG NGUYỄN VĂN LINH - AN KHÁNH - NINH KIỀU - CẦN THƠ ',
                'price'           => 8300000000,
                'acreages'        => 520,
                'subtitles'       => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news'   => 1,
                'expiration_date' => Carbon::now()->addDays(2),
                'link_youtube'    => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'         => 'Thành phố Cần Thơ - Quận Cái Răng - Phường Hưng Phú - 123 Quốc lộ 1',
                'status'          => 1,
                'delete'          => 0,
                'number_views'    => 200,
                'longitude'       => '105.73966156616213',
                'latitude'        => '10.009167913560061',
                'compilation'     => '',
                'created_at'      => date('Y-m-d'),
            ],
            [
                'id'              => 4,
                'id_category'     => 5,
                'id_demand'       => 3,
                'id_user'         => 2,
                'id_price'        => 7,
                'id_acreage'      => 2,
                'slug'            => 'giam-gia-cuc-soc-cat-lo-1-1-ty-ban-nha-moi-xay-1-tret-2-lau-san-thuong',
                'title'           => 'GIẢM GIÁ CỰC SỐC CẮT LỖ 1,1 TỶ BÁN NHÀ MỚI XÂY 1 TRỆT 2 LẦU, SÂN THƯỢNG',
                'content'         => 'GIẢM GIÁ CỰC SỐC CẮT LỖ 1,1 TỶ
                BÁN NHÀ MỚI XÂY 1 TRỆT 2 LẦU, SÂN THƯỢNG
                ĐƯỜNG SỐ 13 KHU VĂN HOÁ TÂY ĐÔ - HƯNG THẠNH - CÁI RĂNG - CẦN THƠ
                - Diện tích: 5m x19.75 m = 98.75 m2 - DTSD khoản = 400 m2
                - Pháp lý: Sổ hồng hoàn công
                - Hướng: Tây nam
                - Lộ giới: 15.5M + Hẻm kỹ thuật phía sau 2m
                - Giá mới: 6.8 tỷ TL
                - Vị trí: Đường số 01 thông thoáng, ngay chợ, cách trường học cấp 1.2 200M, cách bờ kè 15m, đối diện công viên, thích hợp ở, kinh doanh, spa, phòng mạch...
                - Kết cấu nhà gồm: 1 phòng khách rộng rãi đậu ôtô, 4 phòng ngủ lớn, 5 toilet, 1 nhà ăn + bếp, 1 sân phơi, sân thượng + ban công thoáng mát. ',
                'price'           => 6350000000,
                'acreages'        => 10,
                'subtitles'       => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news'   => 1,
                'expiration_date' => Carbon::now()->addDays(30),
                'link_youtube'    => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'         => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Khánh - 123 Nguyễn Văn Cừ',
                'status'          => 1,
                'delete'          => 0,
                'number_views'    => 200,
                'longitude'       => '105.75465202331543',
                'latitude'        => '10.033513316182958',
                'compilation'     => '',
                'created_at'      => date('Y-m-d'),
            ],
            [
                'id'              => 5,
                'id_category'     => 5,
                'id_demand'       => 3,
                'id_user'         => 3,
                'id_price'        => 9,
                'id_acreage'      => 5,
                'slug'            => Str::slug('Nhà đẹp lộ 4m phường An Cư, Ninh Kiều, Cần Thơ'),
                'title'           => 'Nhà đẹp lộ 4m phường An Cư, Ninh Kiều, Cần Thơ',
                'content'         => 'NHÀ ĐẸP PHƯỜNG AN CƯ, NINH KIỀU, CẦN THƠ
            - Hẻm 38 Trương Định. Thuộc Khu Vực 4, tiện lấy hộ khẩu học trường TH Lê Quý Đôn và Ngô Quyền.
            - Hẻm 4m Không Ngập Nước, gần ngã 3 dễ quay đầu xe.
            - Diện tích Cân Đối, Nở Hậu, 23.5 m2 thổ cư, sổ hồng hoàn công.
            - Hướng Đông Nam
            - Giá bán: 1.7 tỷ
            - - - - - - - - - - - - - - - - - -
            Xin liên hệ: 0914.634.165
            Khách quan tâm vui lòng alo trao đổi',
                'price'           => 150000000,
                'acreages'        => 25,
                'subtitles'       => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news'   => 1,
                'expiration_date' => Carbon::now()->addDays(30),
                'link_youtube'    => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'         => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường Xuân Khánh - Khu 2 đường 3/2',
                'status'          => 1,
                'delete'          => 0,
                'number_views'    => 250,
                'longitude'       => '105.7705307006836',
                'latitude'        => '10.029963540931723',
                'compilation'     => '',
                'created_at'      => date('Y-m-d'),
            ],
            [
                'id'              => 6,
                'id_category'     => 5,
                'id_demand'       => 3,
                'id_user'         => 3,
                'id_price'        => 6,
                'id_acreage'      => 7,
                'slug'            => Str::slug('Giảm 160Tr - Bán Nhà 1 Trệt 2 Lầu hẻm 11 Nguyễn Văn Linh - Thông Hồ Bún Xáng, Q.Ninh Kiều, Cần Thơ'),
                'title'           => 'Giảm 160Tr - Bán Nhà 1 Trệt 2 Lầu hẻm 11 Nguyễn Văn Linh - Thông Hồ Bún Xáng, Q.Ninh Kiều, Cần Thơ',
                'content'         => 'Đang cập nhật ',
                'price'           => 3350000000,
                'acreages'        => 43,
                'subtitles'       => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news'   => 1,
                'expiration_date' => Carbon::now()->addDays(10),
                'link_youtube'    => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'         => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Khánh - 315 Nguyễn Văn Linh',
                'status'          => 1,
                'delete'          => 0,
                'number_views'    => 270,
                'longitude'       => '105.75555324554443',
                'latitude'        => '10.029202869745285',
                'compilation'     => '',
                'created_at'      => date('Y-m-d'),
            ],
            [
                'id'              => 7,
                'id_category'     => 5,
                'id_demand'       => 1,
                'id_user'         => 2,
                'id_price'        => 7,
                'id_acreage'      => 8,
                'slug'            => Str::slug('BÁN NHÀ KDC CỬU LONG 1 TRỆT 2 LẦU'),
                'title'           => 'BÁN NHÀ KDC CỬU LONG 1 TRỆT 2 LẦU',
                'content'         => 'BÁN NHÀ 1 TRỆT 2 LẦU ĐƯỜNG SỐ 2 KHU DÂN CỬU LONG GẦN ĐƯỜNG TRẦN BẠCH ĐẰNG QUA ĐẠI HỌC Y DƯỢC
- Vị trí là con đường đẹp nhất khu hiện nay, gần ngay trục chính đi qua đại học y dược, thích hợp cho gia đình an cư

Nhà ốp đá Granite, gạch 800x800, cửa gỗ Cẩm Lai tự nhiên, gỗ MDF An Cường, cửa nhôm Xingfa, có 3 phòng ngủ, 4 Toilet, nội thất cao cấp…..
- Diện tích: 4 x 14m=56m2, diện tích sử dụng 168m2 sàn
- Hướng tây bắc
- Lộ giới: 15.5m
- Sổ hồng
- Giá: 4.5 tỷ',
                'price'           => 4350000000,
                'acreages'        => 56,
                'subtitles'       => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news'   => 1,
                'expiration_date' => Carbon::now()->addDays(10),
                'link_youtube'    => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'         => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Bình - 62 Nguyễn Văn Cừ Nối Dài',
                'status'          => 1,
                'delete'          => 0,
                'number_views'    => 200,
                'longitude'       => '105.75555324554443',
                'latitude'        => '10.029202869745285',
                'compilation'     => '',
                'created_at'      => date('Y-m-d'),
            ],
            [
                'id'            => 8,
                'id_category'   => 1,
                'id_demand'     => 3,
                'id_user'       => 2,
                'id_price'      => 8,
                'id_acreage'    => 11,
                'slug'          => Str::slug('Nền biệt thự đường số 1 KDC Nam Long 1, Hưng Thạnh, Cái Răng, Cần Thơ'),
                'title'         => 'Nền biệt thự đường số 1 KDC Nam Long 1, Hưng Thạnh, Cái Răng, Cần Thơ',
                'content'       => 'BÁN NỀN BIỆT THỰ NAM LONG 1, P.HƯNG THẠNH, Q.CÁI RĂNG, CẦN THƠ',
                'price'         => 8300000000,
                'acreages'      => 210,
                'subtitles'     => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news' => 0,
                'link_youtube'  => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'       => 'Thành phố Cần Thơ - Quận Cái Răng - Phường Hưng Phú - 79 Quang Trung',
                'status'        => 1,
                'delete'        => 0,
                'number_views'  => 200,
                'longitude'     => '105.7819676399231',
                'latitude'      => '10.016609276211863',
                'compilation'   => '',
                'created_at'    => date('Y-m-d'),
            ],
            [
                'id'              => 9,
                'id_category'     => 4,
                'id_demand'       => 1,
                'id_user'         => 2,
                'id_price'        => 1,
                'id_acreage'      => 11,
                'slug'            => Str::slug('CHO THUÊ NHÀ KHO ĐẸP MỚI 200m2 KDC HƯNG PHÚ CTY8 CẦN THƠ'),
                'title'           => 'CHO THUÊ NHÀ KHO ĐẸP MỚI 200m2 KDC HƯNG PHÚ CTY8 CẦN THƠ',
                'content'         => 'CHO THUÊ KHO ĐẸP MỚI 200m2 KDC HƯNG PHÚ CTY8 CẦN THƠ
                --------------
                - Diện tích: 10 x 20
                - Hướng Tây nam & đông nam
                - Lộ giới 16M, không cấm Xe continer
                Kết cấu: 
                - Trần la phông có quạt tản nhiệt, cửa sắt & nhôm Sifa cao cấp, phòng, có Bếp, toilet
                (Không điện 3 pha & Pccc)
                - Giá 9tr/tháng. Cọc 2 tháng
                KHO CAO RÁO, SẠCH SẼ...',
                'price'           => 90000000,
                'acreages'        => 200,
                'subtitles'       => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news'   => 1,
                'expiration_date' => Carbon::now()->addDays(10),
                'link_youtube'    => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'         => 'Thành phố Cần Thơ - Quận Cái Răng - Phường Hưng Thạnh - 20 Đ. D1',
                'status'          => 1,
                'delete'          => 0,
                'number_views'    => 200,
                'longitude'       => '105.77063798904419',
                'latitude'        => '10.00080320192167',
                'compilation'     => '',
                'created_at'      => date('Y-m-d'),
            ],
            [
                'id'            => 10,
                'id_category'   => 4,
                'id_demand'     => 1,
                'id_user'       => 3,
                'id_price'      => 1,
                'id_acreage'    => 2,
                'slug'          => Str::slug('Cần Sang Hoặc Cho Thuê Lại Quán Cơm Trưa Văn Phòng - Chiều Bán Lẩu Bò'),
                'title'         => 'Cần Sang Hoặc Cho Thuê Lại Quán Cơm Trưa Văn Phòng - Chiều Bán Lẩu Bò',
                'content'       => 'Cần Sang Hoặc Cho Thuê Lại Quán Cơm Trưa Văn Phòng - Chiều Bán Lẩu Bò',
                'price'         => 6350000000,
                'acreages'      => 297,
                'subtitles'     => 'MINI HOUSE có thể được sử dụng cho nhiều mục đích khác nhau, như nhà ở, văn phòng, hoặc nhà hàng, quán cà phê. Những căn nhà này thường được ưa chuộng...',
                'featured_news' => 0,
                'link_youtube'  => 'https://youtu.be/JnWqhQ9OSBU?si=z5BXiCUtB15ZoOy4',
                'address'       => 'Thành phố Cần Thơ - Quận Ninh Kiều - Phường An Bình - 168 Nguyễn Văn Cừ Nối Dài',
                'status'        => 1,
                'delete'        => 0,
                'number_views'  => 100,
                'longitude'     => '105.72283029556274',
                'latitude'      => '10.007966745376665',
                'compilation'   => '',
                'created_at'    => date('Y-m-d'),
            ],


        ];


        foreach ($post as $item){
            DB::table('posts')->insert($item);

        }


    }
}
