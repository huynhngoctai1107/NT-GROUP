@extends('Admin.Layout.Master')
@section('title')
    Quản trị tối cao
@endsection

@section('main')
    <!-- Main Sidebar Container -->

    @if(auth()->user()->id_role == 1 )

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Thống Kê</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Thống kê</li>

                            </ol>

                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <div class="col-12">

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-maroon">
                                    <div class="inner">
                                        <h3>{{$voucher->voucher_count}}</h3>
                                        <p>Voucher được sử dụng </p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-pricetags-outline"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-warning">
                                    <div class="inner">
                                        <h3>{{$report->report_count}}</h3>
                                        <p>Số báo cáo chưa xử lí</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ios-paper"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-teal">
                                    <div class="inner">
                                        <h3>{{$email->email_count}}</h3>

                                        <p>Email đăng kí nhận tin</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-android-drafts"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-secondary">
                                    <div class="inner">
                                        <h3>{{$faqs->faqs_count}}</h3>

                                        <p>Số liên hệ chưa xử lí</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-email-unread"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>{{$data->post_count ?? 0}}</h3>
                                        <p>Bài viết mới</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-clipboard"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-gradient-lime">
                                    <div class="inner">
                                        <h3>{{$user->user_count}}</h3>
                                        <p>Số người dùng</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>{{number_format($recharge->recharge_price ?? 0)}} đ</h3>

                                        <p>Doanh thu tháng</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-social-usd"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        @php
                                            $percentageChange = ($recharge->recharge_price ?? 0) - $recharmonth->recharge_price;
                                        @endphp
                                        <h3>{{number_format($percentageChange)}}<sup style="font-size: 20px">đ</sup>
                                        </h3>

                                        <p>So với tháng trước</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <p class="small-box-footer" style="height: 30px"></p>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                        <!-- Main row -->
                        <div>
                            <div>
                                <h5>Biểu đồ thống kế bài viết</h5>
                                <x-client.account.charts.postcharts :dates="$dates" :vip="$vip" :charts="$charts"></x-client.account.charts.postcharts>
                            </div>
                            <div>
                                <h5>Biểu đồ thống kê doanh thu</h5>
                                <x-client.account.charts.transitioncharts :dateT="$dateT" :transitionPay="$transitionPay" :transitionMua="$transitionMua"></x-client.account.charts.transitioncharts>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @else
        <div class="content-wrapper mt-4 bg-none">
            <div class="content-header">
                <div class="container-fluid">
                    <h1 class="m-0">Tài khoản không có quyền theo thống kê</h1>
                </div>
            </div>
        </div>

    @endif
@endsection
@push('javascript')
    <script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/data.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    {{--    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>--}}
    {{--    <script src="https://code.highcharts.com/stock/modules/export-data.js"></script>--}}
    {{--    <script src="https://code.highcharts.com/stock/modules/accessibility.js"></script>--}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var customLink = document.querySelector(".custom-link");
            var tabLink = document.querySelector(".nav-pills .nav-link.active");

            if (customLink && tabLink) {
                customLink.innerHTML = tabLink.innerHTML;
                customLink.href = tabLink.href;

                customLink.addEventListener("click", function (event) {
                    event.preventDefault();
                    tabLink.click();
                });
            }
        });
    </script>
@endpush