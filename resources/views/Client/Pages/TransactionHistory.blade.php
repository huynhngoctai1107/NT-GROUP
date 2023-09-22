@extends('client.playout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection

@section('main')

    <div class="main_content">
        <!-- START SECTION BREADCRUMB -->
        <div class="breadcrumb_section bg_gray page-title-mini">
            <div class="container"><!-- STRART CONTAINER -->
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="page-title">
                            <h1>Tin đã đăng</h1>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb justify-content-md-end">
                            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="#">Trang</a></li>
                            <li class="breadcrumb-item active">Tin đã đăng</li>
                        </ol>
                    </div>
                </div>
            </div><!-- END CONTAINER-->
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-12 mb-0">
                                <div class="product_header">
                                    <div class="product_header_left">
                                        <div class="custom_select">
                                            <select class="form-control form-control-sm">
                                                <option value="order">Tất cả</option>
                                                <option value="popularity">Tin đăng</option>
                                                <option value="date">Tin mua VIP</option>
                                                <option value="price">Tin đã xóa</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="product_header_right">
                                        <div class="products_view">
                                            <a href="javascript:Void(0);" class="shorting_icon grid"><i class="ti-view-grid"></i></a>
                                            <a href="javascript:Void(0);" class="shorting_icon list active"><i class="ti-layout-list-thumb"></i></a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive shop_cart_table mt-2">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="product-thumbnail">&nbsp;Ảnh</th>
                                        <th class="product-name">Tiêu đề</th>
                                        <th class="product-price">Nhu cầu</th>
                                        <th class="product-quantity">Lượt xem</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="" alt="product1"></a></td>
                                        <td class="product-name" data-title="Tiêu đề">
                                            <a href="#">Bán nền đất</a><br>
                                            <button class="btn btn-warning text-white" style="font-size: 15px;" type="submit">Mua bán đất</button>
                                            <button class="btn btn-fill-out" style="font-size: 15px;" type="submit">Chờ duyệt</button>
                                            <p class="mb-0 text-success">Ngày đăng 17-7-2023</p>
                                        </td>
                                        <td class="product-price" data-title="Dịch vụ">
                                            <button class="btn btn-info text-white" style="font-size: 15px;" type="submit">Mua Vip tin</button>
                                            <button class="btn btn-info text-white" style="font-size: 15px;" type="submit">Làm mới tin</button>
                                        </td>
                                        <td class="product-quantity" data-title="Lượt xem">3</td>
                                        <td class="product-remove">
                                            <div class="row align-items-center mb-0">
                                                <div class="col-12">
                                                    <div class="custom_select">
                                                        <select class="form-control form-control-sm">
                                                            <option value="8">Sửa</option>
                                                            <option value="9">Tên</option>
                                                            <option value="12">Giá</option>
                                                            <option value="18">Hình ảnh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail"><a href="#"><img src="" alt="product1"></a></td>
                                        <td class="product-name" data-title="Tiêu đề">
                                            <a href="#">Bán nền đất</a><br>
                                            <button class="btn btn-warning text-white" style="font-size: 15px;" type="submit">Mua bán đất</button>
                                            <button class="btn btn-fill-out" style="font-size: 15px;" type="submit">Chờ duyệt</button>
                                            <p class="mb-0 text-success">Ngày đăng 17-7-2023</p>
                                        </td>
                                        <td class="product-price" data-title="Dịch vụ">
                                            <button class="btn btn-info text-white" style="font-size: 15px;" type="submit">Mua Vip tin</button>
                                            <button class="btn btn-info text-white" style="font-size: 15px;" type="submit">Làm mới tin</button>
                                        </td>
                                        <td class="product-quantity" data-title="Lượt xem">3</td>
                                        <td class="product-remove">
                                            <div class="row align-items-center mb-0">
                                                <div class="col-12">
                                                    <div class="custom_select">
                                                        <select class="form-control form-control-sm">
                                                            <option value="8">Sửa</option>
                                                            <option value="9">Tên</option>
                                                            <option value="12">Giá</option>
                                                            <option value="18">Hình ảnh</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END SECTION SHOP -->

        <!-- START SECTION SUBSCRIBE NEWSLETTER -->
        <div class="section bg_default mb-0 small_pt small_pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="heading_s1 mb-0 heading_light">
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
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
@endsection

<!-- START MAIN CONTENT -->
