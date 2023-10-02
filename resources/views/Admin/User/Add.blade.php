@extends('Admin.Layout.master')


{{-- css --}}
@section('link')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
    {{-- endcss --}}


    {{-- title --}}
@endsection
@section('title')
    @if ($page == 'addUser')
        Thêm tài khoản
    @else
        Sửa tài khoản
    @endif
@endsection
{{-- endtitle --}}

@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <form action="{{ route($page == 'addUser' ? 'addUser' : 'editUser') }}" enctype="multipart/form-data" method="post" class="mx-5 pt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" value="{{ $page == 'addUser' ? old('fullname') : $data->fullname ?? 'Huỳnh Ngọc Tài' }}" name="fullname" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{ $page == 'addUser' ? old('email') : $data->email ?? 'email@gmail.com' }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    @if ($page == 'addUser')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control" value="{{ old('password') }}" name="password" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Giới tính</label>
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Nữ
                            </label>
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" value="{{ $page == 'addUser' ? old('phone') : $data->phone ?? '0949615859' }}" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="textAreaExample6">Địa chỉ</label>

                        <textarea class="form-control" name="addres" id="textAreaExample6" rows="3">{{ $page == 'addUser' ? old('addres') : $data->addres ?? 'Cần thơ ' }}</textarea>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="textAreaExample6">Tải lên hình ảnh</label>

                        <div class="file-upload">
                            <div class="file-select">
                                <div class="file-select-button" id="fileName">Choose File</div>
                                <div class="file-select-name" id="noFile">No file chosen...</div>
                                <input type="file" name="chooseFile" id="chooseFile">
                            </div>
                        </div>


                    </div>

                    <button type="submit" class="btn btn-primary">    @if ($page == 'addUser')
                            Thêm tài khoản
                        @else
                            Sửa tài khoản
                        @endif</button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- javascript --}}
@section('js')
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script>
        $('#chooseFile').bind('change', function () {
            var filename = $("#chooseFile").val();
            if (/^\s*$/.test(filename)) {
                $(".file-upload").removeClass('active');
                $("#noFile").text("No file chosen...");
            }
            else {
                $(".file-upload").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
            }
        });

    </script>

@endsection
{{-- endjavascript --}}


{{-- main page --}}
<style>

	.copyright {
		display: block;
		margin-top: 100px;
		text-align: center;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 12px;
		font-weight: bold;
		text-transform: uppercase;
	}
	.copyright a {
		text-decoration: none;
		color: #EE4E44;
	}


	/****** CODE ******/

	.file-upload {display: block;text-align: center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
	.file-upload .file-select {display: block;border: 2px solid #dce4ec;color: #34495e;cursor: pointer;height: 40px;line-height: 40px;text-align: left;background: #FFFFFF;overflow: hidden;position: relative;}
	.file-upload .file-select .file-select-button {background: #dce4ec;padding: 0 10px;display: inline-block;height: 40px;line-height: 40px;}
	.file-upload .file-select .file-select-name {line-height: 40px;display: inline-block;padding: 0 10px;}
	.file-upload .file-select:hover {border-color: #34495e;transition: all .2s ease-in-out;-moz-transition: all .2s ease-in-out;-webkit-transition: all .2s ease-in-out;-o-transition: all .2s ease-in-out;}
	.file-upload .file-select:hover .file-select-button {background: #34495e;color: #FFFFFF;transition: all .2s ease-in-out;-moz-transition: all .2s ease-in-out;-webkit-transition: all .2s ease-in-out;-o-transition: all .2s ease-in-out;}
	.file-upload.active .file-select {border-color: #3fa46a;transition: all .2s ease-in-out;-moz-transition: all .2s ease-in-out;-webkit-transition: all .2s ease-in-out;-o-transition: all .2s ease-in-out;}
	.file-upload.active .file-select .file-select-button {background: #3fa46a;color: #FFFFFF;transition: all .2s ease-in-out;-moz-transition: all .2s ease-in-out;-webkit-transition: all .2s ease-in-out;-o-transition: all .2s ease-in-out;}
	.file-upload .file-select input[type=file] {z-index: 100;cursor: pointer;position: absolute;height: 100%;width: 100%;top: 0;left: 0;opacity: 0;filter: alpha(opacity=0);}
	.file-upload .file-select.file-select-disabled {opacity: 0.65;}
	.file-upload .file-select.file-select-disabled:hover {cursor: default;display: block;border: 2px solid #dce4ec;color: #34495e;cursor: pointer;height: 40px;line-height: 40px;margin-top: 5px;text-align: left;background: #FFFFFF;overflow: hidden;position: relative;}
	.file-upload .file-select.file-select-disabled:hover .file-select-button {background: #dce4ec;color: #666666;padding: 0 10px;display: inline-block;height: 40px;line-height: 40px;}
	.file-upload .file-select.file-select-disabled:hover .file-select-name {line-height: 40px;display: inline-block;padding: 0 10px;}
</style>
