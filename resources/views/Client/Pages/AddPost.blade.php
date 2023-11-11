@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = 'Đăng Tin';
@endphp
@section('main')
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>

    <div class="container">
        @if(Session::has('success'))
            <div class="alert alert-success text-center" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <br/>
        <div class="">
            <p class="alert alert-secondary">
                <b style="font-weight: 700; font-size: 15px; font-family: sans-serif;">Thông Tin Bất Động Sản</b>
            </p>
            <form action="{{ route('addClientPosts') }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    @error('title')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="title" class="form-label">Tiêu Đề *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    @php
                        $userId = null;
                        if (Auth::check()) {
                            $userId = Auth::id();
                        }
                    @endphp
                    <input type="hidden" class="form-control" value="{{ $userId }}" name="id_user">
                    <input type="hidden" class="form-control" value="1" name="compilation">
                </div>

                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 49%;">
                        <label for="id_demand" class="form-label">Chọn nhu cầu</label>
                        <select class="form-control" name="id_demand" id="id_demand">
                            @foreach ($demand as $row)
                                <option value="{{ $row->id }}" data-name="{{ $row->name }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 49%;">
                        <label for="id_category" class="form-label">Chọn danh mục</label>
                        <select class="form-control" name="id_category" id="id_category">
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}" >{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 49%;">
                        <label for="id_price" class="form-label">Chọn giá</label>
                        <select class="form-control" name="id_price" id="id_price">
                            @foreach ($price as $row)
                                <option value="{{ $row->id }}">{{ $formatPrice($row->name_min) }} - {{ $formatPrice($row->name_max) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 49%;">
                        <label for="id_acreage" class="form-label">Chọn diện tích</label>
                        <select class="form-control" name="id_acreage" id="id_acreage">
                            @foreach ($acreage as $row)
                                <option value="{{ $row->id }}">{{ $row->name_min }} m² - {{ $row->name_max }} m²</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 49%;">
                        @error('price')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="price" id="priceLabel" class="form-label">Giá</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    </div>
                    <div style="width: 49%;">
                        @error('acreage')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="acreage" class="form-label">Diện tích *</label>
                        <input type="number" class="form-control" id="acreage" name="acreage" value="{{ old('acreage') }}">
                    </div>
                </div>
                <div  style="width: 50%;">
                    @error('link_youtube')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="link_youtube" class="form-label">Link YouTube</label>
                    <input type="text" name="link_youtube" placeholder="Link youtube" class="form-control" id="link_youtube" value="{{ old('link_youtube') }}">
                </div>
                <label class="form-label">Thêm ảnh</label>
                <div class="file-upload">
                    <div class="image-upload-wrap">
                        @error('uploadfile')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
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
                <label class="form-label">Địa chỉ</label>
                <div>
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 49%;" data-select2-id="29">
                            @error('city')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="city">Chọn tỉnh thành</label>
                            <select class="form-control" id="city" name="city">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 49%;" data-select2-id="29">
                            @error('district')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="district">Chọn quận huyện</label>
                            <select class="form-control" id="district" name="district">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 49%;" data-select2-id="29">
                            @error('ward')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="ward">Chọn phường xã</label>
                            <select class="form-control" id="ward" name="ward">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 49%">
                            @error('address')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="addess">Nhâp địa chỉ chi tiết</label>
                            <input type="text" class="form-control mb-3" name="address" id="addess" placeholder="Nhập địa chỉ chi tiết">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="result" name="address1" value="">
                <div class="form-group">
                    @error('subtitles')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label class="mb-3" for="summernote1">Tiêu đề phụ</label>
                    <textarea id="summernote1" name="subtitles">{{ old('subtitles') }}</textarea>
                </div>
                <div class="form-group">
                    @error('content')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label class="mb-3" for="summernote">Nội dung</label>
                    <textarea id="summernote" name="content">{{ old('content') }}</textarea>
                </div>

                <h4>Google Maps </h4>

                <!-- Google Map -->
                <div>
                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>

                <!-- Longitude and Latitude Input Boxes -->
                <div class="mb-3">
                    @error('longitude')
                    <p class="text-danger ">{{ $message }}</p>
                    @enderror
                    <label for="longitude">Nhập kinh độ</label>
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}">
                </div>
                <div class="mb-3">
                    @error('latitude')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="latitude">Nhập vĩ độ</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}">
                </div>
                <div>
                    <p class="alert alert-secondary">
                        <b style="font-weight: 700; font-size: 15px; font-family: sans-serif;">Thông Tin Liên Hệ</b>
                    </p>
                </div>
                <div style="display: flex; justify-content: space-between">
                    <div style="width: 49%">
                        <div class="mb-3">
                            @error('phone1')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label for="phone" class="form-label">Số Điện Thoại Liên Hệ 1 *</label>
                            <input type="number" class="form-control" id="phone" name="phone1" value="{{ old('phone1') }}">
                        </div>
                        <div class="mb-3">
                            @error('name1')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label for="name" class="form-label">Tên Liên Hệ 1 *</label>
                            <input type="text" class="form-control" id="name" name="name1" value="{{ old('name1') }}">
                        </div>
                        <div class="mb-3">
                            @error('img1')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label for="images">Hình Ảnh Liên Hệ 1:</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="img1">
                        </div>
                    </div>
                    <div style="width: 49%">
                        <div class="mb-3">
                            @error('phone2')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label for="phone" class="form-label">Số Điện Thoại Liên Hệ 2 *</label>
                            <input type="number" class="form-control" id="phone" name="phone2" value="{{ old('phone2') }}">
                        </div>

                        <div class="mb-3">
                            @error('name2')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label for="name" class="form-label">Tên Liên Hệ 2 *</label>
                            <input type="text" class="form-control" id="name" name="name2" value="{{ old('name2') }}">
                        </div>

                        <div class="mb-3">
                            @error('img2')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label for="images">Hình Ảnh Liên Hệ 2:</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file" name="img2">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button style="width: auto;" type="submit" class="btn btn-warning mt-3 mb-5">Đăng Tin</button>
                </div>
                <!-- JavaScript Code -->
            </form>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <style>
		/* CSS cho phần danh sách hình ảnh */
		.image-list {
			display: flex;
			flex-wrap: wrap;
			margin: 10px 0;
		}

		.image-list img {
			width: 150px;
			/* Điều chỉnh kích thước hình ảnh tùy ý */
			height: 150px;
			margin: 5px;
			border: 1px solid #ccc;
		}
    </style>
@endpush
@push('script')
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
    {{-- gg map and hinh anh upload.js--}}

    <script src="https://maps.app.goo.gl/uxx2Xc9w7GcKigKt7"></script>
    <script>
        // Create a new Google Map object.
        const map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 10.0401, lng: 105.7364},
            zoom: 10
        });

        // Add a click listener to the map.
        map.addListener('click', function(event) {
            // Get the longitude and latitude of the click event.
            const lng = event.latLng.lng();
            const lat = event.latLng.lat();

            // Update the longitude and latitude input boxes.
            document.getElementById('longitude').value = lng;
            document.getElementById('latitude').value = lat;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function(){
            // Set giá trị mặc định cho label giá
            updatePriceLabel();

            // Xử lý sự kiện khi select thay đổi
            $("#id_demand").change(function(){
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('plugins/select2/js/address.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        });
        $(function() {
            // Summernote
            $('#summernote1').summernote()
        });
    </script>
@endpush
