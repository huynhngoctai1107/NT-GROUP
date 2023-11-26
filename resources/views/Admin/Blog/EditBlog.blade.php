@extends('Admin.Layout.Master')


{{-- css --}}
@push('link')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
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
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    {{-- endcss --}}
    <style>
		.select2-container--default .select2-selection--multiple .select2-selection__choice {
			background-color: #007bff !important;
		}

		/* CSS cho phần danh sách hình ảnh */
		.image-list {
			display: flex;
			flex-wrap: wrap;
			margin: 10px 0;
		}

		.image-list img {
			width: 150px;
			/* Điều chỉnh kích thước hình ảnh tùy ý */
			height: auto;
			margin: 5px;
			border: 1px solid #ccc;
		}

		/* CSS cho nút xóa */
		.remove-image {
			background: red;
			color: white;
			border: none;
			padding: 5px 10px;
			cursor: pointer;
		}
    </style>
    {{-- title --}}
@endpush
@section('title')
    Thêm tin tức
@endsection
{{-- endtitle --}}

@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <form action="{{route('editBlog',$data->slug)}}" method="post" class="mx-5 pt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        @error('title')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="title" class="form-label">Tên bài viết</label>
                        <input type="text" class="form-control" name="title" value="{{ $data->title }}" id="title">
                        <input type="hidden" class="form-control" value="{{ $data->id_user }}" name="id_user">
                    </div>
                    <div class="mb-3">
                        <label for="id_category_blog" class="form-label">Chọn danh mục</label>
                        <select class="form-control" name="id_category_blog" id="id_category_blog">
                            @foreach ($dataCategoryBlog as $row)
                                <option value="{{ $row->id }}" @if (old('id_category_blog', $data->id_category_blog) == $row->id) selected @endif data-name="{{ $row->name }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <label class="form-label">Thêm ảnh đại diện</label>
                    <div class="file-upload">
                        @error('uploadfile')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <div class="image-upload-wrap">
                            <input class="form-control" id="formFileSm" type="file" name="uploadfile" accept="image/*" onchange="readURL(this);">
                        </div>
                        <div class="file-upload-content">
                            <div class="image-list">
                                <!-- Đây là nơi để hiển thị danh sách các hình ảnh đã thêm -->
                            </div>
                        </div>
                    </div>

                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var imageList = document.querySelector('.image-list'); // Chọn phần tử chứa danh sách hình ảnh

                                // Xóa tất cả hình ảnh hiện có trước khi thêm hình ảnh mới
                                removeUpload();

                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    var image = document.createElement('img'); // Tạo một phần tử hình ảnh
                                    image.src = e.target.result; // Đặt nguồn hình ảnh từ dữ liệu đọc
                                    imageList.appendChild(image); // Thêm hình ảnh vào danh sách
                                }

                                reader.readAsDataURL(input.files[0]);
                            }
                        }

                        function removeUpload() {
                            var imageList = document.querySelector('.image-list');
                            imageList.innerHTML = ''; // Xóa tất cả hình ảnh trong danh sách
                        }
                    </script>
                    <div class="form-group">
                        @error('excerpt')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="summernote1">Tiêu đề phụ</label>
                        <textarea id="summernote1" name="excerpt">{{ $data->excerpt }}</textarea>
                    </div>
                    <div class="form-group">
                        @error('content')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="summernote">Nội dung</label>
                        <textarea id="summernote" name="content">{{ $data->content }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Sửa</button>
                </form>
            </div>
        </div>
    </div>
@endsection

{{-- javascript --}}
@push('javascript')
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('plugins/select2/js/address.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote()
        });
        $(function () {
            // Summernote
            $('#summernote1').summernote()
        });

        $(function () {
            $('.select2').select2()
        });
    </script>
@endpush
{{-- endjavascript --}}


{{-- main page --}}
