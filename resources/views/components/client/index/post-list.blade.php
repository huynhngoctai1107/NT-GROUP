@foreach($list as $item)
    <div class="col-lg-6 col-md-6 col-12">
        <div class="product">
            @php
                // Tách chuỗi thành mảng
                $images = $item->images;
                $imageArray = explode(',', $images);

                // Lấy tên file ảnh đầu tiên
                $firstImage = reset($imageArray);
            @endphp
            <div class="product_img">
                <a href="{{ route('postSingle',$item->slug_posts) }}">
                    <div class="frame d-flex justify-content-center align-items-center" style="width: 100%; height: 300px; background-image: url('{{ asset('images/medias/' . $firstImage) }}'); background-size: cover; background-position: center;"></div>
                </a>
            </div>
            <div class="product_info">
                <div class="one m-3 d-flex flex-column">
                    <span class="card-name card-title fw-bold my-1"><a href="{{ route('postSingle',$item->slug_posts) }}">{{$item->title}}</a></span>
                    <span class="card-name card-title my-2">{{$item->address}}</span>
                    <hr class="my-3">
                    <div class="priceandacreage d-flex justify-content-between w-100">
                        <span class="price text-warning fw-bold">{{$formatPrice($item->price)}}</span>
                        <span class="acreage text-warning fw-bold"><i class="bi bi-arrows-fullscreen"></i> {{$item->acreages}} m²</span>
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