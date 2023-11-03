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
                            @if (isset($message))
                                <div class="alert alert-info">
                                    {{ $message }}
                                </div>
                            @endif
                            <x-client.index.postSale :list="$list"></x-client.index.postSale>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <x-client.pages.searchpost :dataToCategory="$dataToCategory" :dataToDemand="$dataToDemand" :dataToPrice="$dataToPrice" :dataToAcreage="$dataToAcreage"></x-client.pages.searchpost>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="{{ asset('plugins/select2/js/address.js') }}"></script>
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
