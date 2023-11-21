<x-client.pages.subscribe></x-client.pages.subscribe>

<footer class="footer_dark">
    <div class="footer_top">
        <div class="container">
            <div class="container-fluid mt-4">
                <div class="row mb-5 ms-md-4">

                    <div class="col-md-4 col-sm-9 col-xs-4" >
                        <div class="footer-text ">
                            <div class="footer_logo">
                                <a href="{{ route('index') }}"><img src="{{asset('client/images/logo.png')}}" width="47%"  alt="Logo" class="ms-5"></a>
                                <p>Mang lại giá trị cốt lỗi trong cuộc sống</p>
                                <div class="widget">
                                    <ul class="widget_links">
                                        <li class="bi bi-envelope"><a href="htai67934@mail.com "> htai67934@mail.com </a></li>
                                        <li class="bi bi-telephone"><a href="0949 615 859 "> 0949 615 859 </a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-4 col-xs-4">
                        <div class="widget">
                            <h6 class="widget_title">Dịch vụ</h6>
                            <ul class="widget_links">
                                <li><a href="#">Cho thuê nhà</a></li>
                                <li><a href="#">Cho thuê đất</a></li>
                                <li><a href="#">Mua bán bất động sản</a></li>
                                <li><a href="#">Tư vấn bất động sản</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-4">
                        <div class="widget">
                            <h6 class="widget_title">Hỗ trợ</h6>
                            <ul class="widget_links">
                                <li><a href="{{ route('policy') }}">Chính sách bảo mật</a></li>
                                <li><a href="{{ route('terms') }}">Điều khoản thoả thuận</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-4" >
                        <div class="widget">
                            <h6 class="widget_title">Công Ty</h6>
                            <ul class="widget_links">
                                <li><a href="#">Giới thiệu</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Partners</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-4">
                        <div class="widget">
                            <h6 class="widget_title">Liên kết</h6>
                            <ul class="widget_links">
                                <li><a href="#">Facebook</a></li>
                                <li><a href="#">Instagram</a></li>
                                <li><a href="#">Telegram</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-start">© Design with love © NT - GROUP 2023. All right reserved</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-lg-end">
                        <li><a href="#"><img src="{{asset('client/images/visa.png')}}" alt="visa"></a></li>
                        <li><a href="#"><img src="{{asset('client/images/paypal.png')}}" alt="paypal"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
