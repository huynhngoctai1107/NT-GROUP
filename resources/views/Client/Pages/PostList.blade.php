@extends('client.layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Tin mua vip";
@endphp
@section('main')

    <div class="main_content">
        <!-- START SECTION BREADCRUMB -->
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-12 mb-0">
                                <div class="product_header">
                                    <div class="product_header_left">
                                        <div class="custom_select">
                                            <div class="dropdown">
                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Tất cả
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                                    <li>
                                                        <a class="dropdown-item active" href="{{route('postNew')}}">Tin đã đăng</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('postList')}}">Tin mua vip</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('postDelete')}}">Tin đã xóa</a>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                            <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <x-client.pages.postlist></x-client.pages.postlist>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END SECTION SHOP -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default mb-0 small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-0 heading_light">
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
@endsection

