@extends('Client.Layout.master')

@section('title')
    Thông tin tài khoản - NT GROUP
@endsection
@section('main')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-4 mb-5 mb-lg-0 wow fadeIn">
                <div class="card border-0 shadow">
                    <img src="{{asset('images/users/'.$user->image) }}" alt="...">
                    <div class="card-body p-1-9 p-xl-4">
                        <div class="mb-4">
                            <h3 class="h4 mb-0">{{$user->fullname ?? ""}}</h3>
                            <span class="text-primary">{{$user->name}}</span>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-3">
                                <a href="#!"><i class="far fa-envelope display-25 me-3 text-secondary"></i>{{$user->email ?? "Đang cập nhật"}}
                                </a></li>
                            <li class="mb-3">
                                <a href="#!"><i class="fas fa-mobile-alt display-25 me-3 text-secondary"></i>{{$user->phone ?? "Đang cập nhật"}}
                                </a></li>
                            <li>
                                <a href="#!"><i class="fas fa-map-marker-alt display-25 me-3 text-secondary"></i>{{$user->address ?? "Đang cập nhật"}}
                                </a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-lg-8 px-4">

                    <div class="mb-3 wow fadeIn">
                        <div class="text-start mb-1-6 wow fadeIn">
                            <h4 class="h3 mb-0 text-primary">Danh sách bài viết của tôi</h4>
                        </div>
                    </div>

                    <x-client.index.postSale :list="$post"></x-client.index.postSale>

            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $post->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
		body {margin-top: 20px;}
		.icon-box.medium {
			font-size: 20px;
			width: 50px;
			height: 50px;
			line-height: 50px;
		}
		.icon-box {
			font-size: 30px;
			margin-bottom: 33px;
			display: inline-block;
			color: #ffffff;
			height: 65px;
			width: 65px;
			line-height: 65px;
			background-color: #59b73f;
			text-align: center;
			border-radius: 0.3rem;
		}
		.social-icon-style2 li a {
			display: inline-block;
			font-size: 14px;
			text-align: center;
			color: #ffffff;
			background: #59b73f;
			height: 41px;
			line-height: 41px;
			width: 41px;
		}
		.rounded-3 {
			border-radius: 0.3rem !important;
		}

		.social-icon-style2 {
			margin-bottom: 0;
			display: inline-block;
			padding-left: 10px;
			list-style: none;
		}

		.social-icon-style2 li {
			vertical-align: middle;
			display: inline-block;
			margin-right: 5px;
		}

		a, a:active, a:focus {
			color: #616161;
			text-decoration: none;
			transition-timing-function: ease-in-out;
			-ms-transition-timing-function: ease-in-out;
			-moz-transition-timing-function: ease-in-out;
			-webkit-transition-timing-function: ease-in-out;
			-o-transition-timing-function: ease-in-out;
			transition-duration: .2s;
			-ms-transition-duration: .2s;
			-moz-transition-duration: .2s;
			-webkit-transition-duration: .2s;
			-o-transition-duration: .2s;
		}

		.text-secondary, .text-secondary-hover:hover {
			color: #59b73f !important;
		}
		.display-25 {
			font-size: 1.4rem;
		}

		.text-primary, .text-primary-hover:hover {
			color: #ff712a !important;
		}

		p {
			margin: 0 0 20px;
		}

		.mb-1-6, .my-1-6 {
			margin-bottom: 1.6rem;
		}
    </style>
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
@endpush
