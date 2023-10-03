@foreach($list as $item )
    <div class="card mt-3">
        <div class="row">
            <div class="col-md-4 ">
                <img src="{{asset("client/images/".$item['img'])}}" class="" alt="Hình ảnh" style="max-width: 100%; height: 100%" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title fw-bold my-1 shorten">{{$item['name']}}</h5>
                    <p class="card-title my-2 shorten">Nhà trệt lầu đường số 7 KDC ĐH Y Dược, An Khánh, Ninh Kiều, Cần Thơ</p>
                    <hr class="my-3">
                    <div class="d-md-flex justify-content-between">
                        <span class="price format-number text-warning fw-bold"><i class="bi bi-currency-dollar"></i>{{$item['price']}} VND</span>
                        <span class="acreage"><strong>Diện tích:</strong> 130m</span>
                    </div>
                    <p class="address my-3 shorten"><strong>Khu vực:</strong> {{$item['address']}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
