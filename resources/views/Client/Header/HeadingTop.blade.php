<div class="container" >
    <div class="row align-items-center">
        <div class="col-md-6 d-none d-md-block">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                <div class="lng_dropdown me-2">
                    <ul class="contact_detail text-center text-lg-start">
                        <li> <i class="ti-mobile"></i>  <a href="tel:0949615859">094 961 5859</a> </li>
                    </ul>
                </div>
                <div class="me-3">
                    <ul class="contact_detail text-center text-lg-start">
                        <li>
                            <i class="bi bi-geo-alt"></i> An Hòa, TP Rạch Giá, Kiên Giang
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-6 ps-4 ps-md-0">
            <div class="text-center text-md-end">
                <ul class="header_list justify-content-center  ">
                    <li><a href="{{route('postAdd')}}"><i class="ti-control-shuffle"></i><span>Đăng tin</span></a></li>
                    <li class="ps-3 ps-md-0">
                        <a href="{{route('postNew')}}"><i class="ti-heart"></i><span>Danh sách tin</span></a></li>
                    <li class="dropdown mt-0">
                        <a class="dropdown-toggle nav-link ps-3 ps-md-2" href="{{route('listBlog')}}" data-bs-toggle="dropdown">
                            <i class="ti-user"> </i> Tài khoản </a>
                        <div class="dropdown-menu " style="border: none; background-color: whitesmoke ">
                            <ul style="list-style: none; ">
                                @if(auth()->check())
                                <li>
                                    <a class="dropdown-item nav-link nav_item" href="{{auth()->check() != '' ? route('account'):route('login')}}">Thông tin</a>
                                </li>

                                <li>
                                    <a class="dropdown-item nav-link nav_item" href="{{route('Profile',auth()->user()->slug)}}">Người theo dõi</a>
                                </li>
                                @endif
                                <li>
                                    <a class="dropdown-item nav-link nav_item" href="{{ auth()->check() == TRUE ? route('logout') : route('login')}}">{{ auth()->check() == TRUE ? "Đăng xuất" : "Đăng nhập"}} </a></li>

                            </ul>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </div>
</div>


