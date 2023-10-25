@extends('client.layout.master')

@section('title')
    Danh sách tin đã đăng - NT GROUP
@endsection
@php
    $title = "Danh sách tin đã đăng";
@endphp
@section('main')
    <div class="main_content">
        <!-- START SECTION BREADCRUMB -->
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
        <div class="section">
            <div class="container">
                <x-admin.buttom.add router="postAdd" name="Thêm bài viết"></x-admin.buttom.add>
                <nav>
                    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
                        <button class="nav-link active" style="font-weight: bold;" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tin đã đăng</button>

                        <button class="nav-link" style="font-weight: bold;" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Tin mua vip</button>

                        <button class="nav-link" style="font-weight: bold;" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Tin đã xóa</button>

                    </div>
                </nav>
            </div>
            <div class="container tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="card">
                        <div class="card-header">
                            <h7>Tin đăng</h7>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="product-thumbnail col-2">&nbsp;Ảnh</th>
                                        <th class="product-name col-2">Tiêu đề</th>
                                        <th class="product-name col-2">Nhu cầu</th>
                                        <th class="product-quantity col-2">Danh mục</th>
                                        <th class="product-quantity col-2">Giá</th>
                                        <th class="product-quantity col-2">Diện tích</th>
                                        <th class="product-quantity col-2">Địa chỉ</th>
                                        <th class="product-quantity col-2">Xem</th>
                                        <th class="product-quantity col-2">Nghiệp vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <x-client.pages.postlist :postList="$postList"></x-client.pages.postlist>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                    <div class="card">
                        <div class="card-header">
                            <h7>Tin mua vip</h7>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="product-thumbnail col-2">&nbsp;Ảnh</th>
                                        <th class="product-name col-2">Tiêu đề</th>
                                        <th class="product-name col-2">Nhu cầu</th>
                                        <th class="product-quantity col-2">Danh mục</th>
                                        <th class="product-quantity col-2">Giá</th>
                                        <th class="product-quantity col-2">Diện tích</th>
                                        <th class="product-quantity col-2">Địa chỉ</th>
                                        <th class="product-quantity col-2">Xem</th>
                                        <th class="product-quantity col-2">Nghiệp vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <x-client.pages.postlist :postList="$postVip"></x-client.pages.postlist>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="card">
                        <div class="card-header">
                            <h7>Tin đã xóa</h7>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr class="text-center">
                                        <th class="product-thumbnail col-2">&nbsp;Ảnh</th>
                                        <th class="product-name col-2">Tiêu đề</th>
                                        <th class="product-name col-2">Nhu cầu</th>
                                        <th class="product-quantity col-2">Danh mục</th>
                                        <th class="product-quantity col-2">Giá</th>
                                        <th class="product-quantity col-2">Diện tích</th>
                                        <th class="product-quantity col-2">Địa chỉ</th>
                                        <th class="product-quantity col-2">Xem</th>
                                        <th class="product-quantity col-2">Nghiệp vụ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <x-client.pages.postlist :postList="$postDelete"></x-client.pages.postlist>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
