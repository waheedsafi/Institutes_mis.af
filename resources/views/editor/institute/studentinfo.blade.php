<div class="main-content dashbaord-content clsdepartmentstudentinfo">
    <div class="head-title">
        <div class="left">
            <h1 id='username'>
                {{ auth()->user()->name }}
            </h1>
            <ul class="breadcrumb">
  
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active " href="" id="{{ route('editor.index') }}">Home</a>
  
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#" id="back">Institute</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="javascript:void(0)" id="instoption">Info</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="javascript:void(0)" id="instoption">Dep
                      Student</a>
                </li>
                <li>
                  <i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="javascript:void(0)" id="instoption">Info Student</a>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0)" class="btnbackmain btn-download" id="backfromstudentinfo">
            <i class='bx bx-plus'></i>
  
            <span class="text">Back</span>
        </a>
    </div>
  
  
    <div class="table-data">
      <div class="order">
          <div class="head">
              <h3 class="text-" id="studentinfoheader"></h3>
  
          </div>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <a href="" target="_blank" id="infophotolink" rel="noopener noreferrer"> <img
                                    alt="No Photo" class="rounded-circle" id='infophoto' width="150"></a>
                            <div class="mt-3">
                                <h4 id='infoname'></h4>
                                <p class="text-secondary mb-1" id='infokankur'></p>
                                <p class="text-muted font-size-sm" id='infophone'></p>
  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                Semester information
                            </h6>
                            <span class="text-secondary"></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                            </h6>
                            <span class="text-secondary">
                              
                              <a id="infopdfurl" target="_blank">
                                  <i class='bx bxs-file' style='color:#eec1c1'  ></i>
                                  Information</a>
  
                            </span>
  
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                            </h6>
                            <span class="text-secondary"></span>
  
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                            </h6>
                            <span class="text-secondary"></span>
  
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                            </h6>
                            <span class="text-secondary"></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Father Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="infofname">
  
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Grandfather/name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="infogfname">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Department</h6>
                            </div>
                           
                              <div class="col-sm-9 text-secondary" id="infodepartment">
                            
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Stutas</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id="infostatus">
  
                            </div>
                        </div>
  
                        <hr>
  
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Gender</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id='infogender'>
  
                            </div>
                        </div>
                        <hr>
  
                        <div class="row">
                          <div class="col-sm-3">
                              <h6 class="mb-0">School Graduation Year</h6>
                          </div>
                          <div class="col-sm-9 text-secondary" id='schoolgr'>
  
                          </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Persentage</h6>
                        </div>
                        <div class="col-sm-9 text-secondary" id='infoPersentage'>
  
                        </div>
                    </div>
                    <hr>
  
                    <div class="row">
                      <div class="col-sm-3">
                          <h6 class="mb-0">Tizker</h6>
                      </div>
                      <div class="col-sm-9 text-secondary" id='infonid'>
  
                      </div>
                  </div>
                  <hr>
                  
  
  
                  <div class="row">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Semester Type</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id='infosemester_type'>
  
                    </div>
                </div>
                <hr>
  
                <div class="row">
                  <div class="col-sm-3">
                      <h6 class="mb-0">Shift</h6>
                  </div>
                  <div class="col-sm-9 text-secondary" id='infoshifts'>
  
                  </div>
              </div>
              <hr>
  
            
  
  
                  
  
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Semester</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id='infosemester'>
  
                            </div>
                        </div>
  
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">DOB</h6>
                            </div>
                            <div class="col-sm-9 text-secondary" id='infodob'>
  
                            </div>
  
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">City</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                              <div class="col-sm-9 text-secondary" id='infocity'>
                            </div>
                        </div>
                        {{-- en --}}
                    </div>
                </div>
       
            </div>
        </div>
      </div>
  
  </div>
    
  </div>