@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Đăng ký";
@endphp
@section('showhide')

    <script src="{{asset('client/js/showhide.js')}}"></script>
@endsection

@section('main')

    <!-- START SECTION BREADCRUMB -->
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
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
                                    <h3>Đăng ký</h3>
                                </div>
                                @if(Session::has('error-login'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error-login')}}
                                    </div>
                                @endif
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                                <form action="{{route('registerFrom')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}" placeholder="Tên">
                                        @error('fullname')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                                        @error('email')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="address" value="{{old('address')}}" placeholder="Địa chỉ">
                                        @error('address')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Số điện thoại">
                                        @error('phone')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type='file' class="form-control" name="uploadfile" multiple id="imgInp"/>
                                    </div>

                                    @error('uploadfile')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    <div class="mb-3 pt-1">
                                        <input type="password" value="{{ old('password') }}" name="password" class="form-control" id="myInput" placeholder="Tạo mật khẩu">
                                        <div class="mb-3">
                                            <input type="checkbox" onclick="togglePasswordVisibility('myInput', 'againpassword')"> Hiện mật khẩu
                                            @error('password')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="againpassword" placeholder="Nhập lại mật khẩu">
                                        <div class="mb-3">
                                            @error('password_confirmation')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="payment_option mb-50">
                                        <label for="exampleInputFile">Giới tính</label>
                                        <div class="custome-radio d-flex ">
                                            <input class="form-check-input" type="radio" name="gender" value="Nam" {{old('gender') =="Nam"? "checked" : ""}} id="exampleRadios3"/>
                                            <label class="form-check-label me-3" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Nam</label>

                                            <input class="form-check-input" type="radio" name="gender" value="Nữ" {{old('gender') =="Nữ"? "checked" : ""}} id="exampleRadios4"/>
                                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Nữ</label>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    <div class="login_footer form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="checkbok" id="exampleCheckbox2" value="checkbok">
                                            <label class="form-check-label" for="exampleCheckbox2">
                                                Tôi đồng ý với các điều khoản trên - <a href="{{ route('terms') }}">Xem điều khoản</a>
                                            </label>
                                        </div>
                                    </div>

                                    @error('checkbok')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                    @enderror
                                    <div class="form-group mb-3">
                                         <button type="submit" class="btn btn-fill-out btn-block"  name="resigter">Đăng ký</button>
                                    </div>
                                </form>
                                <div class="form-note text-center">Bạn đã có tài khoản?
                                    <a href="{{route('login')}}">Đăng nhập</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->
    </div>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
    <!-- END MAIN CONTENT -->
@endsection

