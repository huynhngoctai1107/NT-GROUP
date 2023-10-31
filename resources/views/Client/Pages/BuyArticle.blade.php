@extends('client.layout.master')

@section('title')
    Xác nhận đơn hàng - NT GROUP
@endsection
@php
    $title = "Xác nhận đơn hàng";
@endphp
@section('main')
    <!-- START MAIN CONTENT -->
    <div class="main_content">
        <x-client.header.posttitle :title="$title"></x-client.header.posttitle>


        <div class="section">

            <div class="container">
                @if(Session::has('success'))

                    <div class="alert alert-success text-center mb-5" role="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
                @if(Session::has('error'))

                    <div class="alert alert-danger text-center mb-5" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive shop_cart_table">
                            <table class="table">
                                <thead>
                                <tr class="text-center" style="font-size:16px !important ">
                                    <th colspan="2">&nbsp;Ảnh</th>
                                    <th colspan="2" rowspan="2">Tiêu đề</th>
                                    <th colspan="2">Giá</th>
                                    <th colspan="2">Địa chỉ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td colspan="2" class="product-thumbnail pt-3"><a href="#">
                                            @php
                                                $imgPost = explode(',',$post->images);
                                            @endphp
                                            @for ($i = 0; $i < count($imgPost); $i++)
                                                <img width="" src='{{ asset('images/medias/' . $imgPost[$i]) }}' alt="{{ $imgPost[$i] }}">
                                                @break
                                            @endfor
                                        </a>
                                    </td>
                                    <td colspan="2" class="product-name " data-title="Tiêu đề"><span class="text-dark" style="
                                                display:inline-block;
                                                white-space: nowrap;
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                -webkit-line-clamp:1;
                                                max-width: 30ch;">{{ $post->title }}</span>
                                        <br>
                                        <a href="{{route('search',$post->slug_category )}}" class="btn btn-fill-out fst-italic " type="button">
                                            {{ $post->name_category }}</a>

                                        <a href="{{route('search1',$post->slug_demands)}}" class=" text-white  btn btn-fill-out fst-italic" type="button">
                                            {{ $post->name_demands }}</a>
                                    </td>
                                    <td colspan="2" class="text-danger" style="font-weight: bold;" data-title="Giá">
                                        {{ $formatPrice($post->price) }}</td>
                                    <td colspan="2" class="align-items-center" data-title="Địa chỉ">
                                        <p class="text-dark">
                                            {{ $post->address }}

                                        </p>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>

                <div class="row">
                    <form action="{{route('voucher')}}" class="col-md-6">

                        <div class="row g-0 align-items-center">
                            @csrf
                            <div class="col-md-12 col-12">
                                <div class="coupon field_form input-group">
                                    <input type="hidden" name="id_user" value="{{$user->id}}" class="form-control form-control-sm" >
                                    <input type="text" name="voucher" value="{{session()->get('voucher')[0]['code'] ?? ''}}" class="form-control form-control-sm" placeholder="Nhập mã giảm giá">
                                    <div class="input-group-append">
                                        <button class="btn btn-fill-out btn-sm" type="submit">Sửa dụng</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <form action="{{route('checkOut')}}" class="col-md-6">
                        @csrf
                        <input type="hidden" name="id_user" value="{{$user->id}}" class="form-control form-control-sm" >
                        <input type="hidden" name="slug" value="{{$post->slug_posts}}" class="form-control form-control-sm" >
                        <input type="hidden" name="total" value="{{($total *0.05  +$total) - (session()->get('voucher')[0]['discount'] ?? 0) }}" class="form-control form-control-sm" placeholder="Enter Coupon Code..">
                        <div class="border p-3 p-md-4">
                            <div class="heading_s1 mb-3">
                                <h6>Hóa đơn</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="cart_total_label">Tổng tiền</td>
                                        <td class="cart_total_amount">- {{number_format($total)}} VND/Tháng</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Thuế (5%)</td>
                                        <td class="cart_total_amount">- {{number_format($total *0.05 )}} VND</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Giảm</td>
                                        <td class="cart_total_amount">+ {{number_format(session()->get('voucher')[0]['discount'] ?? 0)}} VND</td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tổng</td>
                                        <td class="cart_total_amount">
                                            <strong>- {{number_format(($total *0.05  +$total) - (session()->get('voucher')[0]['discount'] ?? 0) )}} VND/Tháng</strong></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button class="btn btn-fill-out btn-sm" type="submit">Thanh toán</button>
                        </div>

                    </form>
                </div>


            </div>
        </div>

    </div>


    <style>

		tr th {
			font-size: 15px !important;
		}
    </style>
    <!-- END MAIN CONTENT -->
@endsection