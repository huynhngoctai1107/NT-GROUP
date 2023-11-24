@extends('Admin.Layout.Master')


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
    Quản lý mã giảm giá
@endsection


@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Quản lý mã giảm giá </h3>
                        <div class="card-tools">
                            <form action="{{ route('searchVoucher') }}" method="GET" class="form-inline">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm..." value="{{ request('keyword') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <x-admin.buttom.add router="addVoucher" name="Thêm mã giảm giá"></x-admin.buttom.add>
                            <x-admin.buttom.add router="ListVoucherHistory" name="Lịch sử xoá"></x-admin.buttom.add>
                        </div>
                        @if (isset($message))
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endif
                        <table id="example1" class="table table-bordered table-striped">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <thead class="text-center">
                            <tr>
                                <th>Tên mã</th>
                                <th>Mã code</th>
                                <th>Hình ảnh</th>
                                <th>Số tiền giảm</th>
                                <th>Trạng thái</th>
                                <th>Ngày hết hạn</th>
                                <th>Nghiệp vụ</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($list as $data)
                                <tr>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->code }}</td>
                                    <td><img src='{{asset("images/$data->image")}}' alt="" width="150" height="120">
                                    </td>
                                    <td>{{ number_format($data->discount) }} VNĐ</td>
                                    <td>
                                        <a href="{{route('status', $data->id)}}" class="btn btn-sm btn-{{$data->status ? 'success':'danger'}}">
                                            {{$data->status  ? 'Đang hoạt động':' Chưa hoạt động'}}
                                        </a>
                                    </td>
                                    <td>{{date('d-m-Y',strtotime($data->expiration_date))}}</td>


                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{route('editFormVoucher', $data->slug)}}" class="btn btn-outline-success btn-sm">Sửa</a>
                                            <a href="{{route('deleteVoucher', $data->id)}}" class="btn btn-outline-danger btn-sm">Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3" style="float: right">{{ $list->links() }}</div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

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

@endpush
<!-- HTML !-->
