@extends('Client.Layout.master')

@section('title')
    Kết Quả Tìm Kiếm - NT GROUP
@endsection
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="verticalLine">
                            <h3 class="ms-lg-3 ms-3">KẾT QUẢ TÌM KIẾM</h3>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="box">
                            <x-client.index.postSale :list="$list">

                            </x-client.index.postSale>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12 bg-light">
                        <div class="d-flex justify-content-between">
                            <button class="btn" id="banDatBtn">Nhà bán đất</button>
                            <button class="btn" id="choThueBtn">Nhà đất cho thuê</button>
                        </div>
                        <div class="mt-3" id="searchForm">
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

                                    <button type="submit" class="btn btn-warning">
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

                                    <button type="submit" class="btn btn-warning">
                                        <i class="bi bi-search"></i>
                                        Tìm thuê
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="box">
                        <div class="verticalLine">
                            <h3 class="ms-lg-3">VIP BẤT ĐỘNG SẢN</h3>
                        </div>
                        <x-client.blog.blogVip :list="$sale">

                        </x-client.blog.blogVip>


                    </div>
                </div>
            </div>
        </div>
        <div class="xemthem d-flex justify-content-center mt-3">
            <button class="btn btn-warning ">Xem thêm</button>
        </div>


    </div>

    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
@endsection
@push('styles')
    <style>
	    .card-name {
		    display: -webkit-box;
		    -webkit-line-clamp: 2;
		    -webkit-box-orient: vertical;
		    overflow: hidden;
	    }
	    .custom-image {
		    width: 120px;
		    height: 120px;
		    object-fit: cover; /* Tùy chọn: để đảm bảo hình ảnh được hiển thị đầy đủ trong ô ảnh */
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
