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
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
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
                            <th scope="col">วันที่ปรับปรุงล่าสุด</th>
                            <th scope="col">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($member as $item)
                            <tr>
                                <th scope="row">
                                    <img src="{{ asset('storage/' . $item->profile_image) }}" alt="รูปโปรไฟล์"
                                        style="max-width:50px;">
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
                                    {{$item->updated_at}}
                                </td>

                                <td>
                                    <a href="{{ route('detailMember', ['id' => $item->id]) }}"
                                        class="btn btn-danger">แก้ไข</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#DeleteModal{{ $item->id }}">
                                        ลบ
                                    </button>

                                </td>

                                {{-- modal แสดงผลตอนที่เราจะกดลบ --}}

                                <!-- Modal -->
                                <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ...

                                            </div>
                                            <div class="modal-footer">

                                                <form action="{{ route('deleteMember', ['id' => $item->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                    <button type="submit" class="btn btn-primary">ยันยันการลบ</button>
                                                </form>
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
