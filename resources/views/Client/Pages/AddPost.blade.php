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
        <br />
        <div class="row">
            <p class="alert alert-secondary">
                <b style="font-weight: 700; font-size: 15px; font-family: sans-serif;">Thông Tin Bất Động Sản</b>
            </p>
            <form action="{{ route('addClientPosts') }}" method="post" class="row g-3" style="margin-left: 8px;"  enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    @error('title')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="title" class="form-label">Tiêu Đề *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                    <input type="hidden" class="form-control" value="1" name="id_user">
                    <input type="hidden" class="form-control" value="1" name="compilation">
                </div>

                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 45%;">
                        <label for="id_demand" class="form-label">Chọn nhu cầu</label>
                        <select class="form-select" name="id_demand" id="id_demand" style="width: 100%; height: 50px">
                            @foreach ($demand as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 45%;" >
                        <label for="id_category" class="form-label">Chọn danh mục</label>
                        <select class="form-select" name="id_category" id="id_category" style="width: 100%; height: 50px">
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 45%;">
                        <label for="id_price" class="form-label">Chọn giá</label>
                        <select class="form-select" name="id_price" id="id_price" style="width: 100%; height: 50px">
                            @foreach ($price as $row)
                                <option value="{{ $row->id }}">{{ $formatPrice($row->name_min) }} - {{ $formatPrice($row->name_max) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 45%;">
                        <label for="id_acreage" class="form-label">Chọn diện tích</label>
                        <select class="form-select" name="id_acreage" id="id_acreage" style="width: 100%; height: 50px">
                            @foreach ($acreage as $row)
                            <option value="{{ $row->id }}">{{ $row->name_min }} m² - {{ $row->name_max }} m²</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 45%;">
                        @error('price')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="price" class="form-label">Giá *</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                    </div>
                    <div style="width: 45%;">
                        @error('link_youtube')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="link_youtube" class="form-label">Link YouTube</label>
                        <input type="text" name="link_youtube" placeholder="Link youtube" class="form-control" id="link_youtube" value="{{ old('link_youtube') }}">
                    </div>
                </div>

                <label class="form-label">Thêm ảnh</label>
                <div class="file-upload">
                    <div class="image-upload-wrap">
                        <input class="file-upload-input" type="file" name="uploadfile[]" onchange="readURL(this);"
                            accept="image/*" multiple />
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

                                reader.onload = function(e) {
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
                        <div class="mb-3" style="width: 45%;" data-select2-id="29">
                            @error('city')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="city">Chọn tỉnh thành</label>
                            <select style="width: 100%; height: 50px" id="city" name="city">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 45%;" data-select2-id="29">
                            @error('district')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="district">Chọn quận huyện</label>
                            <select style="width: 100%; height: 50px" id="district" name="district">
                                <option value="" selected>Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 45%;" data-select2-id="29">
                            @error('ward')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="ward">Chọn phường xã</label>
                            <select style="width: 100%; height: 50px" id="ward" name="ward">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 45%">
                            @error('address')
                                <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="addess">Nhâp địa chỉ chi tiết</label>
                            <input type="text" class="form-control mb-3" name="address" id="addess"
                                placeholder="Nhập địa chỉ chi tiết">
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
                <div id="map" style="width: 100%; height: 400px;"></div>

                <!-- Longitude and Latitude Input Boxes -->
                <div class="mb-3">
                    @error('longitude')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
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

                <button type="submit" class="btn btn-warning mt-3 mb-5">Đăng Tin</button>
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
            height: auto;
            margin: 5px;
            border: 1px solid #ccc;
        }
    </style>
@endpush
@push('script')
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
