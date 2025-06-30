<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>เพิ่มสมาชิก</title>
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
            <h1 class="text-center">สำหรับเพิ่มสมาชิก</h1>
        </div>

        <div class="mt-2">
            <div class="d-flex">
                <p class="m-2">
                    <a href="/">ทั้งหมด</a>
                </p>
                <p class="m-2">
                    <a href="">เพิ่ม</a>
                </p>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('addMemberSaved') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">รูปภาพ</label>
                    <div class="col-sm-10">
                        <input type="file" name="profile_image">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">คำนำหน้า</label>
                    <div class="col-sm-10">
                        <select name="title" name="title">
                            <option value="" selected disabled>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="first_name" class="col-sm-2 col-form-label">ชื่อ</label>
                    <div class="col-sm-10">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="ชื่อ"
                            required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="last_name" class="col-sm-2 col-form-label">นามสกุล</label>
                    <div class="col-sm-10">
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="นามสกุล"
                            required />
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="birth_date" class="col-sm-2 col-form-label">วันเกิด</label>
                    <div class="col-sm-10">
                        <input type="date" name="birth_date" id="birth_date" class="form-control" required />
                    </div>
                </div>
            </div>

            <button type="" class="btn btn-danger d-flex">
                บันทึก
            </button>


        </form>



    </div>



</body>

</html>
