@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Đăng nhập";
@endphp
@section('showhide')

    <script src="{{asset('client/js/showhide.js')}}"></script>
@endsection
@section('main')

    <!-- START MAIN CONTENT -->
    <div class="main_content">
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section mb-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Đăng nhập</h3>
                                </div>

                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                @if(Session::has('error-login'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error-login')}}
                                    </div>
                                @endif
                                <form action="{{route('loginForm')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                                        @error('email')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" value="{{old('password')}}" name="password" class="form-control" id="myInput" placeholder="Mật khẩu">
                                        @error('password')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="login_footer form-group mb-3">
                                        <div class="chek-form">
                                            <div class="mb-3">
                                                <input type="checkbox" onclick="myFunction()"> Hiện mật khẩu
                                            </div>
                                        </div>
                                        <a href="{{route('fogetPassword')}}">Quên mật khẩu?</a>
                                    </div>
                                    {{-- <div class="form-group">
                                        {!! RecaptchaV3::field('') !!}
                                        <input  type="submit"  class="btn btn-fill-out btn-block"  name="login" value="Đăng nhập">
               
                                     </div> --}}
                                    <div class="form-group mb-3">
                                        {!! RecaptchaV3::field('login') !!}
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Đăng nhập</button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span>Hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a>
                                    </li>
                                    <li>
                                        <a href="{{route('loginGoogle')}}" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a>
                                    </li>
                                </ul>
                                <div class="form-note text-center">Bạn chưa có tài khoản?
                                    <a href="{{route('register')}}">Đăng ký</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
