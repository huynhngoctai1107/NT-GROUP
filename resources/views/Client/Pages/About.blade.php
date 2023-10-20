@extends('client.layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Giới thiệu";
@endphp
@section('main')
    <!-- START MAIN CONTENT -->
    <div class="main_content">
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
        <!-- STAT SECTION ABOUT -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about_img scene mb-4 mb-lg-0">
                            <img src="https://ttcphuquoc.vn/Media/Uploads/tintuc/thitruong/072019/300719_1.jpg" alt="about_img"/>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Sơ lược Bất Động Sản Kiên Giang</h2>
                        </div>
                        <p>Bất Động Sản Kiên Giang là một trong những công ty chuyên về đầu tư xây dựng và phân phối bất động sản đất nền. Đây là một trong những công ty có tuổi đời trẻ nhưng đã khẳng định được vị thế của mình trên thị trường bất động sản Miền Nam – Tp. Kiên Giang</p>
                        <p>Song song với việc chú trọng phát triển các hoạt động kinh doanh,Động Sản Kiên Giang cũng luôn chú tâm đến các hoạt động xã hội, tích cực thể hiện thông điệp “Vững Nền Tảng, Chắc Tương Lai”. Thường xuyên tổ chức các hoạt động hướng về cộng đồng, phát huy tinh thần tương thân tương ái, chia sẻ yêu thương cho xã hội, đem đến những tia nắng ấm cho các mảnh đời bất hạnh, kém may mắn.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION ABOUT -->
        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="heading_s1">
                            <h2>Quá trình hình thành và phát triển Bất Động Sản Kiên Giang</h2>
                        </div>
                        <p>Để đạt được mục tiêu vươn lên tầm cao mới trong lĩnh vực kinh doanh bất động sản toàn thể ban lãnh đạo, cán bộ, công nhân viên của Động Sản Kiên Giang với sức trẻ, tinh thần nhiệt huyết, không ngừng nỗ lực và sáng tạo sẽ kiến tạo nên những khu đô thị mới, những văn phòng, với chất lượng tốt nhất, xây dựng phong cách phục vụ chuyên nghiệp, uy tín nhằm mang đến cho khách hàng những dịch vụ phong phú và hoàn hảo nhất. Mang Bất Động Sản Kiên Giang đến gần hơn với khách hàng, và từng bước một trở thành một trong các doanh nghiệp bất động sản hàng đầu Việt Nam không chỉ về quy mô, chất lượng mà còn là nơi đáng tin cậy nhất để khách hàng vững tâm xây dựng tương lai.</p>
                    </div>
                    <div class="col-lg-6">

                        <div class="about_img scene mb-4 mb-lg-0">
                            <img src="https://batdongsancantho.vn/public/upload/images/20160114164905-d953.jpg" alt="about_img"/>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- START SECTION TEAM -->
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="heading_s1 text-center">
                            <h2>Tin tức thị trường</h2>
                        </div>
                        <p class="text-center leads"></p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="team_box team_style1">
                            <div class="team_img">
                                <img src="https://batdongsancantho.vn/public/upload/images/thumb_baiviet/lai-suat-ngan-hang-hom-nay-ngay-2092023-17-ngan-hang-dua-lai-suat-tat-ca-cac-ky-han-ve-duoi-6nam-311695366553.jpg" alt="team_img1">
                                <ul class="social_icons social_style1">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                            <div class="team_content">
                                <div class="team_title">
                                    <h5>Lãi suất ngân hàng hôm nay ngày 20/9/2023...</h5>
                                    <span>Lãi suất ngân hàng hôm nay ngày 20/9/2023,theo khảo sát của phóng viên Báo Công Thương...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="team_box team_style1">
                            <div class="team_img">
                                <img src="https://nld.mediacdn.vn/291774122806476800/2021/9/6/11-chot-1630929874162447727574.jpg" alt="team_img2">
                                <ul class="social_icons social_style4">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                            <div class="team_content">
                                <div class="team_title">
                                    <h5>Đại gia” Hàn Quốc muốn rót tiền đầu tư dự án đô thị, sân golf ở Cần Thơ...</h5>
                                    <span>Tập đoàn Daewon (Hàn Quốc) đã bày tỏ mong muốn tìm hiểu và nghiên cứu đầu tư vào nhiều...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="team_box team_style1">
                            <div class="team_img">
                                <img src="https://xdcs.cdnchinhphu.vn/446259493575335936/2023/2/24/chinh-sach-moi-anh-huong-den-thi-truong-bat-dong-san1602162451-16772104701281575851658.png" alt="team_img3">
                                <ul class="social_icons social_style4">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                            <div class="team_content">
                                <div class="team_title">
                                    <h5>LỢI ÍCH VIỆC ĐẦU TƯ MUA NHÀ CHO CON ĐI HỌC</h5>
                                    <span>Đầu tư mua nhà cho con học đại học không chỉ có lợi ích về trước mắt và còn mang hiệu quả bền vững trong tương lai.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="team_box team_style1">
                            <div class="team_img">
                                <img src="https://batdongsancantho.vn/public/upload/images/thumb_baiviet/hop-long-cau-tran-hoang-na-gan-800-ty-dong-bac-qua-song-can-tho-151693464940.jpg" alt="team_img4">
                                <ul class="social_icons social_style4">
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                    <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                            <div class="team_content">
                                <div class="team_title">
                                    <h5>Hợp long cầu Trần Hoàng Na gần 800 tỷ đồng bắc qua sông Cần Thơ</h5>
                                    <span>Ngày 26/8, cầu Trần Hoàng Na bắc qua sông Cần Thơ dài gần 600m, vốn đầu tư gần 800 tỷ đồng...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION TEAM -->


    </div>
    <!-- END MAIN CONTENT -->
@endsection