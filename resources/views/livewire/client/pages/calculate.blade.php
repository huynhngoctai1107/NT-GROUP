<div class="main_content">
    <div class="section-page section-padding">
        <div class="container">
            <div class="col-12 mt-4">

            </div>
            <div class="p-0 rounded-0 flex-column my-4 mt-md-5 ">
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <h3 class="col-md-6 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                        </h3>
                    <button wire:click="reset_input" type="button" class="btn text-primary pe-0" style=" font-size: 15px">
                        <i class="bi bi-arrow-clockwise"></i>Làm mới
                    </button>
                </div>
                <hr class="col-12 mt-0">
            </div>
            <form method="post" wire:submit="calculate">
                <div class="col-md-12 mt-4">
                    <div class="row mt-3">
                        <div class="form-floating col-12 col-md-4    ">
                            <input type="number" name="principal" wire:model.live="principal" class="form-control inputValue type-number" step="1" placeholder="Nhập số tiền vay" value="{{$principal ?? 0 }}">
                            <label for="principal" class="section-form_label section-form_label--darkblue ">
                                Nhập số tiền vay
                            </label>
                            @error('principal')
                            <span class="error  text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-floating col-12 col-md-4 mt-4  mt-md-0 ">
                            <input type="number" name="loanTermMonths" wire:model.live="loanTermMonths" class="form-control inputValue type-number" step="1" placeholder="Nhập thời hạn vay" value="{{$loanTermMonths ?? 1 }}">
                            <label for="loanTermMonths" class="section-form_label section-form_label--darkblue ">
                                Thời gian vay/tháng
                            </label>
                            @error('loanTermMonths')
                            <span class="error  text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-floating col-12 col-md-4 mt-4  mt-md-0">
                            <input type="number" name="annualInterestRate" wire:model="annualInterestRate" class="form-control inputValue type-number" step="1" placeholder="Nhập lãi suất" value="{{$annualInterestRate ?? 0 }}">
                            <label for="annualInterestRate" class="section-form_label section-form_label--darkblue ">
                                Lãi xuất %/năm
                            </label>
                            @error('annualInterestRate')
                            <span class="error  text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="text-center col-md-3 "></div>

                    </div>
                </div>
                <div class="p-0 rounded-0 flex-column my-4 ">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <h3 class="col-md-3 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                            Chọn phương thức vay</h3>
                    </div>
                    <hr class="col-12 mt-0">
                </div>
                <div class="row">
                    <div class="form-floating col-md-8 col-12">
                        <select id="package" wire:model="method" name="method" class="form-select section-form_input">
                            <option value="" selected>-- Chọn phương thức --</option>
                            <option value="equalMonthlyPayments" {{$method== "equalMonthlyPayments" ? "selected" : ''}}>Gốc cố định, lãi giảm dần</option>
                            <option value="monthlyReducedAmounts" {{$method== "monthlyReducedAmounts" ? "selected" : ''}}>Gốc, lãi chia đều hàng tháng</option>
                        </select>
                        <label for="investment_level" class="section-form_label section-form_label--darkblue">
                            Phương thức vay
                        </label>
                        @error('method')
                        <span class="text-danger py-2">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="col-md-4 justify-content-center d-flex col-12 mt-4 mt-md-0">
                        <button type="submit" class="btn text-white col-6 col-md-12 " style="background: #e5ab3c; font-size: 18px" name="submit" value="Submit">Tính lãi xuất</button>

                    </div>

                </div>
            </form>

            <div class="p-0 rounded-0 flex-column my-4 ">
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <h3 class="col-md-2 col-12 text-uppercase justify-content-center mb-0 align-items-center d-flex" style="height: 50px; font-size: 20px; color:white; background-color: #c99736;">
                        Thống kê</h3>

                </div>
                <hr class="col-12 mt-0">
            </div>
            <div class="col-md-12">
                <div class="tools-card card mt-4">


                    <div class="card-body p-4">
                        <div class="tools-chart d-flex col-12">
                            <div align="center" class="col-7">
                                <p class="text-dark text-center mb-0" style="font-weight: bold">Tính lãi xuất vay</p>
                                                                <canvas id="pie-chart" height="210"></canvas>
                            </div>
                            <div class="chart-description col-5" style="margin-top: 50px">
                                <div class="description-item d-flex align-items-md-center">
                                    <div class="title text-dark">
                                        Số tiền vay
                                    </div>
                                    <div class="value text-dark" style="margin-left: 35px; font-weight: bold">
                                        {{number_format($principal) ?? 0 }} <sup>đ</sup>
                                    </div>
                                </div>
                                <hr/>
                                <div class="description-item mt-2 d-flex align-items-md-center">
                                    <div class="title text-dark">
                                        Số tiền trả tháng đầu
                                    </div>
                                    <div class="value text-dark" style="margin-left: 45px; margin-top: 7px; font-weight: bold">
                                        @if(isset($amortizationSchedule))
                                            @foreach($amortizationSchedule as $item)
                                                {{ number_format($item['EMI']) ?? 0 }} <sup>đ</sup>
                                                @break
                                            @endforeach
                                        @else
                                            {{ 0 }} <sup>đ</sup>
                                        @endif
                                    </div>
                                </div>
                                <hr/>
                                <div class="description-item mt-2 d-flex align-items-md-center">
                                    <div class="title text-dark">
                                        Tổng lãi phải trả
                                    </div>
                                    <div class="value text-dark" style="margin-left: 45px; margin-top: 7px; font-weight: bold">
                                        {{ $sumtotoalInterest == 0 ? 0 : number_format($sumtotoalInterest -  $principal) }}
                                        <sup>đ</sup>
                                    </div>
                                </div>
                                <hr/>
                                <div class="description-item d-flex align-items-md-center">
                                    <div class="title text-dark">
                                        Tổng số tiền gốc và lãi phải trả
                                    </div>
                                    <div class="value px-4 text-danger" style="font-weight: bold">
                                        {{ $sumtotoalInterest == 0 ? 0 :number_format($principal  +  ($sumtotoalInterest -  $principal)) }}
                                        <sup>đ</sup>
                                    </div>
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
                                            {{ number_format($payment['Principal'])}}
                                        </th>
                                        <th>
                                            {{ number_format($payment['EMI'])}}
                                        </th>
                                        <th style="border-width: 0 1px !important;">
                                            {{ number_format($payment['Interest'])}}
                                        </th>
                                        <th style="border-width: 0 1px !important;">
                                            {{ number_format($payment['RemainingPrincipal'])}}
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["Gốc cần trả", "Lãi cần trả",],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#e5ab3c",],
                data: [{{$principal ?? 50}}, {{$sumtotoalInterest ?? $principal}}],
            }]
        },
    });
</script>
