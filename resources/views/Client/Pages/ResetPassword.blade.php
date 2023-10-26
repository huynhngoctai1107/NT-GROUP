@extends('client.layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Quên mật khẩu";
@endphp
@section('showhide')

    <script src="{{asset('client/js/showhide.js')}}"></script>
@endsection

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
                                    <h3>Đặt lại mật khẩu</h3>
                                    <p class="pt-3">Vui lòng nhập mật khẩu để đặt lại mật khẩu mới</p>
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

                                <form action="{{route('postResetPassword',$token)}}" method="post">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" disabled class="form-control" value="{{$email}}" name="password" placeholder="Email của bạn">
                                    </div>

                                    <div class="mb-3">
                                        <label for="myInput" class="form-label">Tạo mật khẩu</label>
                                        <input type="password" value="{{old('password')}}" name="password" class="form-control" id="myInput">
                                        <div class="mb-3">
                                            <input type="checkbox" onclick="myFunction()"> Hiện mật khẩu
                                            @error('password')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword2" class="form-label">Nhập lại mật khẩu vừa tạo</label>
                                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="againpassword">
                                        <div class="mb-3">
                                            <input type="checkbox" onclick="myFunctionone()"> Hiện mật khẩu
                                            @error('password_confirmation')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        {!! RecaptchaV3::field('resetPassWord') !!}
                                        <button type="submit" class="btn btn-fill-out btn-block" name="resetPassWord">Đặt lại mật khẩu</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END LOGIN SECTION -->
        </div>
        <!-- END MAIN CONTENT -->

@endsection
