@extends('Client.Layout.master')

@section('title')
    Tin Tức Chi Tiết - NT GROUP
@endsection
@section('active3')
    active
@endsection
@php
    $title = "Chi Tiết Tin Tức";
@endphp
@section('main')
    <!-- START SECTION BREADCRUMB -->

    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
    <!-- END SECTION BREADCRUMB -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="single_post">
                        <h2 class="blog_title">{{$data->title}}</h2>
                        <ul class="list_none blog_meta">
                            <li><a href="#"><i class="ti-calendar"></i> {{ date('d-m-Y', strtotime($data->created_at)) }}</a></li>
                        </ul>
                        <div class="blog_content">
                            {!! $data->content !!}
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 mt-4 pt-2 mt-xl-0 pt-xl-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="search_form">
                                <form action="{{ route('SearchBlog') }}" method="GET">
                                    @csrf
                                    <input class="form-control" placeholder="Tìm kiếm ..." type="text" name="keyword">
                                    <button type="submit" class="btn icon_search">
                                        <i class="ion-ios-search-strong"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="widget">
                            <div class="p card-4">
                                <h5 class="widget_title">Bất Động Sản VIP</h5>
                            </div>
                            <ul class="widget_recent_post">
                                <x-client.blog.blogVip :list="$list">

                                </x-client.blog.blogVip>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BLOG -->

@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <style>

		img {
			object-fit: cover;
		}
		/* Điều chỉnh kích thước bản đồ theo ý muốn */
		#ggmap {
			height: 400px;
			width: 100%;
		}
		.posts_subtitle {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.posts_title {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.card-name {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
        figure{
            width: 700px!important;
        }
        h3{
            padding-top: 30px;
            padding-bottom: 20px;
        }
		h4{
			padding-top: 20px;
		}
    </style>
@endpush
@push('script')

@endpush
