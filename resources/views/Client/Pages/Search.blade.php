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
                            @php
                                $list = [
                                    [
                                        'name'=> 'Nhà ở giá rẻ tại Cần Thơ',
                                        'img' => 'client/images/a1.webp',
                                        'address' => '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                        'price' => '2000000000',
                                        'phone' => '032145678',
                                    ],
                                    [
                                        'name'=> 'Nhà nguyên căn đầy đủ nội thất tại Cần Thơ',
                                        'img' => "env('APP_URL') . 'client/images/banner0.jpeg'",
                                        'address'=> '170 Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ',
                                        'price'=> '200000',
                                        'phone' => '032145678',
                                    ],
                                ];
                            @endphp
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
                        <x-client.blog.blogVip :list="$list">

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
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0"
                                   placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                    value="Submit">Subscribe
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
@endsection
@push('styles')
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
