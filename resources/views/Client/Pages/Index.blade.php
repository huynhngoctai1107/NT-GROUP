@extends('Client.Layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BANNER -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="img">
                    <div class="row">
                        <div class="bds col-md-7 d-flex justify-content-center align-items-center">
                            <div class="content m-lg-5">
                                <h2 class="mt-5 fw-bold ">BẤT ĐỘNG SẢN GIÁ RẺ CHẤT LƯỢNG CAO</h2>
                                <p class="mt-4 ">Kênh mua bán bất động sản ưu tín hàng đầu Kiên Giang.</p>
                                <button class="btn btn-warning p-3 px-xl-5 mt-4 ">Xem ngay</button>
                            </div>
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
    </div>
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION BANNER -->

        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP -->
        <div class="section small_pt pb_70">
            <div class="container">
                <div class="col-md-12 mb-3">
                    <div class="verticalLine">
                        <h3 class="ms-lg-3 ms-3">TIN HOT</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div class="row shop_container">
                                @php
                                    $list = [
                                        [
                                            'name'=> 'Nhà ở giá rẻ tại Cần Thơ',
                                            'img' => 'banner0.webp',
                                            'address' => '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                            'price' => '250000000',
                                        ],
                                        [
                                            'name'=> 'Nhà nguyên căn đầy đủ nội thất tại Cần Thơ',
                                            'img' => 'banner00.jpeg',
                                            'address'=> '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                            'price'=> '2500000000',
                                        ],
                                                                                    [
                                            'name'=> 'Nhà ở giá rẻ tại Cần Thơ',
                                            'img' => 'banner0.webp',
                                            'address' => '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                            'price' => '250000000',
                                        ],
                                        [
                                            'name'=> 'Nhà nguyên căn đầy đủ nội thất tại Cần Thơ',
                                            'img' => 'banner00.jpeg',
                                            'address'=> '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                            'price'=> '2500000000',
                                        ],
                                    ];
                                @endphp
                                <x-client.index.post :list="$list">

                                </x-client.index.post>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section small_pt pb_70">
        <div class="container">
            <div class="col-md-12 mb-3">
                <div class="verticalLine">
                    <h3 class="ms-lg-3 ms-3">TIN VIP</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="row shop_container">
                            <x-client.index.post :list="$list">

                            </x-client.index.post>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END SECTION SHOP -->

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="verticalLine">
                                <h3 class="ms-lg-3 ms-3">TIN RAO BÁN</h3>
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
                <div class="col-md-4 mt-1">
                    <div class="contactInfor mt-5 text-center">
                        <h4>LIÊN HỆ ĐĂNG TIN</h4>
                        <p>+8412345678</p>
                    </div>
                    <div class="admin border mt-4 mt-md-0">
                        <div class="row">
                            <div class="col-4 col-md-12 col-lg-4 text-center">
                                <img src="client/images/banner0.webp" alt="Hình ảnh" class="img-fluid rounded-circle-custom m-3">
                            </div>
                            <div class="col-8 col-md-12 col-lg-8 d-flex justify-content-center align-items-center">
                                <div class="infor">
                                    <h5>PHÒNG KD</h5>
                                    <div class="phone border-warning text-warning p-2 rounded bg-light">
                                        <i class="bi bi-telephone-fill"></i>
                                        <span>Gọi ngay</span>
                                    </div>
                                </div>
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
		.verticalLine {
			border-left: thick solid #ff0000;
		}

		.img {
			background-image: url("client/images/banner0.webp");
		}

		.bds {
			height: 550px !important;
		}

		.hexagon {
			width: 280px;
			/* Độ rộng của hình lục giác */
			height: 280px;
			/* Độ cao của hình lục giác */
			background-color: #007bff;
			/* Màu nền của hình lục giác */
			position: relative;
			clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
		}

		.hexagon-inner {
			width: 100%;
			height: 100%;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.rounded-circle-custom {
			border-radius: 50%;
			width: 100px;
			/* Điều chỉnh kích thước ảnh theo ý muốn */
			height: 100px;
			/* Điều chỉnh kích thước ảnh theo ý muốn */
			object-fit: cover;
			/* Cách hình ảnh sẽ được hiển thị */
		}
		.shorten {
			/*width: 450px; !* Độ rộng của phần tử chứa văn bản( điền bên style của thẻ trực tiếp)*!*/
			white-space: nowrap; /* Ngăn chữ bị ngắt dòng */
			overflow: hidden; /* Ẩn phần chữ dư thừa */
			text-overflow: ellipsis; /* Hiển thị dấu ba chấm (...) khi chữ bị cắt */
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


        // Lặp qua tất cả các phần tử có class "price"
        var priceElements = document.querySelectorAll('.format-number');
        priceElements.forEach(function (element) {
            // Lấy giá trị số tiền từ thuộc tính "data-price"
            var price = parseFloat(element.textContent);

            // Kiểm tra nếu số tiền lớn hơn hoặc bằng 1 tỷ
            if (price >= 1000000000) {
                // Tính tỷ và triệu
                var ty = Math.floor(price / 1000000000);
                var trieu = Math.floor((price % 1000000000) / 1000000);

                // Định dạng số tiền thành 'x tỷ y triệu' và gán lại cho phần tử
                var formattedPrice = ty + ' tỷ';
                if (trieu > 0) {
                    formattedPrice += ' ' + trieu + ' triệu';
                }

                element.textContent = formattedPrice;
            }
            else if (price >= 1000000) {
                // Nếu số tiền lớn hơn hoặc bằng 1 triệu và dưới 1 tỷ
                var trieu = Math.floor(price / 1000000);

                // Định dạng số tiền thành 'x triệu' và gán lại cho phần tử
                element.textContent = trieu + ' triệu';
            }
            else {
                // Nếu số tiền dưới 1 triệu, giữ nguyên
                element.textContent = price;
            }
        });
    </script>
@endpush
