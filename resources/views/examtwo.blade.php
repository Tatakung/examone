<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEMPLE BY REGION</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
        }

        #temple {
            padding: 40px;
            text-align: center;
        }

        .row-custom {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }

        .wat {
            padding: 20px;
            text-align: center;
        }

        p {
            text-align: center;
        }

        #imagewatthai.imagewatthai2 {
            width: 300px;
            height: 300px;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body>

    <div id="temple">
        <h1>TEMPLE BY REGION</h1>
        <p>ค้นหาข้อมูลวัดตามภูมิภาค</p>
    </div>

    <div class="row-custom">
        <div id="watthai" class="wat">
            <img id="imagewatthai" class="imagewatthai2"
                src="https://cdn.pixabay.com/photo/2020/04/13/18/45/temple-5039707_1280.jpg" alt="ภาคเหนือ">
            <p>ภาคเหนือ</p>
        </div>
        <div id="watthai" class="wat">
            <img id="imagewatthai" class="imagewatthai2"
                src="https://cdn.pixabay.com/photo/2016/08/22/05/36/chinese-temple-1611390_1280.jpg" alt="ภาคเหนือ">

            <p>ภาคกลาง</p>
        </div>
        <div id="watthai" class="wat">
            <img id="imagewatthai" class="imagewatthai2"
                src="https://cdn.pixabay.com/photo/2018/11/02/09/22/wat-bang-thong-3789837_1280.jpg" alt="ภาคเหนือ">
            <p>ภาคตะวันออกเฉียงเหนือ</p>
        </div>
        <div id="watthai" class="wat">
            <img id="imagewatthai" class="imagewatthai2"
                src="https://cdn.pixabay.com/photo/2021/09/08/02/08/temple-6605240_1280.jpg" alt="ภาคเหนือ">
            <p>ภาคตะวันตก</p>
        </div>
    </div>

</body>

</html>
