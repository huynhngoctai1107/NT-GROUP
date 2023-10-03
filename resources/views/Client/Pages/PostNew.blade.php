@extends('client.layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection

@php
    $title = "Tin đăng";
@endphp
@section('main')
    <div class="main_content">
        <!-- START SECTION BREADCRUMB -->

        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
        <div class="section">
            <div class="container">
                <x-admin.buttom.add router="postAdd" name="Thêm bài viết" ></x-admin.buttom.add>
                <nav>
                    <div class="nav nav-tabs mt-4" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Tất cả</button>

                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Tin đã đăng</button>

                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Tin mua vip</button>

                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Tin đã xóa</button>

                    </div>
                </nav>
            </div>
            <div class="container tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="card-body">
                        <x-client.pages.postlist></x-client.pages.postlist>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="card-body">
                        <x-client.pages.postlist></x-client.pages.postlist>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                    <div class="card-body">
                        <x-client.pages.postlist></x-client.pages.postlist>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                    <div class="card-body">
                        <x-client.pages.postlist></x-client.pages.postlist>
                    </div>
                </div>
            </div>
        </div>

        <!-- END SECTION SHOP -->
    </div>
@endsection
