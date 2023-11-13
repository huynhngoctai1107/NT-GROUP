@extends('client.layout.master')

@section('title')
    Tính lãi xuất ngân hàng - NT GROUP
@endsection
@php
    $title = "Tính lãi xuất ngân hàng";
@endphp

@section('main')
    <x-client.header.posttitle :title="$title"></x-client.header.posttitle>
    <div class="main_content mt-5">
        <div class="section-page section-padding">
            <div class="container">
                <x-tools.header.title title="Công cụ tính lãi suất vay mua bất động sản">
                    <x-slot name="resset">
                        <a href="{{route('resetTool')}}" type="button" class="btn text-primary  my-md-0" style=" font-size: 15px">
                            <i class="bi bi-arrow-clockwise"></i>Làm mới
                        </a>
                    </x-slot>
                </x-tools.header.title>
                <form method="get" action="{{route('calculate')}}">
                    <div class="col-md-12 mt-4">
                        <div class="row mt-3">
                            <div class="form-floating col-12 col-md-4    ">
                                <input type="number" name="principal" class="form-control inputValue type-number" step="1" placeholder="Nhập số tiền vay" value="{{($principal ?? old('principal')) ?? 0 }}">
                                <label for="principal" class="section-form_label section-form_label--darkblue ">
                                    Nhập số tiền vay
                                </label>
                                @error('principal')
                                <span class="error  text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-floating col-12 col-md-4 mt-4  mt-md-0 ">
                                <input type="number" name="loanTermMonths" class="form-control inputValue type-number" step="1" placeholder="Nhập thời hạn vay" value="{{($loanTermMonths ?? old('loanTermMonths') ) ?? 0 }}">
                                <label for="loanTermMonths" class="section-form_label section-form_label--darkblue ">
                                    Thời gian vay/tháng
                                </label>
                                @error('loanTermMonths')
                                <span class="error  text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-floating col-12 col-md-4 mt-4  mt-md-0">
                                <input type="number" name="annualInterestRate" class="form-control inputValue type-number" step="1" placeholder="Nhập lãi suất" value="{{($annualInterestRate ?? old('annualInterestRate')) ?? 0 }}">
                                <label for="annualInterestRate" class="section-form_label section-form_label--darkblue ">
                                    Lãi xuất %/năm
                                </label>
                                @error('annualInterestRate')
                                <span class="error  text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="text-center col-md-3 "></div>

                        </div>
                    </div>

                    <x-tools.header.title title="Chọn phương thức vay">

                    </x-tools.header.title>

                    <div class="row">
                        <div class="form-floating col-md-8 col-12">
                            <select id="package" name="method" class="form-select section-form_input">
                                <option value="" selected>-- Chọn phương thức --</option>
                                <option value="equalMonthlyPayments" {{($method?? old('method')) == "equalMonthlyPayments" ? "selected" : ''}}>Gốc cố định, lãi giảm dần</option>
                                <option value="monthlyReducedAmounts" {{($method?? old('method')) == "monthlyReducedAmounts" ? "selected" : ''}}>Gốc, lãi chia đều hàng tháng</option>
                            </select>
                            <label for="investment_level" class="section-form_label section-form_label--darkblue">
                                Phương thức vay
                            </label>
                            @error('method')
                            <span class="text-danger py-2">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-4 justify-content-center d-flex col-12 mt-4 mt-md-0">
                            {!! RecaptchaV3::field('calcaldate') !!}
                            <button type="submit" class="btn text-white col-6 col-md-12 " name="calcaldate" style="background: #e5ab3c; font-size: 18px" name="submit" value="Submit">Tính lãi suất</button>

                        </div>

                    </div>
                </form>

                <x-tools.header.title title="Thống kê">

                </x-tools.header.title>
                <div class="col-md-12">
                    <div class="tools-card card mt-4 ">
                            <div class="row">
                                <div class="col-12 col-md-7 mb-3 justify-content-center align-items-center ">
                                    <p class="text-dark p-3" style="font-weight: bold">Tính lãi xuất vay</p>
                                    <canvas id="pie-chart" class=" justify-content-center" style="height: 200px"></canvas>
                                </div>
                                <div class="chart-description col-12 col-md-5" style="margin-top: 50px">
                                    <div class="description-item d-flex align-items-md-center">
                                        <div class="title text-dark ms-2 ms-md-0">
                                            Số tiền vay:
                                        </div>
                                        <div class="value text-dark" style="margin-left: 35px; font-weight: bold">
                                            {{number_format($principal ?? 0)  }} <sup>đ</sup>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="description-item mt-2 d-flex align-items-md-center">
                                        <div class="title text-dark ms-2 ms-md-0">
                                            Số tiền trả tháng đầu:
                                        </div>
                                        <div class="value text-dark" style="margin-left: 45px; margin-top: 7px; font-weight: bold">
                                            @if(!empty($amortizationSchedule))
                                                @foreach($amortizationSchedule as $item)

                                                    {{ number_format($item['Interest']+ $item['Principal'])}}


                                                    <sup>đ</sup>
                                                    @break
                                                @endforeach
                                            @else
                                                {{ 0 }} <sup>đ</sup>
                                            @endif
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="description-item mt-2 d-flex align-items-md-center">
                                        <div class="title text-dark ms-2 ms-md-0">
                                            Tổng lãi phải trả:
                                        </div>
                                        <div class="value text-dark" style="margin-left: 45px; margin-top: 7px; font-weight: bold">
                                            {{ $sumtotoalInterest == 0 ? 0 : number_format($sumtotoalInterest -  $principal) }}
                                            <sup>đ</sup>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="description-item d-flex align-items-md-center mb-3">
                                        <div class="title text-dark ms-2 ms-md-0 ">
                                            Tổng gốc và lãi phải trả:
                                        </div>
                                        <div class="value px-4 text-danger" style="font-weight: bold">
                                            {{ $sumtotoalInterest == 0 ? 0 : number_format($principal  +  ($sumtotoalInterest -  $principal)) }}
                                            <sup>đ</sup>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-12 border-0">

                    <div class="collapse show" id="table-result">
                        <div class="table-responsive mt-5">
                            <table class="table table-bordered tools-table">
                                <thead class="border-bottom-0">
                                <tr class="text-center" style="background:#e5ab3c; color: white">
                                    <th>
                                        Kỳ hạn
                                    </th>
                                    <th>
                                        Lãi phải trả (VNĐ)
                                    </th>
                                    <th>
                                        Gốc phải trả (VNĐ)
                                    </th>
                                    <th>
                                        Số tiền phải trả (VNĐ)
                                    </th>
                                    <th>
                                        Số tiền còn lại (VNĐ)
                                    </th>
                                </tr>

                                </thead>
                                <tbody>
                                @if(!empty($amortizationSchedule))
                                        @foreach ($amortizationSchedule as $payment)
                                        <tr class="text-center">
                                            <th style="border-width: 0 1px !important;">
                                                {{number_format( $payment['Month'])}}
                                            </th>
                                            <th style="border-width: 0 1px !important;">
                                                {{ number_format($payment['Interest'])}}

                                            </th>
                                            <th>
                                                {{number_format($payment['Principal'])}}

                                            </th>
                                            <th style="border-width: 0 1px !important;">
                                                {{ number_format($payment['Interest']+ $payment['Principal'])}}

                                            </th>
                                            <th style="border-width: 0 1px !important;">
                                                @php
                                                        @endphp
                                                {{ number_format($payment['RemainingPrincipal'] ?? 0)}}
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Gốc cần trả: ", "Lãi cần trả:",],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#e5ab3c",],
                    data: [{{$principal ?? 50}}, {{($sumtotoalInterest -  $principal) ?? 50}}],
                }]
            },
        });
    </script>

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