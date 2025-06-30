<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>รายงานผล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">รายงานผล</h1>

        <div class="mt-2 d-flex gap-2">
            <a href="{{ route('welcome') }}" class="btn btn-primary">ทั้งหมด</a>
            <a href="{{ route('addMember') }}" class="btn btn-success">เพิ่ม</a>
            <a href="{{ route('report') }}" class="btn btn-success">รายงาน</a>
        </div>

    
      

    </div>
</body>

</html>
