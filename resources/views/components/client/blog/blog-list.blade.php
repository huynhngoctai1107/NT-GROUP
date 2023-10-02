@foreach($list as $item)
    <div class="col-xl-4 col-md-6">
        <div class="blog_post blog_style2 box_shadow1">
            <div class="blog_img">
                <a href="blog-single.html" style="background-image: image({{$item['img']}}); background-size: cover;">
                    <img src="{{asset("client/images/".$item['img'])}}" alt="blog_small_img1">
                </a>
            </div>
            <div class="blog_content bg-white">
                <div class="blog_text">
                    <h6 class="blog_title shorten"><a href="blog-single.html">{{$item['name']}}</a></h6>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> {{$item['date']}}</a></li>
                        <li><a href="#"><i class="ti-comments"></i> 10</a></li>
                    </ul>
                    <p style="max-height: 3.5em; overflow: hidden; text-overflow: ellipsis;">{{$item['description']}}</p>
                </div>
            </div>
        </div>
    </div>
@endforeach