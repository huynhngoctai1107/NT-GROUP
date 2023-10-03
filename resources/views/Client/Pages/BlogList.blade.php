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

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION BLOG -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="row">
                            @php
                                $list = [
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
                            <x-client.blog.blogList :list="$list">

                            </x-client.blog.blogList>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2 mt-md-4">
                                <ul class="pagination pagination_style1 justify-content-center">
                                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i
                                                class="linearicons-arrow-left"></i></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i
                                                class="linearicons-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="search_form">
                                    <form>
                                        <input required="" class="form-control" placeholder="Tìm kiếm ..."
                                               type="text">
                                        <button type="submit" title="Subscribe" class="btn icon_search" name="submit"
                                                value="Submit">
                                            <i class="ion-ios-search-strong"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Bất Động Sản VIP</h5>
                                <ul class="widget_recent_post">
                                    <x-client.blog.blogVip :list="$list">

                                    </x-client.blog.blogVip>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Ngày đăng</h5>
                                <ul class="widget_archive">
                                    <li><a href="#"><span class="archive_year">Tháng 10 - 2019</span><span
                                                class="archive_num">(12)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 9 - 2019</span><span
                                                class="archive_num">(5)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 10 - 2018</span><span
                                                class="archive_num">(6)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 9 - 2018</span><span
                                                class="archive_num">(7)</span></a></li>
                                    <li><a href="#"><span class="archive_year">Tháng 10 -2017</span><span
                                                class="archive_num">(10)</span></a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">tags</h5>
                                <div class="tags">
                                    <a href="#">Bất động sản</a>
                                    <a href="#">Cho thuê</a>
                                    <a href="#">Bán</a>
                                    <a href="#">Đấu giá</a>
                                    <a href="#">Cần Thơ</a>
                                    <a href="#">Ninh Kiều</a>
                                    <a href="#">Bất động sản rẻ</a>
                                    <a href="#">Giảm Giá</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION BLOG -->

    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('script')
    <!-- fit video  -->
    <script src="assets/js/jquery.fitvids.js"></script>
    <script>
        // Lặp qua tất cả các phần tử có class "price"
        var priceElements = document.querySelectorAll('.price');
        priceElements.forEach(function(element) {
            // Lấy giá trị số tiền từ thuộc tính "data-price"
            var price = parseFloat(element.textContent);

            // Kiểm tra nếu số tiền lớn hơn hoặc bằng 1 tỷ
            if (price >= 1000000000) {
                // Tính tỷ và triệu
                var ty = Math.floor(price / 1000000000);
                var trieu = Math.floor((price % 1000000000) / 1000000);

                // Định dạng số tiền thành 'x tỷ y triệu' và gán lại cho phần tử
                var formattedPrice = ty + ' tỷ';
                if (trieu > 0) {
                    formattedPrice += ' ' + trieu + ' triệu';
                }

                element.textContent = formattedPrice;
            } else if (price >= 1000000) {
                // Nếu số tiền lớn hơn hoặc bằng 1 triệu và dưới 1 tỷ
                var trieu = Math.floor(price / 1000000);

                // Định dạng số tiền thành 'x triệu' và gán lại cho phần tử
                element.textContent = trieu + ' triệu';
            } else {
                // Nếu số tiền dưới 1 triệu, giữ nguyên
                element.textContent = price;
            }
        });
    </script>
@endpush
