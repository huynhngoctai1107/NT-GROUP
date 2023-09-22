@extends('client.playout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection

@section('main')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini  m-0">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Lịch sử giao dịch</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="#">Trang</a></li>
                    <li class="breadcrumb-item active">Lịch sử giao dịch</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="product-thumbnail">#</th>
                                <th class="product-name text-center">Loại</th>
                                <th class="product-price">Số tiền</th>
                                <th class="product-quantity">Số dư</th>
                                <th class="product-subtotal">Nội dung</th>
                                <th class="product-remove">Thời gian</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="product-thumbnail">1</td>
                                <td class="product-price" data-title="Loại">Mua hàng</td>
                                <td class="product-price" data-title="Số tiền"><p class="text-danger mt-4">-100.000đ</p></td>
                                <td class="product-subtotal" data-title="Số dư">2.000đ</td>
                                <td class="product-quantity" data-title="Nội dung">Mua bài đăng Vip/thường</td>
                                <td class="product-remove" data-title="Thời gian">Ngày 17/7/2023</td>
                            </tr>
                            <tr>
                                <td class="product-thumbnail">2</td>
                                <td class="product-price" data-title="Loại">Mua hàng</td>
                                <td class="product-price" data-title="Số tiền"><p class="text-success mt-4">-100.000đ</p></td>
                                <td class="product-subtotal" data-title="Số dư">2.000đ</td>
                                <td class="product-quantity" data-title="Nội dung">Mua bài đăng Vip/thường</td>
                                <td class="product-remove" data-title="Thời gian">Ngày 17/7/2023</td>
                            </tr>


                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- START SECTION SUBSCRIBE NEWSLETTER -->
    <div class="section bg_default small_pt small_pb">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="heading_s1 mb-md-0 heading_light">
                        <h3>Subscribe Our Newsletter</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="newsletter_form">
                        <form>
                            <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                            <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
