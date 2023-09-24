
    @for ($i = 0; $i < 8; $i++)
        <div class="col-lg-3 col-md-4 col-6">
            <div class="product">
                <div class="product_img">
                    <a href="shop-product-detail.html">
                        <img src="{{$img}}" alt="không có ảnh">
                    </a>
                </div>
                <div class="product_info">
                    <div class="one m-3 d-flex flex-column">
                        <span class="card-title fw-bold my-1">{{$name}}</span>
                        <span class="card-title my-2">{{$address}}</span>
                        <hr class="my-3">
                        <div class="priceandacreage d-flex justify-content-between w-100">
                                        <span class="price text-warning fw-bold"><i class="bi bi-currency-dollar"></i> {{$price}}</span>
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
    @endfor

