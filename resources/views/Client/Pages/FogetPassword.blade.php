@extends('client.layout.master')

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
                                    <p class="pt-3">Đừng lo lắng, chúng tôi đã có bạn! Hãy lấy cho bạn một mật khẩu mới. Vui
                                        lòng nhập địa chỉ email hoặc tên người dùng của bạn.</p>
                                </div>
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                    </div>

                                    <div class="login_footer form-group mb-3">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Tôi đồng ý với
                                                    các điều khoản trên</span></label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Gửi</button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span>Hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a>
                                    </li>
                                </ul>
                                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="{{route('signup')}}">Đăng
                                        ký</a></div>
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
