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
                        <h3 class="card-title"> Quản lý lịch sử xoá Báo cáo </h3>
                        <div class="card-tools">
                            <form action="{{ route('searchReport') }}" method="GET" class="form-inline">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." value="{{ request('keyword') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <x-admin.buttom.add router="reportHistory" name="Lịch sử xóa"></x-admin.buttom.add>
                    </div>
                    @if (isset($message))
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead class="text-center">
                            <tr>
                                <th style="width: 10%;">Tên tài khoản</th>
                                <th style="width: 10%;">Email </th>
                                <th style="width: 30%;">Bài viết</th>
                                <th style="width: 15%;">Nội dung</th>
                                <th style="width: 8%;">Trạng thái</th>
                                <th style="width: 8%;">Ngày tạo</th>
                                <th style="width: 8%;">Nghiệp vụ</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($list as $data)
                                <tr>
                                    <td>{{ $data->fullname }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->getTitleAttribute() }}</td>
                                    <td>{{ $data->content }}</td>
                                    <td>
                                        <a href="{{route('statusReport', $data->id_report)}}" class="btn btn-sm btn-{{$data->status_report == 1 ? 'success':'danger'}}">
                                            {{$data->status_report == 1 ? 'Đã xử lý':'Chưa xử lý'}}
                                        </a>
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($data->created_at_report)) }}</td>
                                    <td>
                                        <a href="{{ route('deleteReport', $data->id_report) }}" class="btn btn-outline-danger btn-sm">Xoá</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">{{ $list->links() }}</div>
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
