@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Quên mật khẩu";
@endphp

@section('main')

    <div class="main_content">
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Quên mật khẩu</h3>
                                    <p class="pt-3">Vui lòng nhập email đã đăng ký, chúng tôi sẽ gửi email để bạn lấy lại mật khẩu</p>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session('success')}}
                                    </div>
                                @endif
                                @if(Session::has('danger'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session('danger')}}
                                    </div>
                                @endif
                                <form action="{{route('postForgetPassword')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
                                        @error('email')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        {!! RecaptchaV3::field('forGetPassWord') !!}
                                        <button type="submit" class="btn btn-fill-out btn-block" name="forGetPassWord">Gửi yêu cầu</button>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->
    </div>
    <!-- END MAIN CONTENT -->

@endsection
