@extends('Client.Layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BANNER -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-8">
                <div class="img">
                    <div class="row">
                        <div class="bds col-md-7 d-flex justify-content-center">
                            <div class="content m-lg-5">
                                <h2 class="mt-5 fw-bold">BẤT ĐỘNG SẢN GIÁ RẺ CHẤT LƯỢNG CAO</h2>
                                <p class="mt-4">Kênh mua bán bất động sản ưu tín hàng đầu Kiên Giang.</p>
                                <button class="btn btn-warning p-3 px-xl-5 mt-4">Xem ngay</button>
                            </div>
                        </div>
                        <div class="col-md-5 ">
                            <div class="hexagon mt-4">
                                <div class="hexagon-inner mt-5">
                                    <img src="./assets/images/anh1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="row mb-5">
                    <div class="col-md-12 bg-light">
                        <div class="d-flex justify-content-between">
                            <button class="btn" id="banDatBtn">Nhà bán đất</button>
                            <button class="btn" id="choThueBtn">Nhà đất cho thuê</button>
                        </div>
                        <div class="mt-3" id="searchForm">
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="keyword" name="keyword"/>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Loai BĐS</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Tỉnh / Thành Phố</option>
                                        <option value="camau">Cà Mau</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Huyện / Quận</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Xã / Phường</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Giá</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Diện tích</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center">

                                    <button type="submit" class="btn btn-warning mb-4">
                                        <i class="bi bi-search"></i>
                                        Tìm kiếm
                                    </button>
                                </div>

                            </form>
                        </div>
                        <div class="mt-3" id="searchForm2" style="display: none">
                            <form>
                                <div class="mb-3">
                                    <input type="text" class="form-control" id="keyword" name="keyword"/>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Loai BĐS</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Tỉnh / Thành Phố</option>
                                        <option value="camau">Cà Mau</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Huyện / Quận</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Xã / Phường</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Giá</option>
                                        <option value="nha">Nhà</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" id="propertyType" name="propertyType">
                                        <option value="">Diện tích</option>
                                        <option value="dat">Đất</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center">

                                    <button type="submit" class="btn btn-warning mb-4">
                                        <i class="bi bi-search"></i>
                                        Tìm thuê
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->

    <!-- END MAIN CONTENT -->
    <div class="main_content">

        <!-- START SECTION BANNER -->

        <!-- END SECTION BANNER -->

        <!-- START SECTION SHOP -->
        <div class="section small_pt pb_70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="heading_s1 text-center">
                            <h2>TIN TỨC</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-style1">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="arrival-tab" data-bs-toggle="tab" href="#arrival"
                                       role="tab" aria-controls="arrival" aria-selected="true">Tin VIP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="sellers-tab" data-bs-toggle="tab" href="#sellers"
                                       role="tab" aria-controls="sellers" aria-selected="false">Tin HOT</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="arrival" role="tabpanel"
                                 aria-labelledby="arrival-tab">
                                <div class="row shop_container">
                                    @php
                                        $name = 'abc';
                                        $img = 'client/images/product_img1.jpg';
                                        $address = '170 hqv';
                                        $price = '200';
                                    @endphp
                                    <x-clients.index.post :name="$name" :img="$img" :address="$address"
                                                          :price="$price">

                                    </x-clients.index.post>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                                <div class="row shop_container">
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img9.jpg" alt="product_img9">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">T-Shirt
                                                        Form
                                                        Girls</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%"></div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#B5B6BB"></span>
                                                        <span data-color="#333333"></span>
                                                        <span data-color="#DA323F"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <span class="pr_flash bg-danger">Hot</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img6.jpg" alt="product_img6">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Blue casual
                                                        check shirt</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$55.00</span>
                                                    <del>$95.00</del>
                                                    <div class="on_sale">
                                                        <span>25% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%"></div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#87554B"></span>
                                                        <span data-color="#333333"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img11.jpg" alt="product_img11">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Black dress
                                                        for woman</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$68.00</span>
                                                    <del>$99.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%"></div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#090909"></span>
                                                        <span data-color="#AC644D"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <span class="pr_flash bg-success">Sale</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img7.jpg" alt="product_img7">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">white black
                                                        line dress</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$68.00</span>
                                                    <del>$99.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:87%"></div>
                                                    </div>
                                                    <span class="rating_num">(25)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#333333"></span>
                                                        <span data-color="#7C502F"></span>
                                                        <span data-color="#2F366C"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img8.jpg" alt="product_img8">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Men blue
                                                        jins
                                                        Shirt</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$69.00</span>
                                                    <del>$89.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:70%"></div>
                                                    </div>
                                                    <span class="rating_num">(22)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#333333"></span>
                                                        <span data-color="#444653"></span>
                                                        <span data-color="#B9C2DF"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img5.jpg" alt="product_img5">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">blue dress
                                                        for woman</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$45.00</span>
                                                    <del>$55.25</del>
                                                    <div class="on_sale">
                                                        <span>35% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:80%"></div>
                                                    </div>
                                                    <span class="rating_num">(21)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#87554B"></span>
                                                        <span data-color="#333333"></span>
                                                        <span data-color="#5FB7D4"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img12.jpg" alt="product_img12">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <span class="pr_flash">New</span>
                                                <h6 class="product_title"><a href="shop-product-detail.html">Black
                                                        T-shirt
                                                        for woman</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$69.00</span>
                                                    <del>$89.00</del>
                                                    <div class="on_sale">
                                                        <span>20% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:70%"></div>
                                                    </div>
                                                    <span class="rating_num">(22)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#1B1B25"></span>
                                                        <span data-color="#444653"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-6">
                                        <div class="product">
                                            <span class="pr_flash bg-danger">Hot</span>
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="assets/images/product_img10.jpg" alt="product_img10">
                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li class="add-to-cart"><a href="#"><i
                                                                    class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        <li><a href="shop-compare.html" class="popup-ajax"><i
                                                                    class="icon-shuffle"></i></a></li>
                                                        <li><a href="shop-quick-view.html" class="popup-ajax"><i
                                                                    class="icon-magnifier-add"></i></a></li>
                                                        <li><a href="#"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="shop-product-detail.html">Red & Black
                                                        check shirt</a></h6>
                                                <div class="product_price">
                                                    <span class="price">$55.00</span>
                                                    <del>$95.00</del>
                                                    <div class="on_sale">
                                                        <span>25% Off</span>
                                                    </div>
                                                </div>
                                                <div class="rating_wrap">
                                                    <div class="rating">
                                                        <div class="product_rate" style="width:68%"></div>
                                                    </div>
                                                    <span class="rating_num">(15)</span>
                                                </div>
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                                <div class="pr_switch_wrap">
                                                    <div class="product_color_switch">
                                                        <span class="active" data-color="#E8ADA9"></span>
                                                        <span data-color="#C38F77"></span>
                                                        <span data-color="#BE7154"></span>
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
            </div>
        </div>
        <!-- END SECTION SHOP -->

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container mb-5">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="verticalLine">
                                    <h3 class="ms-lg-3">TIN RAO BÁN</h3>
                                </div>

                            </div>
                            <div class="row">
                                <div class="box">
                                    <x-clients.index.postSale :name="$name" :img="$img" :address="$address"
                                                              :price="$price">

                                    </x-clients.index.postSale>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-1">
                        <div class="contactInfor mt-5 text-center">
                            <h4>LIÊN HỆ ĐĂNG TIN</h4>
                            <p>+8412345678</p>
                        </div>
                        <div class="admin border">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="./assets/images/anh2.png" alt="Hình ảnh"
                                         class="img-fluid rounded-circle-custom m-3">
                                </div>
                                <div class="col-md-6 d-flex justify-content-center align-items-center">
                                    <div class="infor">
                                        <h5>PHÒNG KD</h5>
                                        <div class="phone border-warning text-warning p-2 rounded bg-light">
                                            <i class="bi bi-telephone-fill"></i>
                                            <span>Gọi ngay</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->


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
                                <input type="text" required="" class="form-control rounded-0"
                                       placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                        value="Submit">Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- START SECTION SUBSCRIBE NEWSLETTER -->

    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
    <style>
        .verticalLine {
            border-left: thick solid #ff0000;
        }

        .img {
            background-color: #ddd2f0;
        }

        .bds {
            height: 550px !important;
        }

        .hexagon {
            width: 280px;
            /* Độ rộng của hình lục giác */
            height: 280px;
            /* Độ cao của hình lục giác */
            background-color: #007bff;
            /* Màu nền của hình lục giác */
            position: relative;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        }

        .hexagon-inner {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .rounded-circle-custom {
            border-radius: 50%;
            width: 100px;
            /* Điều chỉnh kích thước ảnh theo ý muốn */
            height: 100px;
            /* Điều chỉnh kích thước ảnh theo ý muốn */
            object-fit: cover;
            /* Cách hình ảnh sẽ được hiển thị */
        }
    </style>
@endpush
