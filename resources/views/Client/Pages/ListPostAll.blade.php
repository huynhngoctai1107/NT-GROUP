@extends('Client.Layout.Master')

@section('title')
    TIN - NT GROUP
@endsection
@section('active4')
    active
@endsection
@php
    $title = "Danh Sách Tin";
@endphp
@section('main')
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
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

                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                            <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="row justify-content-between">
                                <div class="col-md-8">
                                    <div class="row shop_container list">
                                        <x-client.index.postlist :list="$list"></x-client.index.postlist>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <x-client.pages.searchpost :dataToCategory="$dataToCategory" :dataToDemand="$dataToDemand" :dataToPrice="$dataToPrice" :dataToAcreage="$dataToAcreage"></x-client.pages.searchpost>
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
                                        <div class="box">
                                            <x-client.index.postsale :list="$lq"></x-client.index.postsale>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-1">
                                    <x-client.index.contactpost></x-client.index.contactpost>
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
