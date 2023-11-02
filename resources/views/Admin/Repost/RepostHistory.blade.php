@extends('Admin.Layout.master')


{{-- css --}}
@section('link')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
@endsection
@section('title')
    Quản lý tài khoản người dùng
@endsection


@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"> Lịch sử xoá Báo cáo </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <x-admin.buttom.add router="ListRepost" name="Danh sách báo cáo"></x-admin.buttom.add>
                        </div>
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead class="text-center">
                            <tr>
                                <th style="width: 10%;">Tên tài khoản</th>
                                <th style="width: 30%;">Bài viết</th>
                                <th style="width: 30%;">Nội dung</th>
                                <th style="width: 7%;">Trạng thái</th>
                                <th style="width: 8%;">Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($list as $data)
                                <tr>
                                    <td>{{ $data->fullname }}</td>
                                    <td>{{ $data->getTitleAttribute() }}</td>
                                    <td>{{ $data->content }}</td>
                                    <td>
                                        <a href="{{route('statusReport', $data->id)}}" class="btn btn-sm btn-{{$data->status ? 'success':'danger'}}">
                                            {{$data->status ? 'Đã xử lý':'Chưa xử lý'}}
                                        </a>
                                    </td>
                                    <td>{{ $data->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <div style="margin-bottom: 30px;"></div>
@endsection


<style>
	img {
		object-fit: cover;
	}
</style>

@push('javascript')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- Page specific script -->

@endpush<!-- HTML !-->
