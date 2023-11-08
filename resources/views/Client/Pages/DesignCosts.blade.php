@extends('client.layout.master')

@section('title')
    Bất động sản - NT GROUP
@endsection
@php
    $title = "Test";
@endphp
@section('main')

<livewire:client.pages.desgin-costs></livewire:client.pages.desgin-costs>

@endsection

@push('script')
    <script>
        function showHideOptions() {
            var packageSelect = document.getElementById("package");
            var architectureDiv = document.getElementById("architecture");
            var interiorDiv = document.getElementById("interior");

            var selectedValue = packageSelect.value;

            if (selectedValue === "1") {
                architectureDiv.style.display = "block";
                interiorDiv.style.display = "none";
            } else if (selectedValue === "2") {
                architectureDiv.style.display = "none";
                interiorDiv.style.display = "block";
            } else {
                architectureDiv.style.display = "none";
                interiorDiv.style.display = "none";
            }
        }
    </script>
@endpush
@push('css')

    <style>
	    .section-form_label{
            color:#0a3c6d ;
            font-weight:600;
        }
		.button-42 {
			background-color: #c99736;
			background-image: linear-gradient(-180deg, #c99736, #c99736);
			border-radius: 6px;
			box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
			color: #FFFFFF;
			cursor: pointer;
			display: inline-block;
			font-family: Inter,-apple-system,system-ui,Roboto,"Helvetica Neue",Arial,sans-serif;
			height: 40px;
			line-height: 40px;
			outline: 0;
			overflow: hidden;
			padding: 0 20px;
			pointer-events: auto;
			position: relative;
			text-align: center;
			touch-action: manipulation;
			user-select: none;
			-webkit-user-select: none;
			vertical-align: top;
			white-space: nowrap;

			z-index: 9;
			border: 0;
			transition: box-shadow .2s;
		}

		.button-42:hover {
			box-shadow: rgba(253, 76, 0, 0.5) 0 3px 8px;
		}
    </style>

@endpush