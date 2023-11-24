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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css">
    //
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
    //
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
    @if ($page == 'posts')
        Sửa bài viết
    @endif
@endsection
{{-- endtitle --}}

@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <form action="{{ route('editPosts', $data->slug) }}" method="post" class="mx-5 pt-4" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        @error('title')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label class="form-label">Tên bài viết</label>
                        <input type="text" class="form-control" value="{{$data->title}}" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <input type="hidden" class="form-control" value="{{$data->id}}" name="id_post" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 40%;" data-select2-id="29">
                            @error('id_demand')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label>Chọn nhu cầu</label>
                            <select class="select2" multiple="multiple" data-placeholder="Chọn nhu cầu" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" id="id_demand" name="id_demand">
                                @foreach ($demand as $row)
                                    <option value="{{ $row->id }}" @if (old('id_demand', $data->id_demand) == $row->id) selected @endif data-name="{{ $row->name }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" style="width: 40%;">
                            @error('id_category')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label>Chọn danh mục</label>
                            <select class="select2" multiple="multiple" data-placeholder="Chọn danh mục" style="width: 100%;" id="id_category" name="id_category">
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}" @if (old('id_category', $data->id_category) == $row->id)
                                        selected @endif>{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 40%;">
                            @error('id_user')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label>Chọn người đăng</label>
                            <select class="select2" multiple="multiple" data-placeholder="Chọn người đăng" style="width: 100%;" id="id_user" name="id_user">
                                @foreach ($user as $row)
                                    <option value="{{ $row->id }}" @if (old('id_user', $data->id_user) == $row->id) selected
                                            @endif>{{ $row->fullname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" style="width: 40%;">
                            @error('id_price')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label>Chọn giá</label>
                            <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" id="id_price" name="id_price">
                                @foreach ($price as $row)
                                    <option value="{{ $row->id }}" @if (old('id_price', $data->id_price) == $row->id) selected
                                            @endif>{{ $formatPrice($row->name_min) }} - {{ $formatPrice($row->name_max) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 40%;">
                            @error('id_acreage')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label>Chọn diện tích</label>
                            <select class="select2" multiple="multiple" data-placeholder="Chọn diện tích" style="width: 100%;" id="id_acreage" name="id_acreage">
                                @foreach ($acreage as $row)
                                    <option value="{{ $row->id }}" @if (old('id_acreage', $data->id_acreage) == $row->id)
                                        selected @endif>{{ $row->name_min }} m² - {{ $row->name_max }} m²
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @php
                        $mediaValues = [];
                        foreach ($media as $row) {
                        $mediaValues[] = $row->image;
                        }
                    @endphp
                    <label class="form-label">Thêm ảnh</label>
                    <div class="file-upload">
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" type="file" name="uploadfile[]" onchange="readURL(this);" accept="image/*" multiple/>
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

                                for (var i = 0; i < input.files.length; i++) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        var image = document.createElement('img'); // Tạo một phần tử hình ảnh
                                        image.src = e.target.result; // Đặt nguồn hình ảnh từ dữ liệu đọc
                                        imageList.appendChild(image); // Thêm hình ảnh vào danh sách
                                    }

                                    reader.readAsDataURL(input.files[i]);
                                }
                            }
                        }

                        function removeUpload() {
                            var imageList = document.querySelector('.image-list');
                            imageList.innerHTML = ''; // Xóa tất cả hình ảnh trong danh sách
                        }
                    </script>
                    <h5>Ảnh đã có</h5>
                    <div id="imageContainer" class="image-list">
                        @foreach($media as $row)
                            <div class="d-flex">
                                <img src="{{ asset('images/medias/' . $row->image) }}" alt="Image"/>
                                <a href="{{route('deleteMedia',$row->id)}}">Xóa</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mb-3">
                        @error('price')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="price" id="priceLabel" class="form-label">Giá</label>
                        <input type="number" class="form-control" name="price" value="{{$data->price}}" id="price">
                    </div>
                    <div class="mb-3">
                        @error('acreage')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="acreage" class="form-label">Diện tích</label>
                        <input type="number" class="form-control" name="acreage" value="{{$data->acreages}}" id="acreage">
                    </div>
                    <div class="form-group">
                        @error('subtitles')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="summernote1">Tiêu đề phụ</label>
                        <textarea id="summernote1" name="subtitles">{{$data->subtitles}}</textarea>
                    </div>
                    <div class="form-group">
                        @error('content')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="summernote">Nội dung</label>
                        <textarea id="summernote" name="content">{{$data->content}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="featured_news" class="form-label">Bài viết VIP</label>
                        <input type="number" class="form-control" name="featured_news" value="{{$data->featured_news}}" id="featured_news">
                    </div>
                    <div class="mb-3">
                        @error('link_youtube')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="link_youtube" class="form-label">Link Youtube</label>
                        <input type="text" class="form-control" name="link_youtube" value="{{$data->link_youtube}}" id="link_youtube">
                    </div>

                    <label class="form-label">Địa chỉ</label>
                    <div>
                        <input type="hidden" value="{{ $address['province'] }}" id="valueCity">
                        <input type="hidden" value="{{ $address['district'] }}" id="valueDistrict">
                        <input type="hidden" value="{{ $address['ward'] }}" id="valueWard">
                        <div class="flex-container" style="display: flex; justify-content: space-between">
                            <div class="mb-3" style="width: 40%;" data-select2-id="29">
                                @error('city')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                                <select style="width: 100%; height: 38px" id="city" name="city">
                                    <option value="" selected>Chọn tỉnh thành</option>
                                </select>
                            </div>
                            <div class="mb-3" style="width: 40%;" data-select2-id="29">
                                @error('district')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                                <select style="width: 100%; height: 38px" id="district" name="district">
                                    <option value="" selected>Chọn quận huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex-container" style="display: flex; justify-content: space-between">
                            <div class="mb-3" style="width: 40%;" data-select2-id="29">
                                @error('ward')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                                <select id="ward" name="ward" style="width: 100%; height: 38px">
                                    <option value="" selected>Chọn phường xã</option>
                                </select>
                            </div>
                            <div class="mb-3" style="width: 40%">
                                @error('address')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                                @enderror
                                <input type="text mb-3" class="form-control" name="address" value="{{ $address['street'] }}" placeholder="Nhập địa chỉ chi tiết">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="result" name="address1" value="">
                    <h5>Google Maps </h5>

                    <!-- Google Map -->
                    <div id="map" style="width: 100%; height: 400px;"></div>

                    <!-- Longitude and Latitude Input Boxes -->
                    <div class="mb-3">
                        @error('longitude')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="longitude">Kinh độ</label>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="{{$data->longitude}}">
                    </div>
                    <div class="mb-3">
                        @error('latitude')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="latitude">Vĩ độ</label>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="{{$data->latitude}}">
                    </div>
                    <div class="alert alert-secondary" role="alert">
                        <h5>Thông Tin Liên Hệ</h5>
                    </div>
                    <div style="display: flex; justify-content: space-between">
                        @php
                            $i = 1;
                        @endphp
                        @foreach($contact as $row)
                            <div style="width: 40%">
                                <div class="mb-3">
                                    @error('phone'.$i)
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                    <label for="phone" class="form-label">Số Điện Thoại Liên Hệ {{$i}} *</label>
                                    <input type="number" class="form-control" id="phone" name="phone{{$i}}" value="{{$row->phone}}">
                                    <input type="hidden" name="id{{$i}}" value="{{$row->id}}">
                                </div>
                                <div class="mb-3">
                                    @error('name'.$i)
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                    <label for="name" class="form-label">Tên Liên Hệ {{$i}} *</label>
                                    <input type="text" class="form-control" id="name" name="name{{$i}}" value="{{$row->position}}">
                                </div>
                                <div class="mb-3">
                                    @error('img'.$i)
                                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                                    @enderror
                                    <label for="images">Hình Ảnh Liên Hệ {{$i}}:</label>
                                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="img{{$i}}">
                                    <div class="d-flex">
                                        <img src="{{ asset('images/contacts/' . $row->image) }}" alt="Image" style="width: 150px; height: 150px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>
                            @php
                                $i++; // Tăng $i cho lần lặp tiếp theo
                            @endphp
                        @endforeach
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
    <script src="{{ asset('plugins/select2/js/edit-address.js') }}"></script>
    //
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    //
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Page specific script -->
    {{-- gg map and hinh anh upload.js--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8ttJcdnyqOwb93B47rjRU+ABJxUrEDR/i" crossorigin="anonymous">
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
    {{-- gg map and hinh anh upload.js--}}


    <script src="https://maps.app.goo.gl/uxx2Xc9w7GcKigKt7"></script>
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
        // Create a new Google Map object.
        const map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 10.0401, lng: 105.7364},
            zoom: 10
        });

        // Add a click listener to the map.
        map.addListener('click', function (event) {
            // Get the longitude and latitude of the click event.
            const lng = event.latLng.lng();
            const lat = event.latLng.lat();

            // Update the longitude and latitude input boxes.
            document.getElementById('longitude').value = lng;
            document.getElementById('latitude').value = lat;
        });
    </script>
    <script>
        $(document).ready(function () {
            // Set giá trị mặc định cho label giá
            updatePriceLabel();

            // Xử lý sự kiện khi select thay đổi
            $("#id_demand").change(function () {
                // Cập nhật nội dung của label giá khi select thay đổi
                updatePriceLabel();
            });
        });

        function updatePriceLabel() {
            // Lấy giá trị name từ data-name của option được chọn
            var selectedName = $("#id_demand option:selected").data("name");

            // Hiển thị giá trị name trong label
            $("#priceLabel").text("Giá ");

            // Kiểm tra nếu name là "thuê", thì thêm "/1 tháng"
            if (selectedName === "Thuê") {
                $("#priceLabel").append("thuê 1 tháng");
            }
        }
    </script>
@endpush
{{-- endjavascript --}}


{{-- main page --}}