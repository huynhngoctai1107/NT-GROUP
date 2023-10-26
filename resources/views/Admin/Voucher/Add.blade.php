@extends('Admin.Layout.master')
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
                    <x-admin.user.images></x-admin.user.images>
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
                                Giảm khi mua combo 3 món ăn trưa
                            </option>
                            <option value="2"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 2 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 2 ? 'selected' : '' }}
                                    @endif>
                                Giảm khi lần đầu mua ở shop
                            </option>
                            <option value="3"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 3 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 3 ? 'selected' : '' }}
                                    @endif>
                                Giảm khi mua full 5 món ăn trưa
                            </option>
                            <option value="4"
                            @if ($page == 'addVoucher')
                                {{ old('condition') == 4 ? 'selected' : '' }}
                                    @else
                                {{ $data['condition'] ?? '' == 4 ? 'selected' : '' }}
                                    @endif>
                                Giảm cho khách hàng mua nhiều nhất ở shop
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
    <div style="margin-bottom: 30px;"></div>
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



