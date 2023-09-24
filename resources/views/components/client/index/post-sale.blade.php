<div class="card mt-3">
    <div class="d-flex">
        <img src="{{$img}}" class="m-3" alt="Hình ảnh"
             style="width: 200px; height: 200px" />
        <div class="one m-3 d-flex flex-column w-100">
            <span class="card-title fw-bold my-1">{{$name}}</span>
            <span class="card-title my-2">Nhà trệt lầu đường số 7 KDC ĐH Y Dược</span>
            <hr class="my-3">
            <div class="priceandacreage d-flex justify-content-between w-100">
                <span class="price"><strong>Giá:</strong> {{$price}}</span>
                <span class="acreage"><strong>Diện tích:</strong> 130m</span>
            </div>
            <p class="address my-3"><strong>Khu vực:</strong> {{$address}}</p>
        </div>
    </div>
</div>
