@extends('Client.Layout.master')

@section('title')
    Tin Tức Chi Tiết - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Chi Tiết Tin Rao Bán</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Tin</a></li>
                        <li class="breadcrumb-item active">Chi tiết tin</li>
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
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                                <div class="product-image">
                                    <div class="product_img_box">
                                        <img id="product_img" src='assets/images/bds.jpg'
                                             data-zoom-image="assets/images/bds.jpg" alt="product_img1"/>
                                        <a href="#" class="product_img_zoom" title="Zoom">
                                            <span class="linearicons-zoom-in"></span>
                                        </a>
                                    </div>
                                    <div id="pr_item_gallery" class="product_gallery_item slick_slider"
                                         data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                        <div class="item">
                                            <a href="#" class="product_gallery_item active"
                                               data-image="assets/images/bds.jpg"
                                               data-zoom-image="assets/images/product_zoom_img1.jpg">
                                                <img src="assets/images/bds.jpg" alt="product_small_img1" height="70px">
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#" class="product_gallery_item"
                                               data-image="assets/images/bds2.png"
                                               data-zoom-image="assets/images/bds2.png">
                                                <img src="assets/images/bds2.png" alt="product_small_img2"
                                                     height="70px">
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#" class="product_gallery_item active"
                                               data-image="assets/images/bds.jpg"
                                               data-zoom-image="assets/images/product_zoom_img1.jpg">
                                                <img src="assets/images/bds.jpg" alt="product_small_img1" height="70px">
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#" class="product_gallery_item"
                                               data-image="assets/images/bds2.png"
                                               data-zoom-image="assets/images/bds2.png">
                                                <img src="assets/images/bds2.png" alt="product_small_img2"
                                                     height="70px">
                                            </a>
                                        </div>
                                        <div class="item">
                                            <a href="#" class="product_gallery_item active"
                                               data-image="assets/images/bds.jpg"
                                               data-zoom-image="assets/images/product_zoom_img1.jpg">
                                                <img src="assets/images/bds.jpg" alt="product_small_img1" height="70px">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="pr_detail">
                                    <div class="product_description">
                                        <h4 class="product_title"><a href="#">Bán nền giá rẻ 390 triệu ngay Thị Trấn
                                                Mái Dầm tiếp giáp TP Cần Thơ</a></h4>
                                        <div class="product_price">
                                            <span class="price">1 tỷ</span>
                                            <del>1 tỷ 2</del>
                                            <div class="on_sale">
                                                <span>35% Giảm</span>
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <div class="rating">
                                                <div class="product_rate" style="width:80%"></div>
                                            </div>
                                            <span class="rating_num">(21)</span>
                                        </div>
                                        <div class="pr_desc">
                                            <p>Nam sông hậu mái dầm hậu giang.</p>
                                        </div>
                                        <div class="product_sort_info">
                                            <ul>
                                                <li><i class="linearicons-shield-check"></i>Bảo hành 1 năm</li>
                                                <li><i class="linearicons-sync"></i> Hoàn cọc sau 30 ngày</li>
                                                <li><i class="linearicons-bag-dollar"></i> Kí hợp đồng tại chỗ</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_share">
                                        <span>Chia sẻ:</span>
                                        <ul class="social_icons">
                                            <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                            <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                            <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                                            <li><a href="#"><i class="ion-social-youtube-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="large_divider clearfix"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-style3">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                               href="#Description" role="tab" aria-controls="Description"
                                               aria-selected="true">Mô tả</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab"
                                               href="#Additional-info" role="tab" aria-controls="Additional-info"
                                               aria-selected="false">Additional info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews"
                                               role="tab" aria-controls="Reviews" aria-selected="false">Reviews
                                                (2)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab">
                                        <div class="tab-pane fade show active" id="Description" role="tabpanel"
                                             aria-labelledby="Description-tab">
                                            <p>BÁN 2 NỀN GIÁ RẺ 390 TRIỆU TÁI ĐỊNH CƯ NGAY CHỢ THỊ TRẤN MÁI DẦM HẬU
                                                GIANG
                                                <br>
                                                - Diện tích: 5 x 19, 5 x 20- Lộ: 15M - 16M <br>
                                                - Hướng đa dạng <br>
                                                - Đã có kết quả bốc thăm <br>
                                                - Vị trí ngay trung tâm Thi Trấn Mái Dầm, tiếp giáp TP Cần Thơ <br>
                                                - Có sẵn trường học, công viên- Còn nhiều nền đẹp, nền cặp, nền góc <br>
                                                - Giá: 390 Triệu (Nợ CSHT)Số điện thoại: 0943500326
                                            </p>
                                        </div>
                                        <div class="tab-pane fade" id="Additional-info" role="tabpanel"
                                             aria-labelledby="Additional-info-tab">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Capacity</td>
                                                    <td>5 Kg</td>
                                                </tr>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Black, Brown, Red,</td>
                                                </tr>
                                                <tr>
                                                    <td>Water Resistant</td>
                                                    <td>Yes</td>
                                                </tr>
                                                <tr>
                                                    <td>Material</td>
                                                    <td>Artificial Leather</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="Reviews" role="tabpanel"
                                             aria-labelledby="Reviews-tab">
                                            <div class="comments">
                                                <h5 class="product_tab_title">2 Review For <span>Blue Dress For
                                                        Woman</span></h5>
                                                <ul class="list_none comment_list mt-4">
                                                    <li>
                                                        <div class="comment_img">
                                                            <img src="assets/images/user1.jpg" alt="user1"/>
                                                        </div>
                                                        <div class="comment_block">
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="customer_meta">
                                                                <span class="review_author">Alea Brooks</span>
                                                                <span class="comment-date">March 5, 2018</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Lorem Ipsumin gravida nibh vel velit auctor aliquet.
                                                                    Aenean sollicitudin, lorem quis bibendum auctor,
                                                                    nisi
                                                                    elit consequat ipsum, nec sagittis sem nibh id elit.
                                                                    Duis sed odio sit amet nibh vulputate</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="comment_img">
                                                            <img src="assets/images/user2.jpg" alt="user2"/>
                                                        </div>
                                                        <div class="comment_block">
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:60%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="customer_meta">
                                                                <span class="review_author">Grace Wong</span>
                                                                <span class="comment-date">June 17, 2018</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>It is a long established fact that a reader will be
                                                                    distracted by the readable content of a page when
                                                                    looking at its layout. The point of using Lorem
                                                                    Ipsum is
                                                                    that it has a more-or-less normal distribution of
                                                                    letters</p>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="review_form field_form">
                                                <h5>Add a review</h5>
                                                <form class="row mt-3">
                                                    <div class="form-group col-12 mb-3">
                                                        <div class="star_rating">
                                                            <span data-value="1"><i class="far fa-star"></i></span>
                                                            <span data-value="2"><i class="far fa-star"></i></span>
                                                            <span data-value="3"><i class="far fa-star"></i></span>
                                                            <span data-value="4"><i class="far fa-star"></i></span>
                                                            <span data-value="5"><i class="far fa-star"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12 mb-3">
                                                        <textarea required="required" placeholder="Your review *"
                                                                  class="form-control" name="message"
                                                                  rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <input required="required" placeholder="Enter Name *"
                                                               class="form-control" name="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <input required="required" placeholder="Enter Email *"
                                                               class="form-control" name="email" type="email">
                                                    </div>

                                                    <div class="form-group col-12 mb-3">
                                                        <button type="submit" class="btn btn-fill-out" name="submit"
                                                                value="Submit">Submit Review
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.5948724607174!2d105.09792527459444!3d9.967624673591873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0b43853857f1d%3A0x6b5909aaf0a7e39!2zUGhhbiBUaOG7iyBSw6BuZywgQW4gSMOyYSwgVHAuIFLhuqFjaCBHacOhLCBLacOqbiBHaWFuZywgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1694404074860!5m2!1sen!2s"
                                    width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="small_divider"></div>
                                <div class="divider"></div>
                                <div class="medium_divider"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="heading_s1">
                                    <h3>Tin Liên Quan</h3>
                                </div>
                                <div class="releted_product_slider carousel_slider owl-carousel owl-theme"
                                     data-margin="20"
                                     data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "992":{"items": "2"}, "1199":{"items": "3"}}'>
                                    @php
                                        $name = 'abc';
                                        $img = env('APP_URL') . 'client/images/product_img1.jpg';
                                        $date = '19 - 06 - 2023';
                                        $description = 'Ngân hàng Nhà nước vừa ra quyết định điều chỉnh các mức lãi suất...';
                                        $address = '170 hqv';
                                        $price = '200';
                                    @endphp
                                    <x-client.blog.blogVip :name="$name" :img="$img" :address="$address"
                                                            :price="$price">

                                    </x-client.blog.blogVip>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget_title">Loại Tin</h5>
                                <ul class="widget_categories">
                                    <li><a href="#"><span class="categories_name">Bán Đất</span><span
                                                class="categories_num">(9)</span></a></li>
                                    <li><a href="#"><span class="categories_name">Thuê Đất</span><span
                                                class="categories_num">(6)</span></a></li>
                                    <li><a href="#"><span class="categories_name">Bán Nhà</span><span
                                                class="categories_num">(4)</span></a></li>
                                    <li><a href="#"><span class="categories_name">Thuê Nhà</span><span
                                                class="categories_num">(7)</span></a></li>
                                    <li><a href="#"><span class="categories_name">Thuê Trọ</span><span
                                                class="categories_num">(12)</span></a></li>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Bất Động Sản VIP</h5>
                                <ul class="widget_recent_post">
                                    <x-client.blog.blogVip :name="$name" :img="$img" :address="$address"
                                                            :price="$price">

                                    </x-client.blog.blogVip>
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">tags</h5>
                                <div class="tags">
                                    <a href="#">Thuê nhà</a>
                                    <a href="#">Bán nhà</a>
                                    <a href="#">Thuê trọ</a>
                                    <a href="#">Bán</a>
                                    <a href="#">Thuê</a>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="shop_banner">
                                    <div class="banner_img overlay_bg_20">
                                        <img src="assets/images/sale.jpeg" alt="sidebar_banner_img">
                                    </div>
                                    <div class="shop_bn_content2 text_white">
                                        <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                        <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop
                                            Now</a>
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
                            <h3>Đăng kí để nhận tin mới nhất</h3>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="newsletter_form">
                            <form>
                                <input type="text" required="" class="form-control rounded-0"
                                       placeholder="Nhập mail">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                        value="Submit">Gửi
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
