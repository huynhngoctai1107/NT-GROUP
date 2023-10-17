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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> Quản lý tài khoản người dùng </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <x-admin.buttom.add router="addUser" name="Thêm tài khoản"></x-admin.buttom.add>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Loại tài khoản</th>
                                <th>Hình ảnh</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Số dư</th>
                                <th>Giới tính</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                                <th>Nghiệp vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{-- sửa --}}
                            @foreach($list as $data)
                                <tr>
                                    <td>
                                        @if($data->id_role == 1)
                                            Quản trị viên
                                        @elseif($data->id_role == 2)
                                            Biên tập viên
                                        @elseif($data->id_role == 3)
                                            Khách hàng
                                        @else
                                            Không rõ
                                        @endif
                                    </td>
                                    <td><img src='{{asset("images/$data->image")}}' alt="" width="150" height="120"></td>
                                    <td>{{ $data->fullname }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ number_format($data->wallet)}} VNĐ</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>
                                        <a href="{{route('statusUser', $data->id)}}"
                                           class="btn btn-sm btn-{{$data->status ? 'success':'danger'}}">
                                            {{$data->status ? 'Hiện':'Ẩn'}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('editFormUser', $data->id) }}" class="btn btn-outline-success btn-sm">Sửa</a>
                                            <a href="{{ route('deleteUser', $data->id) }}" class="btn btn-outline-danger btn-sm">Xoá</a>
                                        </div>
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
@endsection

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
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
    </script>
@endpush<!-- HTML !-->
