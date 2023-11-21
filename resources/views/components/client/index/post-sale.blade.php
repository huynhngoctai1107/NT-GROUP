@foreach($list as $item )
    <div class="card mt-3">
        <div class="row">
            @php
                // Tách chuỗi thành mảng
                $images = $item->images;
                $imageArray = explode(',', $images);

                // Lấy tên file ảnh đầu tiên
                $firstImage = reset($imageArray);
            @endphp
            <div class="col-md-4 ">
                <a href="{{ route('postSingle',$item->slug_posts) }}">
                    <div class="frame d-flex justify-content-center align-items-center" style="width: 100%; height: 250px; background-image: url('{{ asset('images/medias/' . $firstImage) }}'); background-size: cover; background-position: center;"></div>
                </a>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-name card-title fw-bold my-1 shorten"><a href="{{ route('postSingle',$item->slug_posts) }}">{{ $item->title }}</a></h5>
                    <p class="card-name card-title my-2 shorten">{!! $item->subtitles !!}</p>
                    <hr class="my-3">
                    <div class="d-md-flex justify-content-between">
                        <span class="price format-number text-warning fw-bold">{{$formatPrice($item->price)}}</span>
                        <span class="acreage"><i class="bi bi-arrows-fullscreen"></i>  {{$item->acreages}} m<sup>2</sup></span>
                    </div>
                    <p class="address my-3 shorten"><strong>Khu vực:</strong> {{$item['address']}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach
