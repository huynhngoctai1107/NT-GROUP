@foreach($list as $item)
    <div class="col-lg-3 col-md-4 col-6 px-3">
        <div class="product">
            @php
                // Tách chuỗi thành mảng
                $images = $item->images;
                $imageArray = explode(',', $images);

                // Lấy tên file ảnh đầu tiên
                $firstImage = reset($imageArray);
            @endphp
            <div>
                <a href="{{ route('postSingle',$item->slug_posts) }}">
                    <img style="width: 100%; height: 200px" src="{{ asset('images/medias/' . $firstImage) }}" alt="không có ảnh">
                </a>
            </div>
            <div class="product_info">
                <div class="one d-flex flex-column">
                    <span class="card-title fw-bold my-1 text-uppercase text-primary shorten ">
                        <a href="{{ route('postSingle',$item->slug_posts) }}">{{$item->title}}</a>
                    </span>
                    <span class="card-title my-2 small shorten" >{{$item->address}}</span>
                    <hr class="my-3">
                    <div class="priceandacreage d-flex justify-content-between w-100">
                        <span class="price format-number text-warning fw-bold">{{$formatPrice($item->price)}}</span>
                        <span class="acreage text-warning fw-bold"><i class="bi bi-arrows-fullscreen"></i> {{$item->acreages}} m<sup>2</sup></span>
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
