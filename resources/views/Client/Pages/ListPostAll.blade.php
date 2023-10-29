@extends('Client.Layout.master')

@section('title')
    TIN - NT GROUP
@endsection
@section('main')
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>DANH SÁCH TIN</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Nhà đất</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- START MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center mb-4 pb-1">
                            <div class="col-12">
                                <div class="product_header">
                                    <div class="product_header_left">
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="order">Mặc định</option>
                                                <option value="popularity">Tin Vip</option>
                                                <option value="date">Tin Hot</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                            <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                        </div>
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="">Hiển thị</option>
                                                <option value="9">9</option>
                                                <option value="12">12</option>
                                                <option value="18">18</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-md-8">
                                    <div class="row shop_container list">
                                        <x-client.index.post-list :list="$list"></x-client.index.post-list>
                                        <!-- Thêm sản phẩm khác tại đây -->
                                    </div>

                                </div>
                                <div class="col-md-4 mt-1">
                                    <div class="row mb-5">
                                        <div class="col-md-12 bg-light">
                                            <div class="d-flex justify-content-between">
                                                <button class="btn" id="banDatBtn">Nhà bán đất</button>
                                                <button class="btn" id="choThueBtn">Nhà đất cho thuê</button>
                                            </div>
                                            <div class="mt-3" id="searchForm">
                                                <form action="{{route('listPost')}}">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nhập từ khóa cần tìm kiếm ..."/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" aria-label="Default select example" name="category">
                                                            <option value="0" selected>Loại BDS</option>
                                                            @foreach($category as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Tỉnh / Thành Phố</option>
                                                            <option value="camau">Cà Mau</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Huyện / Quận</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Xã / Phường</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Giá</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Diện tích</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex justify-content-center">

                                                        <button type="submit" class="btn btn-warning mb-4">
                                                            <i class="bi bi-search"></i>
                                                            Tìm kiếm
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="mt-3" id="searchForm2" style="display: none">
                                                <form>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" id="keyword" name="keyword"/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Loai BĐS</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Tỉnh / Thành Phố</option>
                                                            <option value="camau">Cà Mau</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Huyện / Quận</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Xã / Phường</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Giá</option>
                                                            <option value="nha">Nhà</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <select class="form-select" id="propertyType" name="propertyType">
                                                            <option value="">Diện tích</option>
                                                            <option value="dat">Đất</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex justify-content-center">

                                                        <button type="submit" class="btn btn-warning mb-4">
                                                            <i class="bi bi-search"></i>
                                                            Tìm thuê
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="verticalLine">
                                                <h3 class="ms-lg-3">TIN RAO BÁN</h3>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="box">
                                                <x-client.index.postSale :list="$lq">

                                                </x-client.index.postSale>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <x-client.index.contact_post></x-client.index.contact_post>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <style>
		.card-name {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
    </style>
@endpush
@push('script')
    <script>
        // Lấy thẻ div chứa form
        var searchForm = document.getElementById("searchForm");
        var searchForm2 = document.getElementById("searchForm2");

        // Lấy nút "Nhà bán đất" và nút "Nhà đất cho thuê"
        var banDatBtn = document.getElementById("banDatBtn");
        var choThueBtn = document.getElementById("choThueBtn");

        // Gắn sự kiện click cho nút "Nhà bán đất"
        banDatBtn.addEventListener("click", function () {
            // Hiển thị form
            searchForm.style.display = "block";
            searchForm2.style.display = "none";
        });

        // Gắn sự kiện click cho nút "Nhà đất cho thuê"
        choThueBtn.addEventListener("click", function () {
            // Hiển thị form
            searchForm2.style.display = "block";
            searchForm.style.display = "none";
        });
    </script>
@endpush
