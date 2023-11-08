<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6 d-none d-md-block">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                <div class="lng_dropdown me-2">
                    <ul class="contact_detail text-center text-lg-start">
                        <li><i class="ti-mobile"></i><span><a href="tel:0949615859">094 961 5859</a></span></li>
                    </ul>
                </div>
                <div class="me-3">
                    <ul class="contact_detail text-center text-lg-start">
                        <li>
                            <i class="bi bi-geo-alt"></i><span>L2 - 17 Phan Thị Ràng, An Hòa, TP Rạch Giá, Kiên Giang</span>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center text-md-end">
                <ul class="header_list">
                    <li><a href="{{route('postAdd')}}" ><i class="ti-control-shuffle"></i><span>Đăng tin</span></a></li>
                    <li><a href="{{route('postNew')}}" ><i class="ti-heart"></i><span>Danh sách tin</span></a></li>
                    <li><a href="{{auth()->check() != '' ? route('account'):route('login')}}"><i class="ti-user"></i> {{auth()->check() != '' ? 'Tài khoản':'Đăng nhập'}}
                    </a>
                </li>
                    @if(auth()->check())
                    <li><a href="{{route('logout')}}"><span>Đăng xuất</span></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>


