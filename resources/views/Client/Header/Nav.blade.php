<!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<header class="header_wrap fixed-top header_with_topbar w-100">
    <div class="top-header">
        @include('client.header.headingtop')
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{route('index')}}">
                    <img class="logo_light" style="width: 170px; height: 120px" src="{{asset('client/images/logont.jpg')}}" alt="logo"/>
                    <img class="logo_dark" style="width: 170px; height: 120px" src="{{asset('client/images/logont2.jpg')}}" alt="logo"/>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item" href="">Trang chủ</a></li>
                        <li><a class="nav-link nav_item" href="{{route('about')}}">Giới thiệu</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="{{route('listBlog')}}" data-bs-toggle="dropdown">Tin tức</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="{{route('about')}}">Tin tức công ty</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Tin thị trường</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Nhà đẹp</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Phong thủy</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Kiến thức</a></li>
                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Vật liệu xây dựng</a>
                                    </li>

                                </ul>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="{{route('listBlog')}}" data-bs-toggle="dropdown">Nhà đất cần thơ</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Bán đất</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Nhà bán</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Căn hộ bán</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Văn phòng</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Nhà trọ</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="{{route('listBlog')}}" data-bs-toggle="dropdown">Nhà đất cho thuê</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Đất</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Nhà</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Căn hộ</a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Văn phòng</a>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listBlog')}}">Nhà trọ</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item" href="{{route('contact')}}">Liên hệ</a></li>
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


                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->
