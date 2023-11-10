<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- SITE TITLE -->
    <title>@yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('client/images/favicon.png')}}')}}">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="{{asset('client/css/animate.css')}}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{asset('client/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="{{asset('client/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/simple-line-icons.css')}}">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"/>

    <link rel="stylesheet" href="{{asset('client/owlcarousel/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/owlcarousel/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('client/owlcarousel/css/owl.theme.default.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{asset('client/css/magnific-popup.css')}}">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{asset('client/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/slick-theme.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">
    {!! RecaptchaV3::initJs() !!}




    @stack('styles')
    @stack('css')
{{--    <style>--}}
{{--		@media (max-width: 767px) {--}}
{{--			.bds .content h2, .bds .content p {--}}
{{--				text-align: center;--}}
{{--			}--}}

{{--			.bds .content button {--}}
{{--				margin: 0 auto;--}}
{{--				display: flex;--}}
{{--			}--}}
{{--		}--}}
{{--    </style>--}}
    @livewireStyles
</head>

<body>

@include('client.header.nav')
@include('client.header.tools')
@yield('main')

@include('client.footer.footer')
</body>

@yield('showhide')
@livewireScripts
<!-- Latest jQuery -->
<script src="{{asset('client/js/jquery-3.6.0.min.js')}}"></script>
<!-- popper min js -->
<script src="{{asset('client/js/popper.min.js')}}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{asset('client/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- owl-carousel min js  -->
<script src="{{asset('client/owlcarousel/js/owl.carousel.min.js')}}"></script>
<!-- magnific-popup min js  -->
<script src="{{asset('client/js/magnific-popup.min.js')}}"></script>
<!-- waypoints min js  -->
<script src="{{asset('client/js/waypoints.min.js')}}"></script>
<!-- parallax js  -->
<script src="{{asset('client/js/parallax.js')}}"></script>
<!-- countdown js  -->
<script src="{{asset('client/js/jquery.countdown.min.js')}}"></script>
<!-- imagesloaded js -->
<script src="{{asset('client/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- isotope min js -->
<script src="{{asset('client/js/isotope.min.js')}}"></script>
<!-- jquery.dd.min js -->
<script src="{{asset('client/js/jquery.dd.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('client/js/slick.min.js')}}"></script>
<!-- elevatezoom js -->
<script src="{{asset('client/js/jquery.elevatezoom.js')}}"></script>
<!-- scripts js -->
<script src="{{asset('client/js/scripts.js')}}"></script>
@stack('javascript')

@stack('script')
</html>
