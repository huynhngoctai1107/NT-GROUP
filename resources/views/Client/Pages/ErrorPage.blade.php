@extends('client.layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Trang 404";
@endphp

@section('main')

<!-- START MAIN CONTENT -->
<div class="main_content">
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
    <!-- START 404 SECTION -->
    <div class="section">
        <div class="error_wrap">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10 order-lg-first">
                        <div class="text-center">
                            <div class="error_txt">404</div>
                            <h5 class="mb-2 mb-sm-3">Trang bạn tìm kiếm hiện tại không thấy !</h5>
                            <p>{{session('error') ??''}}.</p>
                            <div class="search_form pb-3 pb-md-4">
                                <form method="post">
                                    <input name="text" id="text" type="text" placeholder="Tìm kiếm" class="form-control">
                                    <button type="submit" class="btn icon_search"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            <a href="{{route('index')}}" class="btn btn-fill-out">Trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END 404 SECTION -->

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
                            <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
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