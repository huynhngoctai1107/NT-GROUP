@extends('client.layout.master')

@section('title')
    Tính lãi xuất ngân hàng - NT GROUP
@endsection
@php
    $title = "Tính lãi xuất ngân hàng";
@endphp

@section('main')
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
    <livewire:client.pages.calculate></livewire:client.pages.calculate>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

@endpush<!-- END MAIN CONTENT -->
@push('css')

    <style>
		.section-form_label {


			margin-left: 10px;

			color: #0a3c6d;
			font-weight: 600;
		}
		.button-42 {
			background-color: #c99736;
			background-image: linear-gradient(-180deg, #c99736, #c99736);
			border-radius: 6px;
			box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
			color: #FFFFFF;
			cursor: pointer;
			display: inline-block;
			font-family: Inter, -apple-system, system-ui, Roboto, "Helvetica Neue", Arial, sans-serif;
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