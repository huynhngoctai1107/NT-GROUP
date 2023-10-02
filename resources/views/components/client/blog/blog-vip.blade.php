@foreach($list as $item)
    <div class="card mt-3">
        <img src="{{asset("client/images/".$item['img'])}}" class="mx-auto" alt="Hình ảnh" style="width: 98%; height: 100%">
        <div class="card-body">
            <h5 class="card-title fw-bold shorten mb-2">{{$item['name']}}</h5>
            <p class="card-text shorten mb-2">{{$item['address']}}</p>
            <p class="card-text price mb-2"><strong>Giá:</strong> {{$item['price']}} VND</p>
            <p class="card-text acreage mb-2"><strong>Liên hệ:</strong> {{$item['phone']}}</p>
        </div>
    </div>
@endforeach