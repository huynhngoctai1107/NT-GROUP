
<header class="header_wrap fixed-top header_with_topbar w-100">
    <div class="top-header">
        @include('client.header.headingtop')
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand  " href="{{route('index')}}">
                    <img class="logo_dark " style="width: 150px;" src="{{asset('images\logos\logo.png')}}" alt="logo"/>
                </a>
                <button class="navbar-toggler pt-2 pt-md-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li><a class="nav-link nav_item ps-3 ps-md-2" href="{{route('index')}}">Trang chủ</a></li>
                        <li><a class="nav-link nav_item ps-3 ps-md-2" href="{{route('about')}}">Giới thiệu</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link ps-3 ps-md-2" href="{{route('listBlog')}}" data-bs-toggle="dropdown">Tin tức</a>
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
                            <a class="dropdown-toggle nav-link ps-3 ps-md-2" href="{{route('listBlog')}}" data-bs-toggle="dropdown">Loại Bất Động Sản</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li><a class="dropdown-item nav-link nav_item" href="{{route('listPost')}}">Tất Cả Tin</a></li>
                                    @foreach($dataToCategory as $category)
                                        <li><a class="dropdown-item nav-link nav_item" href="{{route('search',$category->slug)}}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link ps-3 ps-md-2" href="{{route('listBlog')}}" data-bs-toggle="dropdown">Nhu Cầu Bất Động Sản</a>
                            <div class="dropdown-menu">
                                <ul>
                                    @foreach($dataToDemand as $demand)
                                        <li><a class="dropdown-item nav-link nav_item" href="{{route('search1',$demand->slug)}}">{{$demand->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a class="nav-link nav_item  ps-3 ps-md-2" href="{{route('contact')}}">Liên hệ</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center pt-2 pt-md-0">
                    <li>
                        <a href="javascript:void(0);" class="nav-link search_trigger"><i class="linearicons-magnifier"></i></a>
                        <div class="search_wrap">
                            <span class="close-search"><i class="ion-ios-close-empty"></i></span>
                            <form action="{{ route('SearchPost') }}" method="post">
                                @csrf
                                <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="form-control ps-2" id="search_input" name="keyword">
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
