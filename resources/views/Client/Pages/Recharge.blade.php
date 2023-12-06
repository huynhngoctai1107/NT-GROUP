@extends('Client.Layout.Master')

@section('title')
    NẠP TIỀN - NT GROUP
@endsection
@section('main')
    <!-- START SECTION BREADCRUMB -->
    <div class="breadcrumb_section bg_gray page-title-mini">
        <div class="container"><!-- STRART CONTAINER -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="page-title">
                        <h1>Nạp tiền</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb justify-content-md-end">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="#">Nạp tiền</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- END CONTAINER-->
    </div>

    <div class="main_content">
        <!-- START SECTION CONTACT -->
        <div class="section pt-0">
            <div class="container mb-5 mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <p>Mọi thắc mắc xin mời bạn liên hệ với chúng tôi, xin cảm ơn!</p>
                        <form action="{{ route('Pay') }}" method="post" >
                            @csrf
                            <div class="mb-3">
                                <label for="price" class="form-label text-dark">Số Tiền Cần Nạp</label>
                                <input type="number" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-fill-out  btn-block" name="contact">Nạp</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- END SECTION CONTACT -->

    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>
@endpush
