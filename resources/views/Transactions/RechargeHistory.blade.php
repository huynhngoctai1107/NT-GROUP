@extends('admin.playout.master')


{{-- css --}}
@section('link')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    Lịch sử giao dịch
@endsection


@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lịch sử giao dịch </h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">


                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Loại giao dịch</th>
                                <th>Email</th>
                                <th>Ngày giao dịch</th>
                                <th>Số tiền</th>
                                <th>Số dư</th>
                                <th>Ghi chú</th>
                                <th>Nhiệp vụ</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $list =[[
                                      'id_category'=>1 ,
                                      'email'=>'gmail@gmail.com',
                                      'date_input'=>'11/07/2003',
                                      'price'=>1000000,
                                      'surplus'=>1800000,
                                       ],
                                       [
                                       'id_category'=>2 ,
                                      'email'=>'gmail@gmail.com',
                                      'date_input'=>'11/07/2003',
                                      'price'=>1100000,
                                      'surplus'=>1900000,
                                          ],
                                       [
                                       'id_category'=>1,
                                      'email'=>'gmail@gmail.com',
                                      'date_input'=>'11/07/2003',
                                      'price'=>1500000,
                                      'surplus'=>2100000,
                                          ]];


                            @endphp
                            <x-transactions.rechargehistory :list="$list"></x-transactions.rechargehistory>


                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
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
                "responsive": true,
            });
        });
    </script>
@endsection
<!-- HTML !-->

<style>
    /* CSS */
    .button-86 {
        all: unset;
        width: 100px;
        height: 30px;
        font-size: 16px;
        background: transparent;
        border: none;
        position: relative;
        color: #f0f0f0;
        cursor: pointer;
        z-index: 1;
        padding: 10px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-86::after,
    .button-86::before {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: -99999;
        transition: all .4s;
    }

    .button-86::before {
        transform: translate(0%, 0%);
        width: 100%;
        height: 100%;
        background: #28282d;
        border-radius: 10px;
    }

    .button-86::after {
        transform: translate(10px, 10px);
        width: 35px;
        height: 35px;
        background: #ffffff15;
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border-radius: 50px;
    }

    .button-86:hover::before {
        transform: translate(5%, 20%);
        width: 110%;
        height: 110%;
    }

    .button-86:hover::after {
        border-radius: 10px;
        transform: translate(0, 0);
        width: 100%;
        height: 100%;
    }

    .button-86:active::after {
        transition: 0s;
        transform: translate(0, 5%);
    }
</style>
