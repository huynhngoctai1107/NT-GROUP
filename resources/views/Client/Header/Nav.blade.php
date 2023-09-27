<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        @include('client.header.headingtop')
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                    <img class="logo_light" src="{{asset('client/images/logo_light.png')}}" alt="logo"/>
                    <img class="logo_dark" src="{{asset('client/images/logo_dark.png')}}" alt="logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item" href="">Trang chủ</a></li>
                        <li><a class="nav-link nav_item" href="{{route('about')}}">Giới thiệu</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Tin tức</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="about.html">Tin tức công ty</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="contact.html">Tin thị trường</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="faq.html">Nhà đẹp</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="404.html">Phong thủy</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="login.html">Kiến thức</a></li>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="signup.html">Vật liệu xây dựng</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Nhà đất cần thơ</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="about.html">Bán đất</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="contact.html">Nhà bán</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="faq.html">Căn hộ bán</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="404.html">Văn phòng</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="login.html">Nhà trọ</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Nhà đất cho thuê</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="about.html">Đất</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="contact.html">Nhà</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="faq.html">Căn hộ</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="404.html">Văn phòng</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="login.html">Nhà trọ</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item" href="contact.html">Liên hệ</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <li>
                        <a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form>
                                <input type="text" placeholder="Search" class="form-control" id="search_input">
                                <button type="submit" class="search_icon"><i class="ion-ios-search-strong"></i></button>
                            </form>
                        </div>
                        <div class="search_overlay"></div>
                    </li>
                    <li class="dropdown cart_dropdown">
                        <a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown"><i class="linearicons-cart"></i><span class="cart_count">2</span></a>
                        <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{asset('client/images/cart_thamb1.jpg')}}" alt="cart_thumb1">Variable
                                        product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{asset('client/images/cart_thamb2.jpg')}}" alt="cart_thumb2">Ornare
                                        sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong>
                                    <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="#" class="btn btn-fill-line rounded-0 view-cart">View
                                        Cart</a><a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->
