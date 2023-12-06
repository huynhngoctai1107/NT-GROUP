@extends('Client.Layout.Master')

@section('title')
    Tìm kiếm quanh đây- NT GROUP
@endsection
@php
    $title = "Chi Tiết Tin";
@endphp
@section('main')

    <div class="container-fluid p-0 mt-5">
        <form method="get" action="{{route('checkMap')}}">
            <div class="container mb-5">
                <div class="row">
                    <div class="form-floating col-md-3 mb-4 col-6">
                        <select id="type" name="kilometer" class="form-select section-form_input" name="kilometer">
                            <option value="" selected >-Chọn phạm vi cần tìm-</option>
                            <option value="5" {{($kilometer ?? old('kilometer')) == 5 ? "selected" : ""}} >5km</option>
                            <option value="10" {{($kilometer ?? old('kilometer')) == 10 ? "selected" : ""}}>10km</option>
                            <option value="15" {{($kilometer ?? old('kilometer'))== 15 ? "selected" : ""}}>15km</option>
                            <option value="20" {{($kilometer ?? old('kilometer')) == 20 ? "selected" : ""}}>20km</option>
                            <option value="30" {{($kilometer ?? old('kilometer'))== 30 ? "selected" : ""}}>30km</option>
                            <option value="50" {{($kilometer ?? old('kilometer')) == 50 ? "selected" : ""}}>50km</option>
                            <option value="100" {{($kilometer ?? old('kilometer')) == 100 ? "selected" : ""}}>Tất cả dữ liệu</option>

                        </select>
                        @error('kilometer')
                        <p class="text-danger text-center">
                            {{ $message }}
                        </p>
                        @enderror
                        <label for="type" class="section-form_label section-form_label--darkblue">
                            Phạm vi bất động sản
                        </label>
                    </div>
                    <div class="form-floating col-md-3  mb-4 col-6">
                        <select id="type" class="form-select section-form_input" name="price">
                            <option value="" checked>-Chọn mức giá cần tìm --</option>
                            @foreach($dataToPrice as $item)
                                <option value="{{$item->id}}" {{($price ?? old('price'))  == $item->id ? "selected" : ""}}> {{ $formatPrice($item->name_min) }} đến {{ $formatPrice($item->name_max) }}</option>
                            @endforeach
                            <option value="100" {{($price ?? old('price'))  == 100 ? "selected" : ""}}> Tất cả dữ liệu</option>

                        </select>
                        @error('price')
                        <p class="text-danger text-center">
                            {{ $message }}
                        </p>
                        @enderror
                        <label for="type" class="section-form_label section-form_label--darkblue">
                            Chọn giá
                        </label>
                    </div>
                    <div class="form-floating col-md-3 col-6">
                        <select id="type" class="form-select section-form_input" name="acreage">
                            <option value="" {{($acreage ?? old('acreage')) == "" ? "selected" : ""}} selected>-Chọn diện tích cần tìm-</option>
                            @foreach($dataToAcreage as $item)
                                <option value="{{$item->id}}" {{($acreage ?? old('acreage')) == $item->id ? "selected" : ""}}>  {{ $item->name_min }} m² đến {{ $item->name_max }} m²</option>
                            @endforeach
                            <option value="100" {{($acreage ?? old('acreage'))  == 100 ? "selected" : ""}}> Tất cả dữ liệu</option>

                        </select>

                        <label for="type" class="section-form_label section-form_label--darkblue">
                            Diện tích
                        </label>
                        @error('acreage')
                        <p class="text-danger text-center">
                            {{ $message }}
                        </p>
                        @enderror
                        <input type="hidden" value="" id="locationInput" name="location">
                    </div>

                    <div class="form-floating col-md-3 col-6">
                        <button class="button-86 col-12  px-5 py-3 " role="button">Tìm kiếm</button>
                    </div>
                </div>
            </div>


            @error('location')

            <marquee direction="right" id="geolocation" class="alert alert-warning text-center mb-0" >
                {{ $message }}
            </marquee>
            @enderror
            @if(session('notification'))
                <div class="alert alert-success text-center m-0" role="alert">
                    {{session('notification')}}
                </div>
            @endif
        </form>

        <div id="map" style="height: 800px"></div>
    </div>

@endsection

@push('script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_G4pm1e6qVGLB_t1_hYe_KDFc7ObLf6I&callback=initMap" type="text/javascript"></script>


    <script>
        const x = document.getElementById("geolocation");
        const locationInput = document.getElementById("locationInput");


        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
        else {
            x.innerHTML = "Định vị địa lý không được hỗ trợ bởi trình duyệt này. Xin vui lòng kiểm tra lại.";
        }


        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;

            // Hiển thị vị trí
            // // x.innerHTML = "Định vị địa lý không được hỗ trợ bởi trình duyệt này. Xin vui lòng kiểm tra lại. ";
            //     x.innerHTML = "Latitude: " + latitude + "<br>Longitude: " + longitude;

            // Truyền giá trị vào input form
            locationInput.value = latitude + "," + longitude;
        }
    </script>

    <script type="text/javascript">

        var locations = [
                @foreach ($locations as $location)
            [   '{{ $location->slug }}',
                '{{ $location->title }}',
                {{ $location->latitude }},
                {{ $location->longitude }},
            ],
            @endforeach
        ];


        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: new google.maps.LatLng(10.037314, 105.754181),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    var link = '<a href="/chi-tiet-tin/' + locations[i][0] + '">' + locations[i][1] + '</a>';


                    infowindow.setContent(link);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
@endpush
@push('css')
    <style>
		.section-form_label {
			color: #0a3c6d;
			font-weight: 600;
			margin-left: 10px;
		}


		.button-86 {
			all: unset;

			font-size: 16px;
			background: transparent;
			border: none;
			position: relative;
			color: #f0f0f0;
			cursor: pointer;
			z-index: 1;

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

@endpush

