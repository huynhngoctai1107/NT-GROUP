@extends('Client.Layout.Master')

@section('title')
    Tin Tức Thị Trường - NT GROUP
@endsection
@section('active3')
    active
@endsection
@php
    $title = "Danh Sách Tin Tức";
@endphp
@section('main')
    <!-- START SECTION BREADCRUMB -->

    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
    <!-- END SECTION BREADCRUMB -->

    <div class="main_content">

        <!-- START SECTION BLOG -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if (isset($message))
                            <div class="alert alert-info">
                                {{ $message }}
                            </div>
                        @endif
                        <div class="row">
                            @foreach($data as $item)
                                <div class="col-xl-4 col-md-6">
                                    <div class="blog_post blog_style2 box_shadow1">
                                        <div class="blog_img">
                                            <a href="{{ route('SingleBlog', $item->slug) }}">
                                                @php
                                                    $image = json_decode($item->image);
                                                @endphp
                                                @if (is_array($image))
                                                    <img src="{{ $image[0]->url }}" alt="blog_small_img1" class="responsive-img" style="height: 200px;">
                                                @else
                                                    <img src="{{ asset('images/blogs/' . $item->image) }}" alt="blog_small_img1" class="responsive-img" style="height: 200px;">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="blog_content bg-white">
                                            <div class="blog_text">
                                                <h6 class="blog_title"><a href="{{route('SingleBlog',$item->slug)}}">{{ $item->title }}</a></h6>
                                                <ul class="list_none blog_meta">
                                                    <li><a href="#"><i class="ti-calendar"></i> {{ date('d-m-Y', strtotime($item->created_at)) }}</a></li>
                                                    <li><a href="#"><i class="ti-comments"></i> 10</a></li>
                                                </ul>
                                                <div class="blog_subtitle">{!! $item->excerpt !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $data->links('pagination::bootstrap-4') }}
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <div class="search_form">
                                    <form action="{{route('SearchBlogClient')}}" method="GET">
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
    </div>
@endsection
@push('script')
    <!-- fit video  -->
    <script src="assets/js/jquery.fitvids.js"></script>
@endpush
@push('styles')
    <style>
		.responsive-img {
			max-width: 100%;
			height: auto;
		}
		.blog_title {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.blog_subtitle {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
		.row {
			display: flex;
			flex-wrap: wrap;
		}

		.col-xl-4, .col-md-6 {
			margin-bottom: 20px; /* Khoảng cách giữa các div */
		}

		.blog_post {
			height: 100%; /* Chiều cao tối đa */
		}
		.card-name {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}
    </style>
@endpush
