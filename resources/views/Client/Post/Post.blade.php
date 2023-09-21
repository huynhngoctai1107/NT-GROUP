@extends('Client.Layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@section('main')

    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Blog</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <div class="container">
        <br/>
        <div class="row">

            <div class="alert alert-secondary" role="alert">
                <h6 class=""> Thông Tin Bất Động Sản </h6>
            </div>

            <form class="row g-3">

                <div class="col-12">
                    <label for="title" class="form-label">
                        <h6>Tiêu Đề *</h6>
                    </label>
                    <input type="text" class="form-control" id="" name="title">
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">
                        <h6>Địa Chỉ *</h6>
                    </label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <div class="row g-3">
                    <div class="col">
                        <label for="text" class="form-label"><h6>Nhu Cầu *</h6></label>
                        <input type="text" class="form-control" placeholder="Nhu Cầu" aria-label="Nhu Cầu">
                    </div>
                    <div class="col">
                        <label for="text" class="form-label"><h6>Loại Bất Động Sản *</h6></label>
                        <input type="text" class="form-control" placeholder="Loại Bất Động Sản"
                               aria-label="Loại Bất Động Sản">
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <label for="city" class="form-label">
                            <h6>Thành Phố *</h6>
                        </label>
                        <input type="city" class="form-control" placeholder="Thành Phố" aria-label="Thành Phố">
                    </div>
                    <div class="col">
                        <label class="form-label" for="text">
                            <h6>Quận *</h6>
                        </label>
                        <input type="text" placeholder="Quận" class="form-control" id="district">
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <label for="text" class="form-label">
                            <h6>Phường *</h6>
                        </label>
                        <input type="text" placeholder="Phường" class="form-control" id="ward">
                    </div>
                    <div class="col">
                        <label for="" class="form-label">
                            <h6>Diện Tích *</h6>
                        </label>
                        <input type="number" placeholder="Diện tích" class="form-control" id="area">
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col">
                        <label for="" class="form-label">
                            <h6>Giá *</h6>
                        </label>
                        <input type="price" class="form-control" value="Giá" id="price" name="price">
                    </div>
                    <div class="col">
                        <label for="link" class="form-label">
                            <h6>Link YouTube</h6>
                        </label>
                        <input type="text" pattern="https?://([A-Za-z0-9.-_.!~*'()?:&=+$,;])+"
                               placeholder="Link youtube" class="form-control" id="youtube_link">
                    </div>
                </div>

                <div class="file-upload">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
                        Chọn Hình Ảnh
                    </button>

                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"/>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image"/>
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="remove-image">Remove <span
                                    class="image-title">Uploaded Image</span></button>
                        </div>
                    </div>
                </div>

            </form>

            <form class="row g-3">

                <br/>
                <div class="alert alert-secondary" role="alert">
                    <h6>Thông Tin Bất Động Sản</h6>
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">
                        <h6>Số Điện Thoại Liên Hệ 1 *</h6>
                    </label>
                    <input type="number" class="form-control" id="" name="phone">
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">
                        <h6>Tên Liên Hệ 1 *</h6>
                    </label>
                    <input type="text" class="form-control" id="" name="name">
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <label for="images" class="col-sm-2 col-form-label"><h6>Hình Ảnh Liên Hệ 1:</h6></label>

                        <div class="mb-3">
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <label for="phone" class="form-label">
                        <h6>Số Điện Thoại Liên Hệ 2 *</h6>
                    </label>
                    <input type="number" class="form-control" id="" name="phone">
                </div>

                <div class="col-md-6">
                    <label for="name" class="form-label">
                        <h6>Tên Liên Hệ 2 *</h6>
                    </label>
                    <input type="text" class="form-control" id="" name="name">
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <label for="images" class="col-sm-2 col-form-label"><h6>Hình Ảnh Liên Hệ 2:</h6></label>

                        <div class="mb-3">
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
                        </div>

                    </div>
                </div>

                <div class="mb-3">
                    <label for="describe" class="form-label"><h6>Mô Tả</h6></label>
                    <textarea class="form-control" id="describe" name="" rows="3"></textarea>
                </div>

            </form>

            {{--            <div class="col-md-12">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-sm-10">--}}
            {{--                            <h6>Google Maps</h6>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--                <br />--}}
            {{--            </div>--}}

            {{--            <div class="center">--}}
            {{--                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14151.350773961807!2d105.09093139842444!3d10.042947970744166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0b383f135522f%3A0xb503ed2c7808c8a!2zVHAuIFLhuqFjaCBHacOhLCBLacOqbiBHaWFuZywgVmnhu4d0IE5hbQ!5e1!3m2!1svi!2s!4v1693315698537!5m2!1svi!2s" width="1125" height="460" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">--}}
            {{--                </iframe>--}}
            {{--            </div>--}}

            <p class="text-center">
                <br/>
                <button type="button" class="btn btn-warning"
                        style="color: white; font-weight: bold; font-family: 'Times New Roman', Times, serif;">Đăng Tin
                </button>
            </p>
        </div>
    </div>

@endsection
