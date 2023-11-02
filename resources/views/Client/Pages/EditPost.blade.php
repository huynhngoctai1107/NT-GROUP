@extends('Client.Layout.Master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = 'Sửa Tin';
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
            <form action="{{ route('storePostsClient', $data->slug) }}" method="post" class="row g-3" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    @error('title')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="title" class="form-label">Tiêu Đề *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}">
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
                    <div style="width: 45%;">
                        <label for="id_demand" class="form-label">Chọn nhu cầu</label>
                        <select class="form-select" name="id_demand" id="id_demand" style="width: 100%; height: 50px">
                            @foreach ($demand as $row)
                                <option value="{{ $row->id }}" @if (old('id_demand', $data->id_demand) == $row->id) selected
                                        @endif>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 45%;">
                        <label for="id_category" class="form-label">Chọn danh mục</label>
                        <select class="form-select" name="id_category" id="id_category" style="width: 100%; height: 50px">
                            @foreach ($category as $row)
                                <option value="{{ $row->id }}" @if (old('id_category', $data->id_category) == $row->id) selected
                                        @endif>{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-12" style="display: flex; justify-content: space-between">
                    <div style="width: 45%;">
                        <label for="id_price" class="form-label">Chọn giá</label>
                        <select class="form-select" name="id_price" id="id_price" style="width: 100%; height: 50px">
                            @foreach ($price as $row)
                                <option value="{{ $row->id }}" @if (old('id_price', $data->id_price) == $row->id) selected
                                        @endif>{{ $formatPrice($row->name_min) }} - {{ $formatPrice($row->name_max) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="width: 45%;">
                        <label for="id_acreage" class="form-label">Chọn diện tích</label>
                        <select class="form-select" name="id_acreage" id="id_acreage" style="width: 100%; height: 50px">
                            @foreach ($acreage as $row)
                                <option value="{{ $row->id }}" @if (old('id_acreage', $data->id_acreage) == $row->id) selected
                                        @endif>{{ $row->name_min }} m² - {{ $row->name_max }} m²</option>
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
                        <input type="number" class="form-control" id="price" name="price" value="{{$data->price}}">
                    </div>
                    <div style="width: 45%;">
                        @error('acreage')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                        <label for="acreage" class="form-label">Diện tích *</label>
                        <input type="number" class="form-control" id="acreage" name="acreage" value="{{$data->acreages}}">
                    </div>
                </div>
                <div style="width: 45%;">
                    @error('link_youtube')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="link_youtube" class="form-label">Link YouTube</label>
                    <input type="text" name="link_youtube" placeholder="Link youtube" class="form-control" id="link_youtube" value="{{$data->link_youtube}}">
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
                            <img src="{{ asset('images/medias/' . $row->image) }}" alt="Image" />
                            <a href="{{route('deleteMedia',$row->id)}}">Xóa</a>
                        </div>
                    @endforeach
                </div>
                <label class="form-label">Địa chỉ</label>
                <div>
                    <input type="hidden" value="{{ $address['province'] }}" id="valueCity">
                    <input type="hidden" value="{{ $address['district'] }}" id="valueDistrict">
                    <input type="hidden" value="{{ $address['ward'] }}" id="valueWard">
                    <div class="flex-container" style="display: flex; justify-content: space-between">
                        <div class="mb-3" style="width: 45%;" data-select2-id="29">
                            @error('city')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <select style="width: 100%; height: 50px" id="city" name="city">
                                <option value="" selected>Chọn tỉnh thành</option>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 45%;" data-select2-id="29">
                            @error('district')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
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
                            <select id="ward" name="ward" style="width: 100%; height: 50px">
                                <option value="" selected>Chọn phường xã</option>
                            </select>
                        </div>
                        <div class="mb-3" style="width: 45%">
                            @error('address')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                            @enderror
                            <label class="mb-3" for="addess">Nhâp địa chỉ chi tiết</label>
                            <input type="text" class="form-control mb-3" name="address" value="{{ $address['street'] }}"
                                   placeholder="Nhập địa chỉ chi tiết" id="addess">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="result" name="address1" value="">
                <div class="form-group">
                    @error('subtitles')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label class="mb-3" for="summernote1">Tiêu đề phụ</label>
                    <textarea id="summernote1" name="subtitles">{{$data->subtitles}}</textarea>
                </div>
                <div class="form-group">
                    @error('content')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label class="mb-3" for="summernote">Nội dung</label>
                    <textarea id="summernote" name="content">{{$data->content}}</textarea>
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
                    <input type="text" class="form-control" id="longitude" name="longitude" value="{{$data->longitude}}">
                </div>
                <div class="mb-3">
                    @error('latitude')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                    <label for="latitude">Nhập vĩ độ</label>
                    <input type="text" class="form-control" id="latitude" name="latitude" value="{{$data->latitude}}">
                </div>
                <div>
                    <p class="alert alert-secondary">
                        <b style="font-weight: 700; font-size: 15px; font-family: sans-serif;">Thông Tin Liên Hệ</b>
                    </p>
                </div>
                <div style="display: flex; justify-content: space-between">
                    @php
                        $i = 1;
                    @endphp
                    @foreach($contact as $row)
                        <div style="width: 45%">
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

                <div class="d-flex justify-content-center">
                    <button style="width: 20%;" type="submit" class="btn btn-warning mt-3 mb-5">Sửa Tin</button>
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
			height: auto;
			margin: 5px;
			border: 1px solid #ccc;
		}
    </style>
@endpush
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('plugins/select2/js/edit-address.js') }}"></script>
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
