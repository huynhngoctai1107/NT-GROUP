@for ($i = 0; $i < 6; $i++)
<div class="col-xl-4 col-md-6">
    <div class="blog_post blog_style2 box_shadow1">
        <div class="blog_img">
            <a href="blog-single.html" style="background-image: image({{$img}}); background-size: cover;">
                <img src="{{$img}}" alt="blog_small_img1">
            </a>
        </div>
        <div class="blog_content bg-white">
            <div class="blog_text">
                <h6 class="blog_title"><a href="blog-single.html">{{$name}}</a></h6>
                <ul class="list_none blog_meta">
                    <li><a href="#"><i class="ti-calendar"></i> {{$date}}</a></li>
                    <li><a href="#"><i class="ti-comments"></i> 10</a></li>
                </ul>
                <p>{{$description}}</p>
            </div>
        </div>
    </div>
</div>
@endfor
