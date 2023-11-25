<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 d-none d-md-block">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                <div class="lng_dropdown me-2">
                    <ul class="contact_detail text-center text-lg-start">
                        <li><i class="ti-mobile" style="font-size: 17px" ></i> <a href="tel:0949615859">094 961 5859</a></li>
                    </ul>
                </div>
                <div class="me-3">
                    <ul class="contact_detail text-center text-lg-start">
                        <li>
                            <i class="bi bi-geo-alt" style="font-size: 15px" ></i> An Hòa, TP Rạch Giá, Kiên Giang
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-6 ps-4 ps-md-0">
            <div class="text-center text-md-end">
                <ul class="header_list justify-content-center  ">
                    <li><a href="{{route('postAdd')}}"><i class="ti-control-shuffle"  style="font-size: 15px" ></i><span>Đăng tin</span></a></li>
                    <li class="ps-3 ps-md-0">
                        <a href="{{route('postNew')}}"><i class="ti-heart" style="font-size: 15px"  ></i><span>Danh sách tin</span></a></li>
                    @if(auth()->check())
                        <li class="dropdown mt-0">
                            <a class="dropdown-toggle nav-link ps-3 ps-md-2" href="{{route('listBlog')}}" data-bs-toggle="dropdown">
                                <i class="ti-user" style="font-size: 15px" > </i> Tài khoản </a>
                            <div class="dropdown-menu " style="border: none; background-color: whitesmoke ">
                                <ul style="list-style: none; ">

                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="{{route('account')}}">Thông tin</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="{{route('Profile',auth()->user()->slug)}}">Người theo dõi</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item nav-link nav_item" href="{{route('logout')}}">Đăng xuất </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @else
                        <li>
                            <a class="dropdown-item nav-link nav_item" href="{{route('login')}}"><i class="bi bi-door-open" style="font-size: 17px"></i> Đăng nhập </a>
                        </li>
                    @endif


                </ul>
            </div>
        </div>
    </div>
</div>
