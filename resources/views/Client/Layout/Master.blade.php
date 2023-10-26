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
{{-- gg map and hinh anh upload.js--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8ttJcdnyqOwb93B47rjRU+ABJxUrEDR/i" crossorigin="anonymous">


    @stack('styles')
    @stack('css')
    <style>
	    @media (max-width: 767px) {
		    .bds .content h2,  .bds .content p {
			    text-align: center;
		    }

            .bds .content button{
                margin:0 auto;
                display:flex;
            }
	    }
	    .shorten {
		    /*width: 450px; !* Độ rộng của phần tử chứa văn bản( điền bên style của thẻ trực tiếp)*!*/
		    white-space: nowrap; /* Ngăn chữ bị ngắt dòng */
		    overflow: hidden; /* Ẩn phần chữ dư thừa */
		    text-overflow: ellipsis; /* Hiển thị dấu ba chấm (...) khi chữ bị cắt */
	    }
    </style>



</head>

<body>
    @include('client.header.nav')
{{-- main --}}
    @yield('main')
 {{-- end main --}}
    @include('client.footer.footer')
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    @yield('showhide')
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
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap" async defer></script>
{{-- gg map and hinh anh upload.js--}}

    <script src="https://maps.app.goo.gl/uxx2Xc9w7GcKigKt7"></script>

    <script>
        // Create a new Google Map object.
        const map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 10.0401, lng: 105.7364},
            zoom: 10
        });

        // Add a click listener to the map.
        map.addListener('click', function(event) {
            // Get the longitude and latitude of the click event.
            const lng = event.latLng.lng();
            const lat = event.latLng.lat();

            // Update the longitude and latitude input boxes.
            document.getElementById('longitude').value = lng;
            document.getElementById('latitude').value = lat;
        });
    </script>
    @stack('script')

</body>
</html>
