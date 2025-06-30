<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ระบบเพิ่มข้อมูล</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>

</head>

<body>

    <div class="container mt-4">
        <div>
            <h1 class="text-center">ระบบบันทึกข้อมูลสมาชิก</h1>
        </div>

        <div class="mt-2">
            <div class="d-flex">
                <p class="m-2">
                    <a href="">ทั้งหมด</a>
                </p>
                <p class="m-2">
                    <a href="{{ route('addMember') }}">เพิ่ม</a>
                </p>
            </div>
        </div>


        {{-- แสดงผลข้อมูลตาราง --}}
        <div class="mt-3">
            @if ($member->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">ชื่อ-สกุล</th>
                            <th scope="col">วันเกิด</th>
                            <th scope="col">อายุ</th>
                            <th scope="col">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $item)
                            <tr>
                                <th scope="row">
                                    <img src="" alt="">
                                </th>
                                <td>
                                    {{ $item->title }}{{ $item->first_name }} {{ $item->last_name }}
                                </td>
                                <td>
                                    {{ $item->birth_date }}
                                </td>
                                <td>
                                    ยังไม่ระบุ
                                </td>
                                <td>
                                    <a href="{{ route('detailMember', ['id' => $item->id]) }}"
                                        class="btn btn-danger">แก้ไข</a>
                                    <button class="btn btn-danger">
                                        ลบ
                                    </button>
                                </td>

                                {{-- modal แสดงผลตอนที่เราจะกดลบ --}}
                                <div class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>ไม่มีข้อมูลสมาชิก</p>
            @endif
        </div>



    </div>



</body>

</html>
