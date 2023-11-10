<div class="main_content">
    <div class="section-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <div class="section-heading">
                        <h3 class="title fw-700">
                            Công cụ tính lãi suất vay mua bất động sản </h3>
                    </div>
                </div>

                <div class="col-md-6 mt-4">
                    <div class="tools-card card">
                        <div class="card-body p-4">
                                <div class="tools-range">
                                    <div class="form-floating col-12 mt-3 ">
                                        <input type="number" name="principal" wire:model.live="principal" class="form-control inputValue type-number" step="1" placeholder="Nhập số tiền vay" value="1">
                                        <label for="wide" class="section-form_label section-form_label--darkblue text-dark">
                                            Nhập số tiền vay
                                        </label>
                                        @error('principal')
                                        <span class="error  text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-floating col-12 mt-3 ">
                                        <input type="number" name="loanTermMonths" wire:model.live="loanTermMonths" class="form-control inputValue type-number" step="1" placeholder="Nhập thời hạn vay" value="1">
                                        <label for="wide" class="section-form_label section-form_label--darkblue text-dark">
                                            Thời gian vay/tháng
                                        </label>
                                        @error('loanTermMonths')
                                        <span class="error  text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-floating col-12 mt-3 ">
                                        <input type="number" name="annualInterestRate" wire:model.live="annualInterestRate" class="form-control inputValue type-number" step="1" placeholder="Nhập thời hạn vay" value="1">
                                        <label for="annualInterestRate" class="section-form_label section-form_label--darkblue text-dark">
                                            Lãi xuất%/năm
                                        </label>
                                        @error('annualInterestRate')
                                        <span class="error  text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn text-white" wire:click="calculateAmortizationSchedule"  style="background: #e5ab3c" name="submit" value="Submit">Tính lãi xuất</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tools-card card mt-4">
                        <div class="card-header bg-white">
                            <div class="d-flex align-items-md-center flex-column flex-md-row">
                                <div class="form-check form-check-inline ">
                                    <input type="radio" class="form-check-input shadow-none optionLS" wire:click="monthlyReducedAmounts" {{$monthlyReducedAmount == TRUE ? "checked" : ""}}    name="check" id="1" value="1">
                                    <label    class="form-check-label text-dark" for="1">Số tiền trả theo dư nợ giảm
                                        dần</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input  type="radio" wire:click="equalMonthlyPayments" {{$equalMonthlyPayment == TRUE ? "checked" : ""}}  class="form-check-input shadow-none optionLS"  name="check" id="2" value="2">
                                    <label role="button"  class="form-check-label text-dark" for="2">Số tiền trả đều hàng tháng</label>
                                </div>
                            </div>
                            <span class="error  text-danger">{{ $error ?? "" }}</span>
                        </div>
                        <div class="card-body p-4">
                            <div class="tools-chart d-flex col-12">
                                <div align="center" class="col-7">
                                    <p class="text-dark text-center mb-0" style="font-weight: bold">Tính lãi xuất vay</p>
                                    <canvas id="pie-chart" height="210"></canvas>
                                </div>
                                <div class="chart-description col-5" style="margin-top: 50px">
                                    <div class="description-item d-flex align-items-md-center">
                                        <div class="title text-dark">
                                            Gốc cần trả
                                        </div>
                                        <div class="value text-dark" style="margin-left: 35px; font-weight: bold">
{{--                                            {{number_format($this->principal) ?? 0 }} VNĐ--}}
                                        </div>
                                    </div>
                                    <div class="description-item mt-2 d-flex align-items-md-center">
                                        <div class="title text-dark">
                                            Lãi cần trả
                                        </div>
                                        <div class="value text-dark" style="margin-left: 45px; margin-top: 7px; font-weight: bold">
{{--                                            {{ number_format($this->totalInterest) ?? 0 }} VNĐ--}}
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="description-item d-flex align-items-md-center">
                                        <div class="title text-dark">
                                            Tiền trả hằng tháng
                                        </div>
                                        <div class="value px-4 text-danger" style="font-weight: bold">
{{--                                            {{ number_format($this->monthlyPayment ?? 0)}} VNĐ--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 border-0">
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-dark" name="submit" value="Submit">Xem kết quả</button>
                    </div>
                    <div class="collapse show" id="table-result">
                        <div class="table-responsive mt-5">
                            <table class="table table-bordered tools-table">
                                <thead class="border-bottom-0">
                                <tr class="text-center" style="background:#e5ab3c; color: white">
                                    <th>
                                        Số kỳ trả
                                    </th>
                                    <th>
                                        Nợ đầu kỳ (VNĐ)
                                    </th>
                                    <th>
                                        Gốc phải trả (VNĐ)
                                    </th>
                                    <th>
                                        Lãi phải trả (VNĐ)
                                    </th>
                                    <th>
                                        Gốc + Lãi (VNĐ)
                                    </th>
                                </tr>
                                <tr></tr>
                                </thead>
                                @foreach ($amortizationSchedule as $payment)
                                    <tr class="text-center" style="background: #f3f4f6; color:#e5ab3c">
                                        <th>
                                            {{ $payment['$loanTermMonths']}}
                                        </th>
                                        <th id="rs_interest_total">
                                            {{ $payment['$principal']}}
                                        </th>
                                        <th id="rs_total">
                                            {{ $payment['$principal']}}
                                        </th>
                                        <th id="rs_total">

                                        </th>
                                        <th id="rs_total">

                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div
@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Gốc cần trả", "Lãi cần trả",],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["#3e95cd", "#e5ab3c",],
                    data: [200,600],
                }]
            },
        });
    </script>
@endpush<!-- END MAIN CONTENT -->
