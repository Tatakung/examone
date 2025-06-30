<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>ระบบเพิ่มข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center">ระบบบันทึกข้อมูลสมาชิก</h1>

        <div class="mt-2 d-flex gap-2">
            <a href="{{ route('welcome') }}" class="btn btn-primary">ทั้งหมด</a>
            <a href="{{ route('addMember') }}" class="btn btn-success">เพิ่ม</a>
            <a href="{{ route('report') }}" class="btn btn-success">รายงาน</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        {{-- ฟอร์มค้นหา --}}
        <form action="{{ route('welcome') }}" method="GET" class="row g-2 mt-3">
            <div class="col-md-3">
                <input type="text" name="first_name" class="form-control" placeholder="ชื่อ"
                    value="{{ request('first_name') }}" />
            </div>
            <div class="col-md-3">
                <input type="text" name="last_name" class="form-control" placeholder="นามสกุล"
                    value="{{ request('last_name') }}" />
            </div>
            <div class="col-md-3">
                <select name="age_order" class="form-select">
                    <option value="">เรียงอายุ</option>
                    <option value="asc" {{ request('age_order') == 'asc' ? 'selected' : '' }}>น้อยไปมาก</option>
                    <option value="desc" {{ request('age_order') == 'desc' ? 'selected' : '' }}>มากไปน้อย</option>
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-danger w-100">ค้นหา</button>
            </div>
        </form>

        {{-- ตารางแสดงข้อมูล --}}
        <div class="mt-4">
            @if ($members->count() > 0)
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>รูปภาพ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>วันเกิด</th>
                            <th>อายุ</th>
                            <th>วันที่ปรับปรุงล่าสุด</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $item)
                            <tr>
                                <td>
                                    @if ($item->profile_image)
                                        <img src="{{ asset('storage/' . $item->profile_image) }}" alt="รูปโปรไฟล์"
                                            style="max-width: 50px;" />
                                    @else
                                        ไม่มีรูป
                                    @endif
                                </td>
                                <td>{{ $item->title }} {{ $item->first_name }} {{ $item->last_name }}</td>
                                <td>{{ $item->birth_date }}</td>
                                <td>
                                    {{-- คำนวณอายุจากวันเกิด --}}
                                    {{ \Carbon\Carbon::parse($item->birth_date)->age }} ปี
                                </td>
                                <td>{{ $item->updated_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('detailMember', ['id' => $item->id]) }}"
                                        class="btn btn-warning btn-sm">แก้ไข</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#DeleteModal{{ $item->id }}">
                                        ลบ
                                    </button>

                                    {{-- Modal ลบ --}}
                                    <div class="modal fade" id="DeleteModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="DeleteModalLabel{{ $item->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="DeleteModalLabel{{ $item->id }}">
                                                        ยืนยันการลบ
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณแน่ใจที่จะลบ {{ $item->title }} {{ $item->first_name }}
                                                    {{ $item->last_name }} หรือไม่?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('deleteMember', ['id' => $item->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">ยกเลิก</button>
                                                        <button type="submit" class="btn btn-danger">ลบเลย</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- paginate ถ้าใช้ paginate --}}
                {{-- {{ $members->links() }} --}}
            @else
                <p>ไม่มีข้อมูลสมาชิก</p>
            @endif
        </div>
    </div>
</body>

</html>
