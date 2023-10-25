@foreach($list as $item )
<div class="card mt-3">
    <div class="d-flex">
        @php
            // Tách chuỗi thành mảng
            $images = $item->images;
            $imageArray = explode(',', $images);

            // Lấy tên file ảnh đầu tiên
            $firstImage = reset($imageArray);
        @endphp
        <img src="{{ asset('images/medias/' . $firstImage) }}" class="m-3" alt="Hình ảnh"
             style="width: 120px; height: 150px; object-fit: cover" />
        <div class="one ms-lg-3 d-block mt-2">
            <span class="card-name card-title my-2">{{$item->title}}</span>
            <div class="address my-2">
                <span class="card-name card-text"><strong> Đường:</strong>{{$item->address}}</span>
            </div>
            <div class="price my-2">
                <span>Giá: {{$formatPrice($item->price)}} - {{$item->acreages}} m²</span>
            </div>
        </div>
    </div>
</div>
@endforeach