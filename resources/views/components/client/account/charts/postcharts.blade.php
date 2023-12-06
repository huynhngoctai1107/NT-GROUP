@php use Carbon\Carbon; @endphp
<div>
<div class="post mb-5 mt-3">
    <div class="d-flex justify-content-between">
        <select style="width: 40%;" class="form-select" id="month-select" aria-label="Default select example" onchange="handleFilterSelectPost()">
            <option selected disabled>Chọn tháng</option>
            @for($month = 1; $month <= 12; $month++)
                <option value="{{$month}}">Tháng {{$month}}</option>
            @endfor
        </select>
        <select style="width: 40%;" class="form-select" id="year-select" aria-label="Default select example" onchange="handleFilterSelectPost()">
            <option selected disabled>Chọn năm</option>
            @php
                $years = [];
            @endphp
            @foreach($dates as $item)
                @php
                    $date = Carbon::parse($item->date);
                    $year = $date->year;
                    if (!in_array($year, $years)) $years[] = $year;
                @endphp
            @endforeach
            @foreach($years as $year)
                <option value="{{$year}}">Năm {{$year}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <div id="charts"></div>
        <div id="total-posts"></div>
    </div>
</div>
</div>
{{--    Charts Post--}}
<script>
    var dateData = [
        @foreach($dates as $item)
            '{{ $item->date }}',
        @endforeach
    ];

    var vipData = [
        @foreach($dates as $item)
                @php
                    $found = FALSE;
                @endphp
                @foreach($vip as $data)
                @if(date("Y-m-d", strtotime($data->date)) === $item->date)
                {{$data->post_count}},
        @php
            $found = TRUE;
            break;
        @endphp
                @endif
                @endforeach
                @if(!$found)
            0,
        @endif
        @endforeach
    ];

    var chartsData = [
        @foreach($dates as $item)
                @php
                    $found = FALSE;
                @endphp
                @foreach($charts as $data)
                @if(date("Y-m-d", strtotime($data->date)) === $item->date)
                {{$data->post_count}},
        @php
            $found = TRUE;
            break;
        @endphp
                @endif
                @endforeach
                @if(!$found)
            0,
        @endif
        @endforeach
    ];

    function calculateTotalPosts(postsData) {
        var totalPosts = 0;

        for (var i = 0; i < postsData.length; i++) {
            totalPosts += postsData[i];
        }

        return totalPosts;
    }

    function handleFilterSelectPost() {
        var yearSelect = document.getElementById("year-select");
        var monthSelect = document.getElementById("month-select");
        var selectedYear = yearSelect.value;
        var selectedMonth = monthSelect.value;

        var filteredDateData = [];
        var filteredVipData = [];
        var filteredChartsData = [];

        for (var i = 0; i < dateData.length; i++) {
            var date = new Date(dateData[i]);
            if (date.getFullYear().toString() === selectedYear && (date.getMonth() + 1).toString() === selectedMonth) {
                filteredDateData.push(dateData[i]);
                filteredVipData.push(vipData[i]);
                filteredChartsData.push(chartsData[i]);
            }
        }

        updateChartData(filteredDateData, filteredVipData, filteredChartsData);

        // Tính tổng số bài viết
        var totalVipPosts = calculateTotalPosts(filteredVipData);
        var totalChartsPosts = calculateTotalPosts(filteredChartsData);

        // Hiển thị kết quả trong phần tử 'total-posts'
        var totalPostsElement = document.getElementById("total-posts");
        totalPostsElement.innerHTML = "Tổng số bài viết VIP trong tháng: " + totalVipPosts + "<br>Tổng số bài viết thường trong tháng: " + totalChartsPosts;

    }

    function updateChartData(dateData, vipData, chartsData) {
        Highcharts.chart('charts', {
            title: {
                text: 'Thống Kê Bài Viết',
                align: 'left'
            },

            yAxis: {
                title: {
                    text: 'Số lượng bài viết'
                }
            },

            xAxis: {
                categories: dateData.map(function (date) {
                    return new Date(date).toLocaleDateString('en-GB', {day: 'numeric', month: 'numeric'});
                })
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            series: [{
                name: 'Tin VIP',
                data: vipData
            }, {
                name: 'Tin Thường',
                data: chartsData
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


