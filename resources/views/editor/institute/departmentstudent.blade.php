<div class="main-content dashbaord-content clsdepartmentstudent">
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
                    <a class="active" href="javascript:void(0)" id="instoption">Dep Student</a>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0)" class="btnbackmain btn-download" id="backfromdepartmentstudent">
            <i class='bx bx-plus'></i>
  


            <span class="text">Back</span>
        </a>
    </div>
  
  
    <div class="table-data">
      <div class="order">
          <div class="head">
              <h3 class="text-" id="stutable_header"></h3>
  
          </div>
          <table id="departmentstudenttable" class="table cell-border table-striped table_yajra">
              <thead>
  
                  <th>ID</th>
                  <th>Student Name</th>
                  <th>F/Name</th>
                  <th>Semester Type</th>
                  <th>Semester</th>
                  <th width="100">Actions</th>
  
              </thead>
              <tbody>
  
  
  
              </tbody>
  
          </table>
      </div>
  
  </div>
    
  </div>