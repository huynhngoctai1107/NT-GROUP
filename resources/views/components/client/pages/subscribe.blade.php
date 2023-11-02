@if(Session::has('success'))
    <div align="center" class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@endif
<div class="section bg_default small_pt small_pb">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Đăng ký nhận bản tin của chúng tôi</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form action="{{route('emailForm')}}" method="post">
                        @csrf
                        <input type="text" name="email" class="form-control rounded-0"
                               placeholder="Email">
                        @error('email')
                        <p class="text-white">
                            {{ $message }}
                        </p>
                        @enderror
                        <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                value="Submit">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>