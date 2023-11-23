

<div class="card mt-3 col-12">

    <div class="card-body">

        <!-- Profile picture and short information -->
        <div class="d-flex align-items-center position-relative pb-3">
            <div class="flex-shrink-0">
                <img class="img-md rounded-circle" src="{{asset('images/users/'.$item->user_image )}}" alt="Profile Picture" loading="lazy">
            </div>
            <div class="flex-grow-1 ms-3">
                <a href="{{route('Profile',$item->slug)}}" class="h5 stretched-link  ">{{$item->fullname}}</a>
                <p class="text-muted m-0">Chúng tôi luôn lắng nghe ý kiến của bạn.</p>
            </div>
        </div>


        <!-- Options buttons -->
        <div class="mt-3 pt-2 text-center border-top">
            <div class="d-flex justify-content-center gap-3">
                <a href="tel: {{$item->user_phone}}" class="btn btn-sm btn-info btn-outline-light btn-lg">
                    <i class="fa fa-phone" aria-hidden="true"></i> Gọi ngay
                </a>
                <a href="mailto: {{$item->email}} " class="btn btn-sm btn-info btn-outline-light btn-lg">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Email
                </a>

            </div>
        </div>


    </div>
</div>