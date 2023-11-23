@dd($slug)
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-4 col-12 mb-5 mb-lg-0 wow fadeIn">
            <div class="card ">
                <div class="p-4">
                    <div class="d-flex justify-content-center flex-row">
                        <div class="col-md-4 col-3 me-md-0 me-3 ">
                            <img src="{{asset('images/users/'.$user->image) }}" alt="user" class="rounded-circle" width="100"/>
                        </div>
                        <div class="pl-4 ps-md-4 col-md-8 col-4 " >
                            <h3 class="h4 mb-1">{{$user->fullname ?? ""}}</h3>
                            <span class="text-danger">{{$user->name}}</span>
                            <br>
                            <button class="btn btn-success btn-rounded text-white text-uppercase font-14 mt-3">
                                <i class="fa fa-plus mr-2"></i> Follow
                            </button>
                        </div>
                    </div>

                </div>

                <div class="row justify-content-center p-1 mb-2">
                    <div class="col-6  justify-content-center d-flex flex-column align-items-center"><h5>Follow</h5>
                        <span style="font-weight:600 ">
                                2
                            </span>
                    </div>
                    <div class="col-6 justify-content-center d-flex flex-column align-items-center"><h5>Lượt xem</h5>
                        <span style="font-weight:600 ">
                                2.5K
                            </span>
                    </div>


                </div>


                <div class="card-body border-top">
                    <div class="row j">
                        <div class="col-3 justify-content-center d-flex">
                            <a href=""><i class="bi bi-facebook"></i></a></div>
                        <div class="col-3 justify-content-center d-flex">
                            <a href=""><i class="bi bi-envelope"></i></a></div>
                        <div class="col-3 justify-content-center d-flex"><a href=""><i class="bi bi-telephone"></i></a>
                        </div>
                        <div class="col-3 justify-content-center d-flex">
                            <a href=""><i class="bi bi-youtube"></i></a></div>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-12 col-md-8 px-4">

            <div class="mb-3 wow fadeIn">
                <div class="text-start mb-1-6 wow fadeIn">
                    <h4 class="h3 mb-0 text-danger">Danh sách bài viết của tôi</h4>
                </div>
            </div>

            <x-client.index.postSale :list="$post"></x-client.index.postSale>

        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $post->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>