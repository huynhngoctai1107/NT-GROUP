<div class="post mb-5 mt-3">
    <div class="d-flex justify-content-between">
        <select style="width: 40%;" class="form-select" id="month-select-user" aria-label="Default select example" onchange="handleFilterSelectUser()">
            <option selected disabled>Chọn tháng</option>
            @for($month = 1; $month <= 12; $month++)
                <option value="{{$month}}">Tháng {{$month}}</option>
            @endfor
        </select>
        <select style="width: 40%;" class="form-select" id="year-select-user" aria-label="Default select example" onchange="handleFilterSelectUser()">
            <option selected disabled>Chọn năm</option>
            @php
                $years = [];
            @endphp
            @foreach($userchart as $item)
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
    <div id="user-chart"></div>
    <div id="total-user"></div>
</div>

{{-- Charts Post --}}
<script>
    var dateData = [
        @foreach($userchart as $item)
            '{{ $item->date }}',
        @endforeach
    ];

    var userData = [
        @foreach($userchart as $item)
                @php
                    $found = false;
                @endphp
                @foreach($userchart as $data)
                @if(date("Y-m-d", strtotime($data->date)) === $item->date)
                {{$data->user_count}},
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

    function calculateTotalUsers(userData) {
        var totalUsers = userData.reduce(function (total, userCount) {
            return total + userCount;
        }, 0);
        return totalUsers;
    }

    function handleFilterSelectUser() {
        var yearSelect = document.getElementById("year-select-user");
        var monthSelect = document.getElementById("month-select-user");
        var selectedYear = yearSelect.value;
        var selectedMonth = monthSelect.value;

        var filteredDateData = [];
        var filteredUserData = [];

        for (var i = 0; i < dateData.length; i++) {
            var date = new Date(dateData[i]);
            if (date.getFullYear().toString() === selectedYear && (date.getMonth() + 1).toString() === selectedMonth) {
                filteredDateData.push(dateData[i]);
                filteredUserData.push(userData[i]);
            }
        }

        updateUserChartData(filteredDateData, filteredUserData);

        // Tính tổng số tài khoản
        var totalUsers = calculateTotalUsers(filteredUserData);

        // Hiển thị kết quả trong phần tử 'total-user'
        var totalUsersElement = document.getElementById("total-user");
        totalUsersElement.innerHTML = "Tổng số tài khoản trong tháng: " + totalUsers;

    }

    function updateUserChartData(dateData, userData) {
        Highcharts.chart('user-chart', {
            title: {
                text: 'Thống Kê Tài Khoản',
                align: 'left'
            },
            yAxis: {
                title: {
                    text: 'Số lượng tài khoản'
                }
            },
            xAxis: {
                categories: dateData.map(function (date) {
                    return new Date(date).toLocaleDateString('en-GB', { day: 'numeric', month: 'numeric' });
                })
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            series: [{
                name: 'Tài Khoản',
                data: userData
            },
            ],
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
