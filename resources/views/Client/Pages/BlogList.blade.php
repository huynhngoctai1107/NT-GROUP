@extends('Client.Layout.master')

@section('title')
    Tin Tức Thị Trường - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Tin Tức Thị Trường</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Tin Tức</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <div class="main_content">

        <!-- START SECTION BLOG -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            <x-client.blog.blogList :list="$list">

                            </x-client.blog.blogList>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2 mt-md-4">
                                <ul class="pagination pagination_style1 justify-content-center">
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i class="linearicons-arrow-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="linearicons-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="search_form">
                                    <form>
                                        <input required="" class="form-control" placeholder="Tìm kiếm ..." type="text">
                                        <button type="submit" title="Subscribe" class="btn icon_search" name="submit" value="Submit">
                                            <i class="ion-ios-search-strong"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Bất Động Sản VIP</h5>
                                <ul class="widget_recent_post">
                                    @php
                                        $list1 = [
                                                    [
                                                        'name'=> 'Nhà ở giá rẻ tại Cần Thơ',
                                                        'img' => 'banner0.webp',
                                                        'address' => '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                                        'price' => '100000000',
                                                        'date' => '19/06/2023',
                                                        'description' => 'Ngân hàng Nhà nước vừa ra quyết định điều chỉnh các mức lãi suất...',
                                                        'phone' => '0321456789',
                                                    ],
                                                    [
                                                        'name'=> 'Nhà nguyên căn đầy đủ nội thất tại Cần Thơ',
                                                        'img' => 'banner0.webp',
                                                        'address'=> '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                                        'price'=> '2500000000',
                                                        'date' => '19/06/2023',
                                                        'description' => 'Ngân hàng Nhà nước vừa ra quyết định điều chỉnh các mức lãi suất...',
                                                        'phone' => '0321456789',
                                                    ],
                                                                                                [
                                                        'name'=> 'Nhà ở giá rẻ tại Cần Thơ',
                                                        'img' => 'banner0.webp',
                                                        'address' => '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                                        'price' => '1000000000',
                                                        'date' => '19/06/2023',
                                                        'description' => 'Ngân hàng Nhà nước vừa ra quyết định điều chỉnh các mức lãi suất...',
                                                        'phone' => '0321456789',
                                                    ],
                                                    [
                                                        'name'=> 'Nhà nguyên căn đầy đủ nội thất tại Cần Thơ',
                                                        'img' => 'banner0.webp',
                                                        'address'=> '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                                        'price'=> '1500000000',
                                                        'date' => '19/06/2023',
                                                        'description' => 'Ngân hàng Nhà nước vừa ra quyết định điều chỉnh các mức lãi suất thấp kỉ lục trong năm qua và ưu đãi vãy ...',
                                                        'phone' => '0321456789',
                                                    ],
                                        ];
                                    @endphp
                                    <x-client.blog.blogVip :list="$list1">

                                    </x-client.blog.blogVip>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Ngày đăng</h5>
                                <ul class="widget_archive">
                                    <li><a href="#"><span class="archive_year">Tháng 10 - 2019</span><span class="archive_num">(12)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 9 - 2019</span><span class="archive_num">(5)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 10 - 2018</span><span class="archive_num">(6)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 9 - 2018</span><span class="archive_num">(7)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 10 -2017</span><span class="archive_num">(10)</span></a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">tags</h5>
                                <div class="tags">
                                    @foreach($category as $item)
                                        <a href="#">{{$item->name}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION BLOG -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Đăng Kí Để Nhận Tin Tức Mới Nhất</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0" placeholder="Nhập mail ">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Gửi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
@endsection
@push('script')
    <!-- fit video  -->
    <script src="assets/js/jquery.fitvids.js"></script>
@endpush
@push('styles')
    <style>
		.responsive-img {
			max-width: 100%;
			height: auto;
		}
		.blog_title {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.blog_subtitle {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.row {
			display: flex;
			flex-wrap: wrap;
		}

		.col-xl-4, .col-md-6 {
			margin-bottom: 20px; /* Khoảng cách giữa các div */
		}

		.blog_post {
			height: 100%; /* Chiều cao tối đa */
		}
    </style>
@endpush
