@foreach($list as $item)
    <div class="card mt-3">
        <div class="d-flex">
            @php
                // Tách chuỗi thành mảng
                $images = $item->images;
                $imageArray = explode(',', $images);

                // Lấy tên file ảnh đầu tiên
                $firstImage = reset($imageArray);
            @endphp
            <div class="col-md-4">
                <a href="{{ route('postSingle', $item->slug_posts) }}">
                    <div class="image-container">
                        <img src="{{ asset('images/medias/' . $firstImage) }}" alt="Hình ảnh"/>
                    </div>
                </a>
            </div>
            <div class="col-md-8 d-block" style="margin-left: 10px;">
                <div class="col-11 m-2">
                    <span class="card-name card-title">
                        <a href="{{ route('postSingle', $item->slug_posts) }}">{{ $item->title }}</a>
                    </span>
                    <div class="price">
                        <span class="d-block"> Giá: {{ $formatPrice($item->price) }}</span>
                        <span class="d-block"> Diện tích: {{ $item->acreages }} m²</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<style>
	postvip {
		margin-left: 5%;
    }
	.image-container {
		width: 120px;
		height: 120px;
		overflow: hidden;
	}

	.image-container img {
		width: 100%;
		height: 100%;
		object-fit: cover;
	}
</style>