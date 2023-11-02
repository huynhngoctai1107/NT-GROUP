<div class="post mb-5">
    <div class="d-flex justify-content-between">
        <select style="width: 40%" class="form-select" id="month-select-transition" aria-label="Default select example" onchange="handleFilterSelectTransition()">
            <option selected disabled>Chọn tháng</option>
            @for($month = 1; $month <= 12; $month++)
                <option value="{{$month}}">Tháng {{$month}}</option>
            @endfor
        </select>
        <select style="width: 40%" class="form-select" id="year-select-transition" aria-label="Default select example" onchange="handleFilterSelectTransition()">
            <option selected disabled>Chọn năm</option>
            @php
                $years = [];
            @endphp
            @foreach($dateT as $item)
                @php
                    $date = \Carbon\Carbon::parse($item->date);
                    $year = $date->year;
                    if (!in_array($year, $years)) $years[] = $year;
                @endphp
            @endforeach
            @foreach($years as $year)
                <option value="{{$year}}">Năm {{$year}}</option>
            @endforeach
        </select>
    </div>
    <div id="transition"></div>
    <div id="total-transition"></div>
</div>
{{--Charts Transition--}}
<script>
    var datePayData = [
        @foreach($dateT as $item)
            '{{ $item->date }}',
        @endforeach
    ];

    var PayData = [
        @foreach($dateT as $item)
                @php
                    $found = false;
                @endphp
                @foreach($transitionPay as $data)
                @if(date("Y-m-d", strtotime($data->date)) === $item->date)
                {{$data->transactions_sum}},
        @php
            $found = true;
            break;
        @endphp
                @endif
                @endforeach
                @if(!$found)
            0,
        @endif
        @endforeach
    ];

    var MuaData = [
        @foreach($dateT as $item)
                @php
                    $found = false;
                @endphp
                @foreach($transitionMua as $data)
                @if(date("Y-m-d", strtotime($data->date)) === $item->date)
                {{$data->transactions_sum}},
        @php
            $found = true;
            break;
        @endphp
                @endif
                @endforeach
                @if(!$found)
            0,
        @endif
        @endforeach
    ];

    function calculateTotalPay(PayData) {
        var totalPay = 0;

        for (var i = 0; i < PayData.length; i++) {
            totalPay += PayData[i];
        }

        return totalPay;
    }

    function handleFilterSelectTransition() {
        var yearSelect = document.getElementById("year-select-transition");
        var monthSelect = document.getElementById("month-select-transition");
        var selectedYear = yearSelect.value;
        var selectedMonth = monthSelect.value;

        var filteredDateDataTransition = [];
        var filteredPayData = [];
        var filteredMuaData = [];

        for (var i = 0; i < datePayData.length; i++) {
            var date = new Date(datePayData[i]);
            if (date.getFullYear().toString() === selectedYear && (date.getMonth() + 1).toString() === selectedMonth) {
                filteredDateDataTransition.push(datePayData[i]);
                filteredPayData.push(PayData[i]);
                filteredMuaData.push(MuaData[i]);
            }
        }

        updateChartDataTransition(filteredDateDataTransition, filteredPayData, filteredMuaData);

        // Tính tổng số bài viết
        var totalPay = calculateTotalPay(filteredPayData);
        var totalMua = calculateTotalPay(filteredMuaData);

        // Hiển thị kết quả trong phần tử 'total-posts'
        var totalPayElement = document.getElementById("total-transition");
        totalPayElement.innerHTML = "Tổng số tiền nạp trong tháng: " + totalPay.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' }) + "<br>Tổng số tiền mua trong tháng: " + totalMua.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
    }

    function updateChartDataTransition(datePayData, PayData, MuaData) {
        Highcharts.chart('transition', {
            title: {
                text: 'Thống Kê Chi Tiêu',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Số Tiền'
                },
                labels: {
                    formatter: function () {
                        return this.value.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                    }
                }
            },

            xAxis: {
                categories: datePayData.map(function (date) {
                    return new Date(date).toLocaleDateString('en-GB', { day: 'numeric', month: 'numeric' });
                })
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            series: [{
                name: 'Tiền Nạp',
                data: PayData
            }, {
                name: 'Tiền Mua',
                data: MuaData
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    }
</script>