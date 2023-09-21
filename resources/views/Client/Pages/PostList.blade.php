@extends('Client.Layout.master')

@section('title')
    Tin Tức Nhà Đất - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Nhà Đất</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Nhà đất</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center mb-4 pb-1">
                            <div class="col-12">
                                <div class="product_header">
                                    <div class="product_header_left">
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="order">Mặc định</option>
                                                <option value="popularity">Tin Vip</option>
                                                <option value="date">Tin Hot</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:Void(0);" class="shorting_icon grid"><i
                                                    class="ti-view-grid"></i></a>
                                            <a href="javascript:Void(0);" class="shorting_icon list active"><i
                                                    class="ti-layout-list-thumb"></i></a>
                                        </div>
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="">Hiển thị</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="18">18</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row shop_container list">
                            @php
                                $name = 'abc';
                                $img = env('APP_URL') . 'client/images/product_img1.jpg';
                                $address = '170 hqv';
                                $price = '200';
                            @endphp
                            <x-clients.index.post :name="$name" :img="$img" :address="$address" :price="$price">

                            </x-clients.index.post>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="verticalLine">
                                            <h3 class="ms-lg-3">TIN RAO BÁN</h3>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="box">
                                            <x-clients.index.postSale :name="$name" :img="$img" :address="$address"
                                                                      :price="$price">

                                            </x-clients.index.postSale>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-1">
                                <div class="contactInfor mt-5 text-center">
                                    <h4>LIÊN HỆ ĐĂNG TIN</h4>
                                    <p>+8412345678</p>
                                </div>
                                <div class="admin border">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="./assets/images/anh2.png" alt="Hình ảnh"
                                                 class="img-fluid rounded-circle-custom m-3">
                                        </div>
                                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                                            <div class="infor">
                                                <h5>PHÒNG KD</h5>
                                                <div class="phone border-warning text-warning p-2 rounded bg-light">
                                                    <i class="bi bi-telephone-fill"></i>
                                                    <span>Gọi ngay</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-md-0 heading_light">
                            <h3>Subscribe Our Newsletter</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0"
                                       placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                        value="Submit">Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <style>
        .rounded-circle-custom {
            border-radius: 50%;
            width: 100px;
            /* Điều chỉnh kích thước ảnh theo ý muốn */
            height: 100px;
            /* Điều chỉnh kích thước ảnh theo ý muốn */
            object-fit: cover;
            /* Cách hình ảnh sẽ được hiển thị */
        }
    </style>
@endpush
