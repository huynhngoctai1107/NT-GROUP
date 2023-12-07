@extends('Client.Layout.Master')

@section('title')
    Thông tin tài khoản - NT GROUP
@endsection
@section('main')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            @if(Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            <div class="col-md-4 col-12 mb-5 mb-lg-0 wow fadeIn">

                <div class="card ">
                    <div class="p-4">
                        <div class="d-flex justify-content-center">
                            <div class="col-md-4 col-3 me-md-0 me-3 ">
                                <img src="{{$user->image != NULL ? asset('images/users/'.$user->image): asset('images/users/user-1.png')}}" alt="user" class="rounded-circle" width="100"/>
                            </div>
                            <div class="ps-md-4 col-md-8 col-6  @if($follow == FALSE) flex-column justify-content-center mt-4 d-flex @endif ">
                                <h3 class="h4 mb-0">{{$user->fullname ?? ""}}</h3>
                                <p class="text-danger mb-3">{{$user->name}}</p>
                                @if($follow)
                                    <form action="{{ $checkFollower == NULL ? route('follow') : route('unFollow') }}" method="get">
                                        <input type="hidden" name="id_user" value="{{ $checkFollower == NULL ? auth()->user()->id : $user->id }}">
                                        <input type="hidden" name="id_follower" value="{{ $checkFollower == NULL ? $user->id : auth()->user()->id }}">
                                        <button type="submit" class="button-24 py-2 px-3" role="button">
                                            <i class="fa {{ empty($checkFollower) ? 'fa-plus' : 'fa-minus' }} mr-2 "></i>
                                            {{ empty($checkFollower) ? 'Theo dõi' : 'Bỏ theo dõi' }}
                                        </button>
                                    </form>
                                @elseif(!auth()->check())
                                    <a href="{{ route('follow') }}">
                                        <i class="fa fa-plus mr-2 "></i> Theo dõi
                                    </a>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-centerph  mb-2">
                        <div class="col-6  justify-content-center d-flex flex-column align-items-center">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="font-weight: 600; font-size: 16px">Lượt theo dõi</a>
                            <span style="font-weight:600 ">
                              {{$ViewFollow['total']->sum_follower ?? 0}}
                            </span>
                        </div>
                        <div class="col-6 justify-content-center d-flex flex-column align-items-center ">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropOne" style="font-weight: 600; font-size: 16px">Đã theo dõi</a>

                            <span style="font-weight:600 ">
                               {{$followed['total']->sum_follower ?? 0}}
                            </span>
                        </div>


                    </div>


                    <div class="card-body border-top">
                        <div class="row j">
                            <div class="col-3 justify-content-center d-flex">
                                <a href=""><i class="bi bi-facebook"></i></a></div>
                            <div class="col-3 justify-content-center d-flex">
                                <a href="mailto:{{$user->email}}"><i class="bi bi-envelope"></i></a></div>
                            <div class="col-3 justify-content-center d-flex">
                                <a href="tel:{{$user->phone??""}}"><i class="bi bi-telephone"></i></a>
                            </div>
                            <div class="col-3 justify-content-center d-flex">
                                <a href=""><i class="bi bi-youtube"></i></a></div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-8 px-4">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Theo dõi</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bài viết</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        
                        @if(auth()->check() && ($user->id == auth()->user()->id))
                            @if($postFollow !== NULL)
                                <x-client.index.postsale :list="$postFollow"></x-client.index.postsale>
                                <div class="d-flex justify-content-center mt-4">
                                    {{$postFollow->links('pagination::bootstrap-4')}}
                                </div>
                            @else
                                Hiện tại không có bài viết theo dõi nào
                            @endif
                        @else
                            Danh sách này bị ẩn khi không phải chủ tài khoản này!
                        @endif


                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                        @if(count($postUser) !== 0)
                            <x-client.index.postsale :list="$postUser"></x-client.index.postsale>
                        @else
                            Hiện tại không có bài đăng nào
                        @endif
                    </div>

                </div>


            </div>

        </div>

        <div class="modal fade mt-0" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Danh sách tài khoản theo dõi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <x-client.account.follower :getFollow="$ViewFollow['getview']" check=""></x-client.account.follower>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade mt-0" id="staticBackdropOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelOne" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabelOne">Danh sách tài khoản đã theo dõi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(auth()->check())
                            @if($user->id == auth()->user()->id)
                                <x-client.account.follower :getFollow="$followed['getview']" :check="$user->id"></x-client.account.follower>
                            @else
                                Danh sách này bị ẩn khi không phải chủ tài khoản này!
                            @endif
                        @else
                            Danh sách này bị ẩn khi không phải chủ tài khoản này!
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Đóng</button>

                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection

@push('styles')
    <style>
		.bi {
			font-size: 23px !important;
		}
		.modal {
			top: 0% !important;
		}
		.button-24 {
			background: #FF4742;
			border: 1px solid #FF4742;
			border-radius: 6px;
			box-shadow: rgba(0, 0, 0, 0.1) 1px 2px 4px;
			box-sizing: border-box;
			color: #FFFFFF;
			cursor: pointer;
			display: inline-block;
			font-family: nunito, roboto, proxima-nova, "proxima nova", sans-serif;
			font-size: 14px;
			font-weight: 600;
			line-height: 16px;
			min-height: 40px;
			outline: 0;
			padding: 12px 14px;
			text-align: center;
			text-rendering: geometricprecision;
			text-transform: none;
			user-select: none;
			-webkit-user-select: none;
			touch-action: manipulation;
			vertical-align: middle;
		}

		.button-24:hover,
		.button-24:active {
			background-color: initial;
			background-position: 0 0;
			color: #FF4742;
		}

		.button-24:active {
			opacity: .5;
		}
		.card-name {
			display: -webkit-box;
			-webkit-line-clamp: 2;
			-webkit-box-orient: vertical;
			overflow: hidden;
		}


    </style>
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
@endpush
