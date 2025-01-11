<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .page {
        page-break-after: always;
        /* Add a page break after each pair of student cards */
    }

    .card {
        width: 100%;
        border: 1px solid black;
        border-radius: 15px;
        overflow: hidden;
        padding-bottom: 20px;
        margin-bottom: 100px;
        /* page-break-inside: avoid; */
        /* page-break-inside: avoid; */
    }

    /* @media print {
      .card {
        page-break-inside: avoid;
      }
    } */
    .info {
        width: 100%;
        align-items: center;
        /* border:1px solid red; */


    }

    .info div.knakor {
        padding: 0px;
        margin-top: 10px;
        /* margin-right:10px; */
        border: 2px solid black;
        width: 120px;
        height: 50px;
        float: right;
    }

    .info div.knakor div.kan_lable {
        width: 100%;
        margin: 0;
        padding-top: 5px;
        padding-bottom: -5px;
        border-bottom: 1px solid black;
        text-align: center;
        height: 25px;
        font-size: 1rem;
        ;
    }

    div.kan_id {
        width: 100%;
        padding-top: 5px;
        height: 25px;
        margin: 0;
        text-align: center;
        font-size: 1rem;

    }

    .photo {
        overflow: hidden;
        /* position:absolute; */
        /* position:; */
        width: 100px;
        height: 150px;




        float: left;
        /* border:1px solid black; */
        /* margin:10px; */
    }

    .photo div {
        border-radius: 10px;
        /* margin-top:5px; */
        width: 100px;
        height: 150px;

        border: 2px solid black;
        overflow: hidden;
    }

    .info img.minlogo {
        width: 60px;
        height: 60px;
        float: left;
        margin-top: 20px;
    }

    .info img.isllogo {
        width: 80px;
        height: 80px;
        float: left;
        margin-top: 20px;
        /* margin-right:13px; */


    }

    div.mintext {
        position: ;
        text-align: center;
        float: left;
        width: auto;
        margin: 0;
        margin-left: -80px;
        /* margin-top:10px; */

        font-size: 0.9rem;
    }

    div.maintext {
        width: 95%;
        background-color: gray;
        text-align: center;
        border-radius: 5px;
        height: 15px;
        margin-left: 2.5%;
        font-size: 1rem;

    }

    table.table {
        width: 95%;
        text-align: center;
        border: 2px solid black;
        padding: 0;
        margin-left: auto;
        margin-right: auto;
        margin-top: 10px;
    }

    table.table tr td {
        border: 1px solid black;
        margin: 0;
        font-size: 1rem;
    }

    div.bottom {
        width: 100%;



    }

    .rightphone {
        float: right;
        margin-top: 10px;
        margin-right: 10px;
        margin-left: 0;
        padding: 0;
        width: 40px;
        height: 40px;
    }

    .leftphone {
        float: left;
        margin-top: -40px;
        margin-left: 10px;
        width: 40px;
        height: 40px;
    }

    .bottomtext {
        float: left;
        margin: 0;
        padding: 0;
        /* width:400px; */
        margin-top: 10px;
        margin-right: auto;
        margin-left: auto;
        text-align: center;
        font-size: 0.8rem;


    }
</style>

<body>
    @foreach ($students->chunk(2) as $chunk)
        <div class="page">
            @foreach ($chunk as $student)
                <div class="card">


                    <div class="info">

                        <div class="knakor">
                            <div class="kan_lable">ID کانکور</div>
                            <div class="kan_id">{{ $student->kankur_no }} </div>
                        </div>
                        <div class="photo">

                            <div>
                                @if ($student->photo)
                                    <img src="{{ $student->photo }}" alt="No Image" style="width:100%; height:150px;">
                                @endif
                            </div>

                        </div>
                        <img src="img/minlogo.png" alt="img" class="minlogo"
                            style="height:60px; width:60px; margin-left:8px; margin-right: 0;">
                        <img src="img/islamic.png" alt="" class="isllogo"
                            style="height:60px; width:60px; float: right; margin-right:130px">
                        <div class="mintext">
                            امارت اسلامی افغانستان<br>
                            وزارت صحت عامه<br>
                            معینیت مالی و اداری<br>
                            ریاست عمومی منابع بشری<br>
                            ریاست انستیتوت های علوم صحی خصوصی<br>
                            کارت امتحان کانکور محصلین جدید الشمول انستیتوت های علوم صحی خصوصی
                            <br>
                            ولایت {{ $institute[0]->city }}



                        </div>







                    </div>


                    <div class="maintext">

                    </div>



                    <table class="table">

                        <tr>
                            <td>انستیتوت</td>
                            <td>رشته</td>
                            <td>ولد/بنت</td>
                            <td>اسم</td>
                        </tr>
                        <tr>
                            <td> {{ $institute[0]->institute_name }}

                            </td>
                            <td>{{ $student->department_name }} </td>
                            <td>{{ $student->f_name }} </td>
                            <td>{{ $student->student_name }} </td>
                        </tr>

                    </table>


                    <div class="bottomdiv">

                        <img src="img/phone.png" alt="" class="rightphone">
                        <div class="bottomtext">
                            .کارت امتحان، ورق جوابات و اصل تذکره تابعیت در روز امتحان حتمی میباشد <br>
                            .از آوردن مبایل و هر گونه اشیای دیگر خود داری نماید چون نقل محسوب میشود

                        </div>

                        <img src="img/phone1.png" alt="" class="leftphone">

                    </div>

                </div>
            @endforeach
        </div>
    @endforeach
</body>

</html>
