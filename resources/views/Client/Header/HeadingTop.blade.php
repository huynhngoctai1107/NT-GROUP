<div class="container">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                <div class="lng_dropdown me-2">
                    <select name="countries" class="custome_select">
                        <option value='en' data-image="{{asset('client/images/eng.png')}}" data-title="English">
                            English
                        </option>
                        <option value='fn' data-image="{{asset('client/images/fn.png')}}" data-title="France">France
                        </option>
                        <option value='us' data-image="{{asset('client/images/us.png')}}" data-title="United States">
                            United States
                        </option>
                    </select>
                </div>
                <div class="me-3">
                    <select name="countries" class="custome_select">
                        <option value='USD' data-title="USD">USD</option>
                        <option value='EUR' data-title="EUR">EUR</option>
                        <option value='GBR' data-title="GBR">GBR</option>
                    </select>
                </div>
                <ul class="contact_detail text-center text-lg-start">
                    <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                </ul>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center text-md-end">
                <ul class="header_list">
                    <li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li>
                    <li><a href="{{route('history')}}"><i class="ti-heart"></i><span>Danh sách tin</span></a></li>
                    <li><a href="{{route('login')}}"><i class="ti-user"></i><span>Đăng nhập</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>