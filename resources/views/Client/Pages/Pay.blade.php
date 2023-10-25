@extends('Client.Layout.master')

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

    <div class="section">
        <div class="container">
            <div class="row d-flex" style="justify-content: center">
                <div class="col-md-6">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('vnpay-payment') }}" method="POST">
                        @csrf
                        <div class="order_review">
                            <div>
                                <h5><label for="price" class="text-bold mb-1">Nạp Tiền (VND)</label></h5>
                                <input type="number" name="price" id="price" value="{{ old('price') }}" class="form-control">
                            </div>
                            <div class="payment_method">
                                <div class="payment_option">
                                    <h5><label for="price" class="text-bold mb-1">Phương Thức Thanh Toán</label></h5>
                                    <select class="form-select" aria-label="Default select example"
                                        name="payments">
                                        <option value="1">Momo</option>
                                        <option value="2">VNPay</option>
                                        <option value="3">Paypal</option>
                                    </select>
                                </div>
                            </div>
                            <button name="redirect" class="btn btn-fill-out btn-block">Thanh Toán</button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- END MAIN CONTENT -->
@endsection
@push('styles')
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
@endpush
