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
    @if ($page == 'addVoucher')
        Thêm mã giảm giá
    @else
        Sửa mã giảm giá
    @endif
@endsection
{{-- endtitle --}}

@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <form action="{{ $page == 'addVoucher' ? route('addVoucher') : route('editFormVoucher' , $data->slug ) }}" enctype="multipart/form-data" method="post" class="mx-5 pt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên mã giảm giá</label>
                        <input type="text" class="form-control" value="{{ $page == 'addVoucher' ? old('name') : $data->name }}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mã code</label>
                        <input type="text" class="form-control" value="{{ $page == 'addVoucher' ? old('code') : $data->code }}" name="code" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="textAreaExample6">Điều kiện giảm</label>
                        <select class="form-select" name="condition" aria-label="Default select example">
                            <option value="1"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 1 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 1 ? 'selected' : '' }}
                                    @endif>
                                Giảm cho tất cả
                            </option>
                            <option value="2"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 2 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 2 ? 'selected' : '' }}
                                    @endif>
                                Nạp lần đầu
                            </option>
                            <option value="3"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 3 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 3 ? 'selected' : '' }}
                                    @endif>
                                Số lượng tin là 10
                            </option>
                            <option value="4"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 4 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 4 ? 'selected' : '' }}
                                    @endif>
                                Top người đăng tin nhiều nhất
                            </option>
                        </select>
                        @error('condition')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số tiền được giảm</label>
                        <input type="text" class="form-control" value="{{ $page == 'addVoucher' ? old('discount') : $data->discount }}" name="discount" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('discount')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ngày hết hạn</label>
                        <input type="date" class="form-control" value="{{ $page == 'addVoucher' ? old('expiration_date') : $data->expiration_date }}" name="expiration_date" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('expiration_date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Hình ảnh</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" value="{{ $page == 'addVoucher' ? old('image') : $data->image }}" name="image" id="imageUpload" accept="image/*">
                        <div class="d-flex justify-content-center align-items-center" style="max-width: 190px; max-height: 190px;  margin: 15px auto;">
                            <div id="imagePreview"></div>
                        </div>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="textAreaExample6">Nội dung (Nếu Có)</label>
                        <textarea class="form-control" name="content" id="textAreaExample6" rows="3">{{ $page == 'addVoucher' ? old('content') : $data->content }}</textarea>
                        @error('content')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if ($page == 'addVoucher')
                            Thêm mã giảm giá
                        @else
                            Sửa mã giảm giá
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- javascript --}}
@section('js')
    <script>
        document.getElementById("imageUpload").addEventListener("change", function (event) {
            var imagePreview = document.getElementById("imagePreview");
            imagePreview.innerHTML = "";

            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = document.createElement("img");
                    img.setAttribute("src", e.target.result);
                    img.setAttribute("class", "img-thumbnail mt-3 thumbnail-image");
                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
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

	.file-upload {
		display: block;
		text-align: center;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 12px;
	}

	.file-upload .file-select {
		display: block;
		border: 2px solid #dce4ec;
		color: #34495e;
		cursor: pointer;
		height: 40px;
		line-height: 40px;
		text-align: left;
		background: #FFFFFF;
		overflow: hidden;
		position: relative;
	}

	.file-upload .file-select .file-select-button {
		background: #dce4ec;
		padding: 0 10px;
		display: inline-block;
		height: 40px;
		line-height: 40px;
	}

	.file-upload .file-select .file-select-name {
		line-height: 40px;
		display: inline-block;
		padding: 0 10px;
	}

	.file-upload .file-select:hover {
		border-color: #34495e;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload .file-select:hover .file-select-button {
		background: #34495e;
		color: #FFFFFF;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload.active .file-select {
		border-color: #3fa46a;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload.active .file-select .file-select-button {
		background: #3fa46a;
		color: #FFFFFF;
		transition: all .2s ease-in-out;
		-moz-transition: all .2s ease-in-out;
		-webkit-transition: all .2s ease-in-out;
		-o-transition: all .2s ease-in-out;
	}

	.file-upload .file-select input[type=file] {
		z-index: 100;
		cursor: pointer;
		position: absolute;
		height: 100%;
		width: 100%;
		top: 0;
		left: 0;
		opacity: 0;
		filter: alpha(opacity=0);
	}

	.file-upload .file-select.file-select-disabled {
		opacity: 0.65;
	}

	.file-upload .file-select.file-select-disabled:hover {
		cursor: default;
		display: block;
		border: 2px solid #dce4ec;
		color: #34495e;
		cursor: pointer;
		height: 40px;
		line-height: 40px;
		margin-top: 5px;
		text-align: left;
		background: #FFFFFF;
		overflow: hidden;
		position: relative;
	}

	.file-upload .file-select.file-select-disabled:hover .file-select-button {
		background: #dce4ec;
		color: #666666;
		padding: 0 10px;
		display: inline-block;
		height: 40px;
		line-height: 40px;
	}

	.file-upload .file-select.file-select-disabled:hover .file-select-name {
		line-height: 40px;
		display: inline-block;
		padding: 0 10px;
	}
</style>
