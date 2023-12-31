@extends('Client.Layout.Master')

@section('title')
    Liên Hệ - NT GROUP
@endsection
@section('active6')
    active
@endsection
@php
    $title = "Liên hệ";
@endphp
@section('main')
    <!-- START SECTION BREADCRUMB -->
    <div class="main_content">
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
        <!-- START SECTION CONTACT -->
        <div class="section pt-0">
            <div class="container mb-5 mt-5">
                <div class="row">
                    <div class="col-md-6">
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('success')}}
                            </div>
                        @endif
                            @if(Session::has('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('error')}}
                                </div>
                            @endif
                        <p>Mọi thắc mắc xin mời bạn liên hệ với chúng tôi theo form dưới đây, xin cảm ơn!</p>
                            <form action="{{route('contactFrom')}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label text-dark">Tên của bạn</label>
                                <input type="text" class="form-control" id="name" name="fullname" placeholder="Ví dụ: Nguyễn Duy Hòa">
                                @error('fullname')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label text-dark">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Ví dụ: 0123456789" >
                                @error('phone')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label text-dark">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Ví dụ: Duyhoa2001@gmail.com" >
                                @error('email')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label text-dark">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Ví dụ: 123 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ" >
                                @error('address')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label text-dark">Nội dung</label>
                                <textarea class="form-control" id="message" name="content" rows="4" placeholder="Vui lòng nhập nội dung" ></textarea>
                                @error('content')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>
                            <span class="mb-4 text-sm">Chúng tôi đảm bảo sẽ không tiết lộ bất cứ thông tin nào của
                                bạn!</span>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-fill-out  btn-block" name="contact">Gửi yêu cầu</button>
                            </div>

                        </form>
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="phone d-flex align-items-center">
                                    <i class="bi bi-telephone fs-3 pe-2"></i>
                                    <div class="sdt">
                                        <span class="d-block"><strong>SĐT</strong></span>
                                        <span class="text-primary small">0943500326</span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="email d-flex align-items-center">
                                    <i class="bi bi-envelope fs-3 pe-2"></i>
                                    <div class="email">
                                        <span class="d-block"><strong>Email</strong></span>
                                        <span class="text-primary small">info@company.com</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="facebook d-flex align-items-center">
                                    <i class="bi bi-facebook fs-3 pe-2"></i>
                                    <div class="facebook">
                                        <span class="d-block"><strong>Facebook</strong></span>
                                        <span class="text-primary small">https://facebook.com</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                        <!-- <div id="map" class="contact_map2" data-zoom="12" data-latitude="40.680" data-longitude="-73.945" data-icon="assets/images/marker.png"></div> -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.594872460719!2d105.0979252746503!3d9.967624673591734!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0b43853857f1d%3A0x6b5909aaf0a7e39!2zUGhhbiBUaOG7iyBSw6BuZywgQW4gSMOyYSwgVHAuIFLhuqFjaCBHacOhLCBLacOqbiBHaWFuZywgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1694403931948!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map" class="contact_map2"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION CONTACT -->

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
