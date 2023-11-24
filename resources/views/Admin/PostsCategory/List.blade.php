@extends('Admin.Layout.Master')


{{-- css --}}
@push('link')
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js" integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
@section('title')
    {{$page=='posts'?'Quản lý bài viết':''}}
@endsection


@section('main')
    <div class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-header d-flex" style="justify-content: space-between">
                        <div class="w-50 d-flex align-items-center">
                            <h3 class="card-title"> Quản lý bài viết</h3>
                        </div>
                        <div class="w-50 d-flex justify-content-end">
                            <form action="{{route('searchListPost')}}" method="post">
                                @csrf
                                <div class="input-group rounded mt-3">
                                    <input type="text" placeholder="Nhập từ khóa tìm kiếm" class="form-control ps-2" id="search_input" name="keyword">
                                    <button type="submit" class="input-group-text border-0">
                                        <i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <x-admin.buttom.add :router="$page=='posts'?'addFormPosts':''" :name="$page=='posts'?'Thêm bài viết':''"></x-admin.buttom.add>
                            <x-admin.buttom.add router="listHistory" name="Lịch sử xóa"></x-admin.buttom.add>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <thead>
                            <tr>

                                <th>Tên {{$page=='medias'?' bài viết':''}}</th>
                                <th>Slug</th style="width: 30%;">
                                <th>Ngày tạo</th>
                                <th>Cập nhật</th>
                                <th>Trạng thái</th>
                                <th>Chi tiết</th>
                                <th>Nghiệp vụ</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($query as $item)

                                <tr>
                                    <td style="width: 25%">{{$item->title}}</td>
                                    <td style="width: 25%">{{$item->slug}}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ date('d-m-Y', strtotime($item->updated_at)) }}</td>
                                    <td>
                                        <a href="{{route('UpdateStatus', $item->id)}}" class="btn btn-sm btn-{{$item->status ? 'success':'danger'}}">
                                            {{$item->status ? 'Hiện':'Ẩn'}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('postSingle', $item->slug)}}" class="btn btn-outline-success btn-sm">Xem</a>
                                    </td>
                                    <td>
                                        <a href="{{route('editPosts', $item->slug)}}" class="btn btn-outline-success btn-sm">Sửa</a>
                                        <a href="{{route('deleteHistory', $item->slug)}}" class="btn btn-outline-danger btn-sm">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (isset($message))
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @endif
                            </tbody>

                        </table>
                        <div class="mt-3">{{ $query->links() }}</div>
                    </div>

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
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
@endpush
<!-- HTML !-->

<style>
	/* CSS */
	.button-86 {
		all: unset;
		width: 150px;
		height: 40px;
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