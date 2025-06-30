<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>รายงานผล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <div class="container mt-4 mb-4">
        <h1 class="text-center">รายงานผล</h1>

        <div class="mt-2 d-flex gap-2">
            <a href="{{ route('welcome') }}" class="btn btn-primary">ทั้งหมด</a>
            <a href="{{ route('addMember') }}" class="btn btn-success">เพิ่ม</a>
            <a href="{{ route('report') }}" class="btn btn-success">รายงาน</a>
        </div>


        <h3>รายงานจำนวนสมาชิกตามอายุ</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>อายุ</th>
                    <th>จำนวนสมาชิก</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $age => $total)
                    <tr>
                        <td>{{ $age }} ปี</td>
                        <td>{{ $total }} คน</td>
                    </tr>
                @endforeach
            </tbody>
        </table>






        <div class="mt-2">
            <h2 class="mb-4 text-center">กราฟจำนวนสมาชิกตามอายุ</h2>
            <canvas id="ageChart" width="400" height="150"></canvas>
            <script>
                const ctx = document.getElementById('ageChart').getContext('2d');
                const ageChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: @json($labels), //แกนx
                        datasets: [{
                            label: 'จำนวนสมาชิก',
                            data: @json($totals), //แกนy
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true,
                                stepSize: 1
                            }
                        }
                    }
                });
            </script>
        </div>




    </div>
</body>

</html>
