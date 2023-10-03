@foreach($list as $item)
    <div class="col-lg-3 col-md-4 col-6">
        <div class="product">
            <div class="product_img">
                <a href="shop-product-detail.html">
                    <img style="width: 100%; height: 200px" src="{{asset("client/images/".$item['img'])}}" alt="không có ảnh">
                </a>
            </div>
            <div class="product_info">
                <div class="one d-flex flex-column">
                    <span class="card-title fw-bold my-1 text-uppercase text-primary shorten ">{{$item['name']}}</span>
                    <span class="card-title my-2 small shorten" >{{$item['address']}}</span>
                    <hr class="my-3">
                    <div class="priceandacreage d-flex justify-content-between w-100">
                        <span class="price format-number text-warning fw-bold"><i class="bi bi-currency-dollar"></i>{{$item['price']}} VND</span>
                        <span class="acreage text-warning fw-bold"><i class="bi bi-arrows-fullscreen"></i>
                                            230m</span>
                    </div>
                    <hr class="my-3">
                    <div class="homeandphone d-flex justify-content-between w-100">
                        <span class="home fw-bold"><i class="bi bi-house-fill"></i> Phòng KD</span>
                        <span class="phone text-warning fw-bold"><i class="bi bi-telephone-fill"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
