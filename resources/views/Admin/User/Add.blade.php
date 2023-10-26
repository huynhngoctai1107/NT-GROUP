@extends('Admin.Layout.master')


{{-- css --}}
@section('link')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/min/dropzone.min.css') }}">
    {{-- endcss --}}

    <style>
		#exampleInputImage {
			max-width: 500px;
			max-height: 500px;
		}
    </style>


    {{-- title --}}
@endsection
@section('title')
    @if ($page == 'addUser')
        Thêm tài khoản
    @else
        Sửa tài khoản
    @endif
@endsection
{{-- endtitle --}}

@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <form action="{{ $page == 'addUser' ? route('addUser') : route('editFormUser', $data->id) }}" enctype="multipart/form-data" method="post" class="mx-5 pt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputId_role" class="form-label">Loại tài khoản</label>
                        <select class="form-select @error('id_role') is-invalid @enderror" name="id_role" id="exampleInputId_role">
                            @foreach($query as $item)
                                <option value="{{ $item->id }}" @if (old('id_role', isset($data) ? $data->id_role : '') == $item->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('id_role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <x-admin.user.images></x-admin.user.images>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control @error('fullname') is-invalid @enderror" value="{{ $page == 'addUser' ? old('fullname') : $data->fullname }}" name="fullname" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('fullname')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputWallet" class="form-label">Số Dư</label>
                        <input type="number" class="form-control @error('wallet') is-invalid @enderror" value="{{ $page == 'addUser' ? old('wallet') : $data->wallet }}" name="wallet" id="exampleInputWallet" aria-describedby="WalletHelp">
                        @error('wallet')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ $page == 'addUser' ? old('email') : $data->email }}" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($page == 'addUser')
                        <div class="mb-3">
                            <label for="exampleInputPassword" class="form-label">Mật khẩu</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" value="" name="password" id="exampleInputPassword" aria-describedby="PasswordHelp">
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="exampleInputGender" class="form-label">Giới tính</label>
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="exampleGender" value="Nam" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Nam
                            </label>
                        </div>
                        <div class="form-check ms-3">
                            <input class="form-check-input" type="radio" name="gender" id="exampleGender" value="Nữ">
                            <label class="form-check-label" for="exampleRadios2">
                                Nữ
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $page == 'addUser' ? old('phone') : $data->phone }}" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="textAreaExample6">Địa chỉ</label>
                        <input type="address" class="form-control @error('address') is-invalid @enderror" value="{{ $page == 'addUser' ? old('address') : $data->address }}" name="address" id="exampleInputaddress" aria-describedby="emailHelp">
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">
                        @if ($page == 'addUser')
                            Thêm tài khoản
                        @else
                            Sửa tài khoản
                        @endif
                    </button>
                </form>
            </div>
        </div>
        <div style="margin-bottom: 30px;"></div>
        @endsection

        {{-- javascript --}}
        @section('js')
            <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
            <script>
                $('#chooseFile').bind('change', function () {
                    var filename = $("#chooseFile").val();
                    if (/^\s*$/.test(filename)) {
                        $(".file-upload").removeClass('active');
                        $("#noFile").text("No file chosen...");
                    }
                    else {
                        $(".file-upload").addClass('active');
                        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
                    }
                });

            </script>

        @endsection
