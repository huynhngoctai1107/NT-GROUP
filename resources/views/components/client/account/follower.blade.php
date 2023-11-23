@foreach($getFollow as $item)

    <div class="ndidate-list-box card mt-4">
        <div class="p-4 card-body">
            <div class="align-items-center row">
                <div class="col-3">
                    <div class="candidate-list-images">
                        <a href="{{route('Profile',$item->slug)}}"><img src="{{asset('images/users/'.$item->image) }}" alt="" class="avatar-md img-thumbnail rounded-circle"/></a>
                    </div>
                </div>
                <div class="col-9">
                    <div class="candidate-list-content mt-3 mt-lg-0">
                        <h5 class="fs-19 mb-0">
                            <a class="primary-link" href="{{route('Profile',$item->slug)}}">{{$item->fullname}}</a>
                        </h5>
                        <p class="text-muted mb-2">{{$item->name}}</p>

                    </div>
                    @if(!empty($check))
                        <form action="{{route('unFollow')}}" method="get">
                            <input type="hidden" name="checkAccount" value="{{TRUE}}">
                            <input type="hidden" name="id_user" value="{{$item->id}}">
                            <input type="hidden" name="id_follower" value="{{$check}}">
                            <button type="submit" class="button-24 py-2 px-3" role="button">
                                <i class="fa fa-minus mr-2 "></i> Bỏ theo dõi
                            </button>


                        </form>
                    @endif
                </div>

            </div>

        </div>
    </div>
@endforeach