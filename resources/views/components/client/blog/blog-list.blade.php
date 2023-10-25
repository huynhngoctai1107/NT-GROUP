@foreach($list as $item)
    <div class="col-xl-4 col-md-6">
        <div class="blog_post blog_style2 box_shadow1">
            @php
                // Tách chuỗi thành mảng
                $images = $item->images;
                $imageArray = explode(',', $images);

                // Lấy tên file ảnh đầu tiên
                $firstImage = reset($imageArray);
            @endphp
            <div class="blog_img">
                <a href="{{ route('postSingle',$item->slug_posts) }}">
                    <img src="{{ asset('images/medias/' . $firstImage) }}" alt="blog_small_img1" class="responsive-img" style="height: 261px;">
                </a>
            </div>
            <div class="blog_content bg-white">
                <div class="blog_text">
                    <h6 class="blog_title"><a href="{{ route('postSingle',$item->slug_posts) }}">{{ $item->title }}</a></h6>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> {{ date('d-m-Y', strtotime($item->created_at)) }}</a></li>
                        <li><a href="#"><i class="ti-comments"></i> 10</a></li>
                    </ul>
                    <div class="blog_subtitle">{!! $item->subtitles !!}</div>
                </div>
            </div>
        </div>
    </div>
@endforeach
