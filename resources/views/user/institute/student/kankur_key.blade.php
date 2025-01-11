<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
</head>

<style>
    /* * {
  box-sizing: border-box;
} */
    * {
        font-family: ;
        font-size: 12px;
    }

    .main {
        align-items: center;
    }

    .keyimg {

        width: 100%;


    }

    img.bgimg {

        width: 100%;
        height: 100%;
    }

    div.kan_id {
        position: absolute;
        font-size: 1rem;

        left: 10%;
        top: 20.5%;
    }

    div.cityname {
        position: absolute;
        font-size: 1.5rem;

        left: 46%;
        top: 15.5%;
    }
</style>


<body>

    @foreach ($students as $student)
        <div class="main">
            <div class="keyimg">

                <img src="img/kan_key.png" alt="" class="bgimg">
                <div class="kan_id">{{ $student->kankur_no }} </div>
                <div class="cityname">ولایت هرات</div>
            </div>
        </div>
    @endforeach
</body>

</html>
