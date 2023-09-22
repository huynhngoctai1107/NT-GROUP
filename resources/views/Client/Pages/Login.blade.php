@extends('client.playout.master')

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
                        <h1>Đăng nhập</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Trang</a></li>
                        <li class="breadcrumb-item active">Đang nhập</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-md-10">
                        <div class="login_wrap">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3>Đăng nhập</h3>
                                </div>
                                <form method="post">
                                    <div class="form-group mb-3">
                                        <input type="text" required="" class="form-control" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" required="" type="password" name="password" placeholder="Mật khẩu">
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <input class="form-control" required="" type="password" name="password"
                                                   placeholder="Code *">
                                        </div>
                                        <span class="security-code ">
                                        <b class="text-new">8</b>
                                        <b class="text-hot">6</b>
                                        <b class="text-sale">7</b>
                                        <b class="text-best">5</b>
                                    </span>
                                    </div>
                                    <div class="login_footer form-group mb-3">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Nhớ tôi</span></label>
                                            </div>
                                        </div>
                                        <a href="{{route('fogetpassword')}}">Quên mật khẩu?</a>
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Đăng nhập</button>
                                    </div>
                                </form>
                                <div class="different_login">
                                    <span>Hoặc</span>
                                </div>
                                <ul class="btn-login list_none text-center">
                                    <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                    <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                                </ul>
                                <div class="form-note text-center">Bạn chưa có tài khoản? <a href="{{route('signup')}}">Đăng ký</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                <input type="text" required="" class="form-control rounded-0"
                                       placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                        value="Submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
