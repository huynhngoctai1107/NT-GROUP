<form action="{{route('addReport')}}" method="post">
    <div class="mb-3">
@csrf

        @php session()->put('report', url()->current()) @endphp
        <input type="hidden"  name="id_post" value="{{$report->id_post}}">
        <input type="hidden" name="id_user" value="{{auth()->user()->id ?? ''}}">
        <input type="hidden" name="email" value="{{auth()->user()->email ?? ''}}">
        <input type="hidden" name="fullname" value="{{auth()->user()->fullname ?? ''}}">
        <label for="type" class="form-label">Loại báo cáo</label>
        <select class="form-control" id="type" name="type">
            <option value="{{ Str::slug('Tài sản đã bán/cho thuê')}}">Tài sản đã bán/cho thuê</option>
            <option value="{{ Str::slug('Giá không đúng')}}">Giá không đúng</option>
            <option value="{{ Str::slug('Tin không có thật')}}">Tin không có thật</option>
            <option value="{{ Str::slug('Không liên lạc được')}}">Không liên lạc được</option>
            <option value="{{ Str::slug(' Nội dung không đúng với thực tế')}}"> Nội dung không đúng với thực tế</option>
            <option value="{{ Str::slug('Địa chỉ bất động sản không đúng')}}">Địa chỉ bất động sản không đúng</option>
            <option value="khác">Khác</option>
        </select>
    </div>
    <div class="mb-3" id="content-wrapper">
        <label for="content" class="form-label">Nội dung báo cáo</label>
        <textarea minlength="50"  maxlength="500" class="form-control" name="content" rows="10" style="display: none;"></textarea>
    </div>
    {!! RecaptchaV3::field('report') !!}
    <button type="submit" class="btn btn-fill-out btn-block" name="report">Báo cáo</button>
</form>
