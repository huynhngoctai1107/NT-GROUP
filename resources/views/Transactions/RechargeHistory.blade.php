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
    Lịch sử giao dịch
@endsection


@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header d-flex" style="justify-content: space-between">
                        <div class="w-50">
                            <h3 class="card-title">Lịch sử giao dịch </h3>
                        </div>
                        <form class="d-flex align-items-center w-50" action="{{route('searchListRechargeHistory')}}" method="post">
                            @csrf
                            <input class="form-control" name="keyword" type="search" placeholder="Tìm kiếm">
                        </form>
                    </div>


                    <div class="card-body">


                        <table id="example1" class="table table-bordered table-striped">
                            <thead class="text-center">
                            <tr>
                                <th>Loại</th>
                                <th>Thanh toán</th>
                                <th>Email</th>
                                <th>Số tiền</th>
                                <th>số dư</th>
                                <th>Voucher</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                                <th>Ngày hết hạn</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($list as $item )
                                <tr>
                                    <td>
                                        <span class="badge {{$item->id_category_transaction == 1 ? 'bg-success' : 'bg-danger'}}">{{$item->name_category}}</span>
                                    </td>
                                    <td>
                                        <span class="badge {{$item->id_category_transaction == 1 ? 'bg-success' : 'bg-danger'}}">{{$item->id_category_transaction == 1 ? $item->method : 'Mua bài viết VIP'}}</span>
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{number_format($item->price)}} Đ</td>
                                    <td>{{number_format($item->surplus)}} Đ</td>
                                    <td>{{ $item->id_category_transaction == 2 ? ($item->voucher ?? "Không sử dụng") : "bạn không dùng voucher" }}</td>
                                    <td>{{$item->content ?? 'Không có'}}</td>
                                    <td> {{date('d-m-Y',strtotime($item->created_at))}}</td>
                                    <td> {{$item->id_category_transaction == 2 ? date('d-m-Y',strtotime($item->created_at->addDays(30))) : "demo1"}}</td>
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
@endpush
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
