 {{-- add exists student  --}}

 <div class="main-content dashbaord-content clsadd-exists-student">
    <div class="head-title">
        <div class="left">
            <h1 id='usernames'></h1>
            <ul class="breadcrumb">

                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active " href="" id="dashboard">Home</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="javascript:void(0)" id="menu_student_add">Studnet</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="" id="dashboard">Add</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download" id='addexistsstudent_back'>
            <i class='bx bx-plus'></i>

            <span class="text">Back</span>
        </a>
    </div>


    <form id="student_exists_form">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3 class="text-" id="addstu_header"></h3>
                    <h6 style="direction: rtld">
                        توجه: فقط دانشجویانی که فارغ التحصیل شده اند و آماده شرکت در امتحان دولتی هستند می توانید در فرم زیر ثبت نام کنید و ثبت نام باید به زبان های ملی باشد، انگلیسی قابل قبول نیست
                        <br>
                        
نوټ:په لاندنی فورمه کی یوازی هغه محصلین راجستر کړی کوم چی فارغ شوی او دولتی ازموینی ته اماده دی  نوم لیکنه باید په ملي ژبو وي، انګلیسي د منلو وړ نه ده
                    </h6>
                    <div class="row" id='add_exists_student'>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <input name='student_id' type="hidden" id='id' value="">
                                <label for="name">Name*</label>
                                <input type="text" required name="name" id="exists_name"
                                    class="form-control" placeholder="Name">
                                <span id="exists_nameerror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fname">F/Name*</label>
                                <input type="text" name="fname" required id="exists_fname"
                                    class="form-control" placeholder="Father Name">
                                <span id="exists_fnameerror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="lname">Last Name</label>
                                <input type="text" name="lname" required id="exists_lname"
                                    class="form-control" placeholder="Last Name">
                                <span id="exists_lnameerror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gfname">GradFather/Name</label>
                                <input type="text" name="gfname" required id="exists_gfname"
                                    class="form-control" placeholder="GrandFahter Name">
                                <span id="exists_gfnameerror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gfname">Kankur ID*</label>
                                <input type="text" name="kankur_id" required id="kankur_id"
                                    class="form-control" placeholder="Kab-130932">
                                <span id="kankur_iderror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="schooldate">School Graduation Date</label>
                                <input type="date" name="schooldate" required id="exists_schooldate"
                                    class="form-control" placeholder="GrandFahter Name">
                                <span id="exists_schooldateerror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="department">Department*</label>
                                <select name="department" class="form-control" id="exists_department">

                                </select>
                                <span id="exists_departmenterror" class="text-danger error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="semester">Semester*</label>
                                <select name="semester" class="form-control" id="exists_semester">

                                </select>
                                <span id="exists_semestererror" class="text-danger error"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="gender">Gender*</label>
                                <select name="gender" class="form-control" id="exists_gender">
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                </select>
                                <span id="exists_gendererror" class="text-danger error"></span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="city">Org/Province*</label>
                                <select name="city" class="form-control" id="exists_city">


                                </select>
                                <span id="exists_cityerror" class="text-danger error"></span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="photo">Photo</label>
                                <input type="file" name="photo" id="exists_photo" class="form-control"
                                    placeholder="Photo">
                                <span id="exists_photoerror" class="text-danger error"></span>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">

                                <label for="nid"
                                    title="Scan of National Identity & 12th Grade Certificate">Information
                                    Scan</label>
                                <input type="file" name="scanfile" id="exists_scanfile" class="form-control"
                                    placeholder="Photo">
                                <span id="exists_scanfileerror" class="text-danger error"></span>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" title="National Identity Number ">Nid Number</label>

                                <input type="text" name="nid" id="nid" class="form-control"
                                    placeholder="89232">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone" title="3 Year(12,11,10) of School Persentage">3Y
                                    Persentage</label>

                                <input type="text" name="persentage" id="exists_persentage"
                                    class="form-control" placeholder="88.4" value='0.0'>
                                <span id="exists_persentageerror" class="text-danger error"></span>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="dob">Date of Birth</label>
                                @php
                                    $eighteenYearsAgo = date('Y-m-d', strtotime('-18 years'));
                                @endphp
                                <input type="date" max="{{ $eighteenYearsAgo }}" name="DOB"
                                    id="exists_DOB" class="form-control">
                                <span id="exists_DOBerror" class="text-danger error"></span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text">+93</span>
                                    <input type="text" maxlength="9" name="phone" id="exists_phone"
                                        class="form-control" placeholder="707070707">
                                </div>
                                <span id="exists_phoneerror" class="text-danger error"></span>
                            </div>
                        </div>


                    </div>
                    <div class="p-3">
                        <button type="button" class="btn btn-primary" id="exists_create"></button>
                    </div>


                    <div class="p-3">
                 
                        <a href="https://youtu.be/HnvDi1pvikQ" style="font-size:1rem"><i class='bx bxl-youtube'   style='color:#c74747; '></i>Click here for help</a>


                   
                </div>
                </div>
              
            </div>

        </div>
    </form>

</div>


{{-- end add exists students --}}
{{-- STUDENT VIEW  --}}