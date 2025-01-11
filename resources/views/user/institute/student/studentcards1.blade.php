<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ base_path('public/css/custom/pdf/cardcss.css') }}">

</head>

<body>

    @foreach ($students as $student)
        <div class="card">


            <div class="info">

                <div class="knakor">
                    <div class="kan_lable">ID کانکور</div>
                    <div class="kan_id"> {{ $student->kankur_no }} </div>
                </div>
                <div class="photo">

                    <div class="studentphoto">

                    </div>

                </div>
                <img src="img/minlogo.png" alt="img" class="minlogo">
                <div class="mintext">
                    امارت اسلامی افغانستان<br>
                    وزارت صحت عامه<br>
                    معینیت مالی و اداری<br>
                    ریاست عمومی منابع بشری<br>
                    ریاست انستیتوت های علوم صحی خصوصی<br>
                    کارت امتحان کانکور محصلین جدید الشمول انستیتوت های علوم صحی خصوصی <br>ولایت ()


                </div>
                <img src="img/islamic.png" alt="" class="isllogo">


                {{-- <div class="fname"><div>Father Name:</div></div>
      
      <div class="kankur"><div>kankur ID:</div></div>
      <div class="kankur"><div>Exam Date:</div></div>
      <div class="kankur"><div>Group: </div></div>
    --}}



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
                    <td>{{ $student->department_name }} </td>
                    <td>{{ $student->department_name }} </td>
                    <td>{{ $student->f_name }} </td>
                    <td>{{ $student->student_name }} </td>
                </tr>

            </table>


            <div class="bottomdiv">

                <img src="img/phone.png" alt="" class="rightphone">
                <div class="bottomtext">
                    .کارت امتحان، ورق جوابات و اصل تذکره تابعیت در روز امتحان حتمی میباشد.• <br>
                    .از آوردن مبایل و هر گونه اشیای دیگر خود داری نماید چون نقل محسوب میشود.•

                </div>

                <img src="img/phone1.png" alt="" class="leftphone">

            </div>

        </div>
    @endforeach
</body>

</html>
