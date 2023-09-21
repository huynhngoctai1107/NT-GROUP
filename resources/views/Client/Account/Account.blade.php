@extends('Client.Layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>My Account</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active">My Account</li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>
    <!-- END SECTION BREADCRUMB -->

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard"
                                   role="tab" aria-controls="dashboard" aria-selected="false"><i
                                        class="ti-layout-grid2"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab"
                                   aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab"
                                   aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>My
                                    Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail"
                                   role="tab" aria-controls="account-detail" aria-selected="true"><i
                                        class="ti-id-badge"></i>Account details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.html"><i class="ti-lock"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                             aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Dashboard</h3>
                                </div>
                                <div class="card-body">
                                    <p>From your account dashboard. you can easily check &amp; view your <a
                                            href="javascript:void(0);" onclick="$('#orders-tab').trigger('click')">recent
                                            orders</a>, manage your <a href="javascript:void(0);"
                                                                       onclick="$('#address-tab').trigger('click')">shipping
                                            and billing addresses</a> and <a href="javascript:void(0);"
                                                                             onclick="$('#account-detail-tab').trigger('click')">edit
                                            your password and account details.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Orders</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>#1234</td>
                                                <td>March 15, 2020</td>
                                                <td>Processing</td>
                                                <td>$78.00 for 1 item</td>
                                                <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>#2366</td>
                                                <td>June 20, 2020</td>
                                                <td>Completed</td>
                                                <td>$81.00 for 1 item</td>
                                                <td><a href="#" class="btn btn-fill-out btn-sm">View</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3>Billing Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212
                                            </address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Shipping Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212
                                            </address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel"
                             aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông Tin Tài Khoản</h3>
                                </div>
                                <div class="card-body">
                                    <div class="p-2 mb-2 bg-dark">
                                        <h6 style="color: white">Cập nhật thay đổi Thông Tin Tài Khoản </h6>
                                    </div>
                                    <section class="ftco-section">


                                        <div class="">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link secondary" id="pills-home-tab"
                                                            data-bs-toggle="pill"
                                                            data-bs-target="#pills-home" type="button" role="tab"
                                                            aria-controls="pills-home"
                                                            aria-selected="true">Cập Nhật Thông Tin Tài Khoản
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                            data-bs-toggle="pill"
                                                            data-bs-target="#pills-profile" type="button" role="tab"
                                                            aria-controls="pills-profile"
                                                            aria-selected="false">Đổi Mật Khẩu
                                                    </button>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                     aria-labelledby="pills-home-tab"
                                                     tabindex="0">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-12">
                                                            <div class="wrapper">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-7">
                                                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                                                            <form method="POST" id="contactForm"
                                                                                  name="contactForm"
                                                                                  class="contactForm">
                                                                                <div class="row">
                                                                                    <div class="mb-3">
                                                                                        <div class="form-group">
                                                                                            <label class="label"
                                                                                                   for="name">Họ và
                                                                                                Tên</label>
                                                                                            <input type="text"
                                                                                                   class="form-control"
                                                                                                   name="name"
                                                                                                   id="name"
                                                                                                   placeholder="Name">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <div class="form-group">
                                                                                            <label class="label"
                                                                                                   for="email">Địa chỉ
                                                                                                Email</label>
                                                                                            <input type="email"
                                                                                                   class="form-control"
                                                                                                   name="email"
                                                                                                   id="email"
                                                                                                   placeholder="Email">
                                                                                        </div>
                                                                                    </div>
                                                                                    <br/>
                                                                                    <div class="mb-3">
                                                                                        <label for="gender"
                                                                                               class="label">Giới
                                                                                            tính</label>
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                   class="form-check-input"
                                                                                                   name="gender"
                                                                                                   id="male"
                                                                                                   value="Nam">
                                                                                            <label class="label"
                                                                                                   for="male">Nam</label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input type="radio"
                                                                                                   class="form-check-input"
                                                                                                   name="gender"
                                                                                                   id="female"
                                                                                                   value="Nữ">
                                                                                            <label class="label"
                                                                                                   for="female">Nữ</label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <div class="form-group">
                                                                                            <label for="phone-number"
                                                                                                   class="label">Số điện
                                                                                                thoại</label>
                                                                                            <input type="tel"
                                                                                                   class="form-control"
                                                                                                   id="phone-number"
                                                                                                   placeholder="Nhập số điện thoại của bạn">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="street-address"
                                                                                               class="label">Địa
                                                                                            chỉ</label>
                                                                                        <input type="text"
                                                                                               class="form-control"
                                                                                               id="street-address"
                                                                                               placeholder="Nhập địa chỉ của bạn">
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="col-md-12">
                                                                                            <button type="button"
                                                                                                    class="btn btn-warning"
                                                                                                    style="color: white">
                                                                                                Primary
                                                                                            </button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 d-flex align-items-stretch">
                                                                        <div class="info-wrap w-100 p-5 img" width="50%"
                                                                             height="auto">
                                                                            <img
                                                                                src="{{asset('client/images/hinh-1.jpg')}}"
                                                                                alt="shop_banner_img1"/>
                                                                            <div class="form-row">
                                                                                <form action="/submit" method="post">
                                                                                    <div class="file-upload">
                                                                                        <div class="file-select">
                                                                                            <div
                                                                                                class="file-select-button"
                                                                                                id="fileName">Choose
                                                                                                File
                                                                                            </div>
                                                                                            <div
                                                                                                class="file-select-name"
                                                                                                id="noFile">No file
                                                                                                chosen...
                                                                                            </div>
                                                                                            <input type="file"
                                                                                                   name="chooseFile"
                                                                                                   id="chooseFile">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                     aria-labelledby="pills-profile-tab"
                                                     tabindex="0">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-12">
                                                            <div class="wrapper">
                                                                <div class="row no-gutters">
                                                                    <div class="col-md-7">
                                                                        <div class="contact-wrap w-100 p-md-5 p-4">
                                                                            <form method="POST" id="contactForm"
                                                                                  name="contactForm"
                                                                                  class="contactForm">
                                                                                <div class="row">
                                                                                    <div class="mb-3">
                                                                                        <label for="old-password"
                                                                                               class="form-label">Nhập
                                                                                            Mật khẩu
                                                                                            cũ</label>
                                                                                        <input type="password"
                                                                                               class="form-control"
                                                                                               id="old-password"
                                                                                               placeholder="Nhập mật khẩu cũ của bạn">
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <label for="new-password"
                                                                                               class="form-label">Nhập
                                                                                            Mật khẩu
                                                                                            mới</label>
                                                                                        <input type="password"
                                                                                               class="form-control"
                                                                                               id="new-password"
                                                                                               placeholder="Nhập mật khẩu mới của bạn">
                                                                                    </div>

                                                                                    <div class="mb-3">
                                                                                        <label for="confirm-password"
                                                                                               class="form-label">Xác
                                                                                            nhận mật
                                                                                            khẩu mới</label>
                                                                                        <input type="password"
                                                                                               class="form-control"
                                                                                               id="confirm-password"
                                                                                               placeholder="Nhập lại mật khẩu mới của bạn">
                                                                                    </div>

                                                                                    <div class="col-md-12">
                                                                                        <button type="button"
                                                                                                class="btn btn-warning"
                                                                                                style="color: white">
                                                                                            Primary
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-5 d-flex align-items-stretch">
                                                                        <div class="info-wrap w-100 p-5 img" width="10%"
                                                                             height="auto">
                                                                            <img
                                                                                src="{{asset('client/images/hinh-1.jpg')}}"
                                                                                alt="shop_banner_img1"/>
                                                                            <div class="form-row">
                                                                                <form action="/submit" method="post">
                                                                                    <div class="file-upload">
                                                                                        <div class="file-select">
                                                                                            <div
                                                                                                class="file-select-button"
                                                                                                id="fileName">Choose
                                                                                                File
                                                                                            </div>
                                                                                            <div
                                                                                                class="file-select-name"
                                                                                                id="noFile">No file
                                                                                                chosen...
                                                                                            </div>
                                                                                            <input type="file"
                                                                                                   name="chooseFile"
                                                                                                   id="chooseFile">
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
