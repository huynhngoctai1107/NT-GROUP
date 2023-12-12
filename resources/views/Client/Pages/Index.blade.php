@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@section('active1')
    active
@endsection
@section('main')
    <!-- START SECTION BANNER -->
    <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
        <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active background_bg" data-img-src="">
                    <img src="{{asset('client/images/baner/banner_6.jpg')}}" style="height: 600px">
                    <div class="banner_slide_content">
                        <div class="container"><!-- STRART CONTAINER -->
                            <div class="row">
                                <div class="col-lg-10 col-12">
                                    <div class="banner_content overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Nhà mới, Cuộc sống mới!</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Tìm kiếm ngay hôm nay!</h2>
                                        <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{route('postAdd')}}" data-animation="slideInLeft" data-animation-delay="1.5s">Đăng tin</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END CONTAINER-->
                    </div>
                </div>
                <div class="carousel-item background_bg" data-img-src="">
                    <img src="{{asset('client/images/baner/banner_1.jpg')}}"style="height: 600px">
                    <div class="banner_slide_content">
                        <div class="container"><!-- STRART CONTAINER -->
                            <div class="row">
                                <div class="col-lg-10">
                                    <div class="banner_content overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Kết nối Ươm Đẹp</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s"> Tìm nhà mơ ước!</h2>
                                        <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{route('postAdd')}}" data-animation="slideInLeft" data-animation-delay="1.5s">Đăng tin</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END CONTAINER-->
                    </div>
                </div>
                <div class="carousel-item background_bg" data-img-src="">
                    <img src="{{asset('client/images/baner/banner_7.jpg')}}" style="height: 600px">
                    <div class="banner_slide_content">
                        <div class="container"><!-- STRART CONTAINER -->
                            <div class="row">
                                <div class="col-lg-10" style="color: white">
                                    <div class="banner_content overflow-hidden">
                                        <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">Chúng tôi không chỉ bán nhà</h5>
                                        <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">Chúng tôi xây dựng tổ ấm!</h2>
                                        <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{route('postAdd')}}" data-animation="slideInLeft" data-animation-delay="1.5s">Đăng Tin</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- END CONTAINER-->
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
        </div>
    </div>

    <div class="section small_pt pb_70">
        <div class="container">
            <div class="col-md-12 mb-3">
                <div class="verticalLine">
                    <h3 class="ms-lg-3 ms-3">TIN VIP</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="row shop_container px-3">
                            <x-client.index.post :list="$vip">

                            </x-client.index.post>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $vip->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="main_content">

        <!-- START SECTION BANNER -->

        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP -->
        <div class="section small_pt pb_70">
            <div class="container">
                <div class="col-md-12 mb-3">
                    <div class="verticalLine">
                        <h3 class="ms-lg-3 ms-3">TIN HOT</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="row shop_container px-3">
                                <x-client.index.post :list="$hot">

                                </x-client.index.post>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="verticalLine">
                                <h3 class="ms-lg-3 ms-3">TIN RAO BÁN</h3>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="box">
                                <x-client.index.postsale :list="$data"></x-client.index.postsale>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-1">
                    <x-client.index.contactpost></x-client.index.contactpost>
                </div>
            </div>
        </div>
    </div>

    <!-- END SECTION SHOP -->


    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <style>

        img{

	        display: flex;
	        justify-content: center;
	        position: relative;
	        overflow: hidden;
        }

	    h5, h2 {
		    color: white;
	    }
		.verticalLine {
			border-left: thick solid #ff0000;
		}



		.bds {
			height: 550px !important;
		}

		.hexagon {
			width: 280px;
			/* Độ rộng của hình lục giác */
			height: 280px;
			/* Độ cao của hình lục giác */
			background-color: #007bff;
			/* Màu nền của hình lục giác */
			position: relative;
			clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
		}

		.hexagon-inner {
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.rounded-circle-custom {
			border-radius: 50%;
			width: 100px;
			/* Điều chỉnh kích thước ảnh theo ý muốn */
			height: 100px;
			/* Điều chỉnh kích thước ảnh theo ý muốn */
			object-fit: cover;
			/* Cách hình ảnh sẽ được hiển thị */
		}
        .shorten {
	        display: -webkit-box;
	        -webkit-line-clamp: 2;
	        -webkit-box-orient: vertical;
	        overflow: hidden;
        }
    </style>
@endpush
@push('script')
    <script>
        // Lấy thẻ div chứa form
        var searchForm = document.getElementById("searchForm");
        var searchForm2 = document.getElementById("searchForm2");

        // Lấy nút "Nhà bán đất" và nút "Nhà đất cho thuê"
        var banDatBtn = document.getElementById("banDatBtn");
        var choThueBtn = document.getElementById("choThueBtn");

        // Gắn sự kiện click cho nút "Nhà bán đất"
        banDatBtn.addEventListener("click", function () {
            // Hiển thị form
            searchForm.style.display = "block";
            searchForm2.style.display = "none";
        });

        // Gắn sự kiện click cho nút "Nhà đất cho thuê"
        choThueBtn.addEventListener("click", function () {
            // Hiển thị form
            searchForm2.style.display = "block";
            searchForm.style.display = "none";
        });
    </script>
@endpush
