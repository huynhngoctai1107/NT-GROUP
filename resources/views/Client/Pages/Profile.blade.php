@extends('Client.Layout.master')

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
                                <img src="{{asset('images/users/'.$user->image) }}" alt="user" class="rounded-circle" width="100"/>
                            </div>
                            <div class="ps-md-4 col-md-8 col-6  @if($follow == FALSE) flex-column justify-content-center mt-4 d-flex @endif ">
                                <h3 class="h4 mb-0">{{$user->fullname ?? ""}}</h3>
                                <p class="text-danger mb-3">{{$user->name}}</p>
                                @if($follow == TRUE)

                                    <form action="{{$checkFollower == NULL ? route('follow') : route('unFollow') }}" method="get">
                                        <input type="hidden" name="id_user" value="{{$checkFollower == NULL ? auth()->user()->id : $user->id}}">
                                        <input type="hidden" name="id_follower" value="{{$checkFollower == NULL ? $user->id : auth()->user()->id}}">
                                        <button type="submit" class="button-24 py-2 px-3" role="button">
                                            @if(empty($checkFollower))
                                                <i class="fa fa-plus mr-2 "></i> Theo dõi
                                            @else
                                                <i class="fa fa-minus mr-2 "></i>  Bỏ theo dõi
                                            @endif
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="row justify-content-center p-1 my-2">
                        <div class="col-6  justify-content-center d-flex flex-column align-items-center">
                            <h5 data-bs-toggle="modal" data-bs-target="#staticBackdrop">Lượt theo dõi</h5>
                            <span style="font-weight:600 ">
                              {{$ViewFollow['total']->sum_follower ?? 0}}
                            </span>
                        </div>
                        <div class="col-6 justify-content-center d-flex flex-column align-items-center">
                            <h5 data-bs-toggle="modal" data-bs-target="#staticBackdropOne">Đã theo dõi</h5>
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
                                <a href=""><i class="bi bi-envelope"></i></a></div>
                            <div class="col-3 justify-content-center d-flex"><a href=""><i class="bi bi-telephone"></i></a>
                            </div>
                            <div class="col-3 justify-content-center d-flex">
                                <a href=""><i class="bi bi-youtube"></i></a></div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-12 col-md-8 px-4">

                <div class="mb-3 wow fadeIn">
                    <div class="text-start mb-1-6 wow fadeIn">
                        <h4 class="h3 mb-0 text-danger">Danh sách bài viết của tôi</h4>
                    </div>
                </div>

                <x-client.index.postSale :list="$post"></x-client.index.postSale>

            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $post->links('pagination::bootstrap-4') }}
            </div>
        </div>
        {{--            // danh sach follow--}}
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
        {{--        // danh sach dang follow--}}
        <div class="modal fade mt-0" id="staticBackdropOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabelOne" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabelOne">Danh sách tài khoản đã theo dõi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(auth()->check())
                            @if($follow == FALSE)
                                <x-client.account.follower :getFollow="$followed['getview']" :check="$user->id"></x-client.account.follower>
                            @else
                                Danh sách này bị ẩn khi không phải chủ tài khoản này!
                            @endif
                        @else
                            Danh sách này bị ẩn khi không phải chủ tài khoản này!
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>

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


    </style>
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
@endpush
