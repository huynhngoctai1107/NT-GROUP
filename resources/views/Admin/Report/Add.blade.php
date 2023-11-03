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
                <form action="" enctype="multipart/form-data" method="post" class="mx-5 pt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputId_role" class="form-label">Loại tài khoản</label>
                        <select class="form-select " name="id_role" id="exampleInputId_role"></select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputId_role" class="form-label">Loại tài khoản</label>
                        <select class="form-select " name="id_role" id="exampleInputId_role"></select>

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputId_role" class="form-label">Loại tài khoản</label>
                        <select class="form-select " name="id_role" id="exampleInputId_role"></select>

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

@endsection
