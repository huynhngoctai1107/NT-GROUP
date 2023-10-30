@extends('Client.Layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Tài Khoản";
@endphp
@section('main')
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
    <div class="section">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
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
                <div class="col-md-12 col-xl-4  mb-5">
                    <div class="card-body text-center">
                        <div class="mt-3 mb-4">
                            <div class="round-image">
                                <img src="@if(auth()->user()->image){{asset('images/users/'.auth()->user()->image )}}@else{{'https://static.vecteezy.com/system/resources/previews/000/439/863/original/vector-users-icon.jpg'}}@endif" class="rounded-circle img-fluid" id="userImage"/>
                            </div>
                            <br/>
                            <h4 class="mb-2">{{auth()->user()->fullname}}</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="dashboard_menu">
                            <ul class="nav nav-tabs flex-column" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link {{Session::get('active') =='payment' ? '' : (Session::get('active') =='updateProfile' ? '' : (Session::get('active') =='updatePassword' ? '' : 'active'))}}  " id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Thống Kê</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Lịch Sử Giao dịch</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{Session::get('active') =='payment' ? 'active' : ''}}" id="wallet-tab" data-bs-toggle="tab" href="#wallet" role="tab" aria-controls="wallet" aria-selected="false"><i class="ti-wallet"></i>Ví của tôi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Session::get('active') =='updateProfile' ? 'active' : ''}}" id="address-tab" data-bs-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true"><i class="ti-location-pin"></i>Cập nhật tài khoản</a>
                                </li>
                                @if(auth()->user()->social_id==0)
                                    <li class="nav-item">
                                        <a class="nav-link {{Session::get('active') =='updatePassword' ? 'active' : ''}}" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Đổi mật khẩu</a>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('logout')}}"><i class="ti-lock"></i>Đăng xuất</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade {{Session::get('active') =='payment' ? '' : (Session::get('active') =='updateProfile' ? '' : (Session::get('active') =='updatePassword' ? '' : 'active show'))}}   " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Thống Kê</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            Biểu đồ thống kê danh thu trang tài khoản là một loại biểu đồ hiển thị dữ liệu về doanh thu của một trang web hoặc ứng dụng. Biểu đồ này thường được sử dụng để theo dõi hiệu suất của các chiến dịch marketing, quảng cáo, hoặc các tính năng mới được triển khai.

                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade " id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Lịch Sử Giao dịch</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-center">>
                                                <tr>
                                                    <th class="product-remove text-center">Loại</th>
                                                    <th class="product-remove text-center">Hình thức</th>
                                                    <th class="product-price">Họ và Tên</th>
                                                    <th class="product-remove">Số tiền</th>
                                                    <th class="product-quantity">Số dư</th>
                                                    <th class="product-subtotal">Nội dung</th>
                                                    <th class="product-remove">Ngày giao dịch</th>
                                                </tr>
                                                </thead>
                                                <tbody class="text-center">>
                                                <x-transactions.rechargehistory :list="$list"></x-transactions.rechargehistory>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade  {{Session::get('active') =='payment' ? 'active show' : ''}} " id="wallet" role="tabpanel" aria-labelledby="wallet-tab">
                                <x-client.account.wallet :payment="$payment"></x-client.account.wallet>
                            </div>

                            <div class="tab-pane fade {{Session::get('active') =='updateProfile' ? 'active show' : ''}}" id="account" role="tabpanel" aria-labelledby="account-tab">
                                <x-client.account.profile></x-client.account.profile>
                            </div>
                            @if(auth()->user()->social_id==0)
                                <div class="tab-pane fade {{Session::get('active') =='updatePassword' ? 'active show' : ''}}" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <x-client.account.password></x-client.account.password>
                                </div>
                            @endif 

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
	    .round-image {
		    width: 150px;
		    height: 150px;
		    border: 2px solid red;
		    border-radius: 50%;
		    display: flex;
		    margin-left: 27%;
	    }

	    .round-image img {
		    width: 100%;
		    height: 100%;
		    object-fit: cover;
	    }
	    #userImage {
		    width: 100%;
		    height: 100%;
		    object-fit: cover;
	    }
    </style>
@endsection



