@extends('Admin.Layout.master')
@section('title')
    Quản trị tối cao
@endsection

@section('main')
    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>

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
                                    <h3>{{$data->post_count}}</h3>
                                    <p>Bài viết mới</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-clipboard"></i>
                                </div>
                                <a href="#" class="small-box-footer" id="custom-link">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var customLink = document.getElementById("custom-link");
                                    var tabLink = document.querySelector(".nav-link.active");

                                    if (customLink && tabLink) {
                                        customLink.addEventListener("click", function(event) {
                                            event.preventDefault();
                                            tabLink.click();
                                        });
                                    }
                                });
                            </script>
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
                                <a href="#" class="small-box-footer" id="custom-user">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var customUserLink = document.getElementById("custom-user");
                                    var menu1Link = document.querySelector('a[data-toggle="pill"][href="#user"]');

                                    if (customUserLink && menu1Link) {
                                        customUserLink.addEventListener("click", function(event) {
                                            event.preventDefault();
                                            menu1Link.click();
                                        });
                                    }
                                });
                            </script>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{number_format($recharge->recharge_price)}} đ</h3>

                                    <p>Doanh thu tháng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-social-usd"></i>
                                </div>
                                <a href="#" class="small-box-footer" id="custom-pay">Xem chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var customUserLink = document.getElementById("custom-pay");
                                    var menupayLink = document.querySelector('a[data-toggle="pill"][href="#pay"]');

                                    if (customUserLink && menupayLink) {
                                        customUserLink.addEventListener("click", function(event) {
                                            event.preventDefault();
                                            menupayLink.click();
                                        });
                                    }
                                });
                            </script>
                        </div>
                        <!-- ./col -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    @php
                                        $percentageChange = $recharge->recharge_price - $recharmonth->recharge_price;
                                    @endphp
                                    <h3>{{number_format($percentageChange)}}<sup style="font-size: 20px">đ</sup></h3>

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
                        <ul class="nav nav-pills" style="display: none">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#posts">Thống kê bài viết</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#user">Menu 1</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#pay">Menu 2</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="posts">
                                <h5>Biểu đồ thống kế bài viết</h5>
                                <x-client.account.charts.post-charts :dates="$dates" :vip="$vip" :charts="$charts"></x-client.account.charts.post-charts>
                            </div>
                            <div class="tab-pane fade" id="user">
                                <h5>Biểu đồ thống kê tài khoản</h5>
                                <x-client.account.charts.user-chart :userchart="$userchart"></x-client.account.charts.user-chart>
                            </div>
                            <div class="tab-pane fade" id="pay">
                                <h5>Doanh thu</h5>
                                <x-client.account.charts.transition-charts :dateT="$dateT" :transitionPay="$transitionPay" :transitionMua="$transitionMua"></x-client.account.charts.transition-charts>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <aside class="control-sidebar control-sidebar-dark"></aside>
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
                document.addEventListener("DOMContentLoaded", function() {
                    var customLink = document.querySelector(".custom-link");
                    var tabLink = document.querySelector(".nav-pills .nav-link.active");

                    if (customLink && tabLink) {
                        customLink.innerHTML = tabLink.innerHTML;
                        customLink.href = tabLink.href;

                        customLink.addEventListener("click", function(event) {
                            event.preventDefault();
                            tabLink.click();
                        });
                    }
                });
            </script>
    @endpush