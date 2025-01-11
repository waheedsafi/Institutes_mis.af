<div class="main-content dashbaord-content clsdownload_card">
    <div class="head-title">
        <div class="left">
            <h1 id='username'>
                {{ auth()->user()->name }}
            </h1>
            <ul class="breadcrumb">
  
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active " href="{{ route('manager.index') }}">Home</a>
  
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active " href="{{ route('manager.student') }}">Students</a>
  
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                  <a class="active " href="#">Download Cards</a>
  
              </li>
            </ul>
        </div>
      
    </div>
    {{-- user --}}
    <div class="table-data">
        <div class="order">
                <div class="head">
                    <h3 class="text-" id="stutable_header">Download Card</h3>
  
                </div>
            <form id="selection_form">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="city" title="Select Student range you want to download the cards ">Student Range*</label>
                            <select name="student_range" id="student_range" class="form-control">
  
  
                            </select>
                            <span id="student_rangeerror" class="text-danger error"></span>
                        </div>
                    </div>
                
  
                   
  
                    <div class="col-md-2">
                        <div class="mb-3">
  
                            <label for="create_date"></label>
                            <div class="">
                              <a  type="button" target="_blank" class="btn btn-primary" id="download_submit">Download
                              </a>
                              
                            </div>
                        </div>
                    </div>
  
  
  
                
  
                </div>
             </form>
  
       
        </div>
  
    </div>
    {{-- Report selection end --}}
  
  
    {{--  --}}
  
  </div>