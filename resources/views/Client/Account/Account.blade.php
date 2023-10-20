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
                <div class="col-md-12 col-xl-4  mb-5">


                        <div class="card-body text-center">
                            <div class="mt-3 mb-4">
                                <img src="{{auth()->user()->image ??'https://inkythuatso.com/uploads/thumbnails/800/2022/05/hinh-anh-meo-bua-buon-cuoi-nhat-12-09-57-09.jpg'}}" class="rounded-circle img-fluid" style="width: 100px;"/>
                            </div>
                            <h4 class="mb-2">{{auth()->user()->fullname}}</h4>


                    </div>
                </div>

            </div>
          
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Thống Kê</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Lịch Sử Giao dịch</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true"><i class="ti-location-pin"></i>Cập nhật tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Cập nhật mật khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('logout')}}"><i class="ti-lock"></i>Đăng xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thống Kê</h3>
                                </div>
                                <div class="card-body">
                                    <p>From your account dashboard. you can easily check &amp; view your
                                        <a href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent
                                            orders</a>, manage your
                                        <a href="javascript:void(0);" onclick="$('#address-tab').trigger('click')">shipping
                                            and billing addresses</a> and
                                        <a href="javascript:void(0);" onclick="$('#account-detail-tab').trigger('click')">edit
                                            your password and account details.</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Lịch Sử Giao dịch</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th class="product-thumbnail">#</th>
                                                <th class="product-remove text-center">Loại</th>
                                                <th class="product-price">Email</th>
                                                <th class="product-price">Điện thoại</th>
                                                <th class="product-remove">Số tiền</th>
                                                <th class="product-quantity">Số dư</th>
                                                <th class="product-subtotal">Nội dung</th>
                                                <th class="product-remove">Ngày giao dịch</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <x-client.pages.history></x-client.pages.history>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                            <x-client.account.account></x-client.account.account>
                        </div>

                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <x-client.account.password></x-client.account.password>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
