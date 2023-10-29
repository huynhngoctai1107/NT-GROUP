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
                    <div class="col-xl-8 col-lg-8">
                        <div class="row">
                            <div class="col-lg-12 col-md-6 mb-4 mb-md-0">
                                @php
                                    // Tách chuỗi thành mảng
                                    $images = $data->images;
                                    $imageArray = explode(',', $images);

                                    // Lấy tên file ảnh đầu tiên
                                    $firstImage = reset($imageArray);
                                @endphp
                                <div class="product-image">
                                    <div class="product_img_box">
                                      <img id="product_img" src="{{ asset('images/medias/' . $firstImage) }}" data-zoom-image="{{ asset('images/medias/' . $firstImage) }}" alt="product_img1" style="width: 100%; height: 500px" />
                                        <a href="#" class="product_img_zoom" title="Zoom">
                                            <span class="linearicons-zoom-in"></span>
                                        </a>
                                    </div>
                                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-slides-to-show="4" data-slides-to-scroll="1" data-infinite="false">
                                        @foreach($imageArray as $img)
                                            <div class="item">
                                                <a href="#" class="product_gallery_item active" data-image="{{ asset('images/medias/' . $img) }}" data-zoom-image="{{ asset('images/medias/' . $img) }}">
                                                    <img src="{{ asset('images/medias/' . $img) }}" alt="product_small_img1" style="width: 100%; height: 120px; object-fit: cover;" />
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 mt-3">
                                <div class="pr_detail">
                                    <div class="product_description">
                                        <h4 class="product_title">
                                            <a href="#" class="posts_title">{{$data->title}}</a>
                                        </h4>
                                        <div class="product_price">
                                            <span class="price">Giá: {{$formatPrice($data->price_posts)}}</span>
                                            <del></del>
                                            <div class="on_sale">
                                            </div>
                                        </div>
                                        <div class="rating_wrap">
                                            <span class="rating_num">{{$data->number_views}} lượt xem</span>
                                        </div>
                                        <div class="pr_desc">
                                            <div class="posts_subtitle">{!! $data->subtitles !!}</div>
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
                                            <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Mô tả</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Thông tin thêm</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Đánh giá (2)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content shop_info_tab">
                                        <div class="tab-pane fade show active mb-3" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                            <div>{!! $data->content !!}</div>
                                        </div>
                                        <div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td>Diện tích</td>
                                                    <td>{{$data->acreages}} m²</td>
                                                </tr>
                                                <tr>
                                                    <td>Vị trí</td>
                                                    <td>{{$data->address}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                                            <div class="comments">
                                                <h5 class="product_tab_title">2 Đánh giá cho
                                                    <span>Áo xanh cho phụ nữ</span></h5>
                                                <ul class="list_none comment_list mt-4">
                                                    <li>
                                                        <div class="comment_img">
                                                            <img src="{{ asset('assets/images/user1.jpg') }}" alt="user1"/>
                                                        </div>
                                                        <div class="comment_block">
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:80%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="customer_meta">
                                                                <span class="review_author">Alea Brooks</span>
                                                                <span class="comment-date">5 Tháng 3, 2018</span>
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
                                                            <img src="{{ asset('assets/images/user2.jpg') }}" alt="user2"/>
                                                        </div>
                                                        <div class="comment_block">
                                                            <div class="rating_wrap">
                                                                <div class="rating">
                                                                    <div class="product_rate" style="width:60%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="customer_meta">
                                                                <span class="review_author">Grace Wong</span>
                                                                <span class="comment-date">17 Tháng 6, 2018</span>
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
                                                <h5>Thêm đánh giá</h5>
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
                                    <textarea required="required" placeholder="Đánh giá của bạn *" class="form-control" name="message" rows="4"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <input required="required" placeholder="Nhập tên *" class="form-control" name="name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-6 mb-3">
                                                        <input required="required" placeholder="Nhập Email *" class="form-control" name="email" type="email">
                                                    </div>
                                                    <div class="form-group col-12 mb-3">
                                                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Gửi đánh giá
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
                            <div class="col" id="ggmap">

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
                                <div>
                                    <x-client.index.postSale :list="$list"></x-client.index.postSale>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <h5 class="widget_title">Loại Tin</h5>
                                <ul class="widget_categories">
                                    @foreach($count as $item)
                                    <li>
                                        <a href="{{route('search',$item->slug)}}"><span class="categories_name">{{$item->name}}</span><span class="categories_num">({{$item->post_count}})</span></a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 mt-3 mb-3">
                                <h4>Liên Hệ</h4>
                                @foreach($data->contacts as $contacts)
                                    <div class="admin mt-3">
                                        <div class="row d-flex justify-content-center align-items-center">
                                            <div class="col-md-4 col-4 ">
                                                <img src="{{ asset('images/contacts/' . $contacts->image) }}" class="img-fluid rounded-circle-custom" alt="Hình ảnh" style="border: 1px solid #000; border-radius: 50%; width: 100px; height: 100px;">
                                            </div>
                                            <div class="col-md-8 col-8">
                                                <div class="infor">
                                                    <h5>{{$contacts->position}}</h5>
                                                    <div class="phone border-warning text-warning p-2 rounded bg-light">
                                                        <a href="tel:{{$contacts->phone}}"><i class="bi bi-telephone-fill"></i>
                                                        <span>Gọi ngay</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Bất Động Sản VIP</h5>
                                <ul class="widget_recent_post">
                                    <x-client.blog.blogVip :list="$list">

                                    </x-client.blog.blogVip>
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
        <!-- END SECTION SHOP -->
    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <style>
	    /* Điều chỉnh kích thước bản đồ theo ý muốn */
		#ggmap {
			height: 400px;
			width: 100%;
		}
		.posts_subtitle {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.posts_title {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
	    .card-name {
		    display: -webkit-box;
		    -webkit-line-clamp: 2;
		    -webkit-box-orient: vertical;
		    overflow: hidden;
	    }
    </style>
@endpush
@push('script')
    <script>
        // Tọa độ bạn đã nhập
        var latitude = {{$data->latitude}};
        var longitude = {{$data->longitude}};

        function initMap() {
            // Tạo một đối tượng bản đồ và thiết lập tọa độ ban đầu
            var map = new google.maps.Map(document.getElementById('ggmap'), {
                center: {lat: latitude, lng: longitude},
                zoom: 15 // Thay đổi giá trị zoom tùy theo yêu cầu của bạn
            });

            // Tạo một đối tượng đánh dấu (marker) ở vị trí bạn đã nhập
            var marker = new google.maps.Marker({
                position: {lat: latitude, lng: longitude},
                map: map,
                title: 'Vị trí cụ thể'
            });
        }
    </script>
    <!-- Sử dụng API key của bạn từ Google Cloud Console -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_G4pm1e6qVGLB_t1_hYe_KDFc7ObLf6I&callback=initMap" async defer></script>

@endpush
