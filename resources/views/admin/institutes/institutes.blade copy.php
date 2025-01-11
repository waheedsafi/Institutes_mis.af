@extends('layout.admin.adminlayout')
@section('title','Add-Institute')


@section('content')
<section class="content-header">		
    @if (session()->has('message'))
<div class="alert alert-success">
    {{session()->get('message')}}
    
</div>

    

    
@endif			
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Institutes</h1>
            </div>
            <div class="col-sm-6 text-right">
                {{-- <a href="{{ route('admin.add_instititue')}}" class="btn btn-primary">New Institute</a> --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_institute">Add New</button>
               
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
        <div class="card">
            <form action="" method="GET">
            <div class="card-header">
                <div class="card-tools">
                    <div class="input-group input-group" style="width: 250px;">
                        <input type="text" value="{{ Request::get('keyword')}}" name="keyword" class="form-control float-right" placeholder="Search">
    
                        <div class="input-group-append">
                          <button  type="submit" class="btn btn-default">
                            <i class="fas fa-search " style="color:blue"></i>
                          </button>
                        </div>
                      </div>
                </div>
            </form>
            </div>
            <div class="card-body table-responsive p-0">								
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th width="60">ID</th>
                            <th>Name</th>
                            <th>City</th>
                            <th>CEO</th>
                            <th>Manger</th>
                            <th width="100">Status</th>
                            <th width="100">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instdata as $instid => $institute)
                            
                       
                        <tr calss="">
                            <td>
                                {{ $institute->Inid}}
                     
                            </td>
                            <td>{{ $institute->Institute_name}}</td>
                            <td>{{ $institute->city}}</td>
                            <td> {{ $institute->CEO}}</td>
                            <td>   {{ $institute->founder}}</td>
                            <td>
                                @if ($institute->status == 1)
                                    Active
                                
                                     <svg class="text-success-500 h-6 w-6 text-success" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg> 
                                @else
                                    Block
                                    <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                
                                @endif
                        

                               
                                
                            </td>
                            <td>
                                <a href="{{ route('institute_info', $institute->Inid) }}">
                                 
                                <svg class="filament-link-icon w-4 h-4 mr-1 "
                                 style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                            <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z" 
                            fill="#5ABE64" /></svg>
                                </a>
                                <a href="{{ route('update_institute', $institute->Inid) }}">
                                    <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </a>
                                <a href="{{ route('delete_institute', $institute->Inid) }}" class="text-danger w-4 h-4 mr-1">
                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                      </svg>
                                </a>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>										
            </div>
            <div class="card-footer clearfix">
                {{$instdata->links()}}
                {{-- <ul class="pagination pagination m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul> --}}
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>

        {{-- add insti --}}
        <div class="modal fade bg-transparnt " id="add_institute" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" >
              <div class="modal-content  " style="">
                <div style="">
                    
                <form   id="addinstitute">
                    {{-- <form action="{{ route ('addins') }}" method="POST" id="addinstitute"> --}}
                        <header class="text-center">
                        <h3 id="modal-title" calss="text-center "></h3>
                    </header>
                    {{-- @csrf --}}
                <div class="card">
                    <div class="card-body">								
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                
                                    <label for="name">Name</label>
                                    <input type="text" required name="name" id="name" class="form-control" placeholder="Name">	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" required id="city" class="form-control" placeholder="City">	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                
                                    <label for="founder">Founder</label>
                                    <input type="text" name="founder" id="founder" class="form-control" placeholder="founder">	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                
                                    <label for="CEO">CEO</label>
                                    <input type="text" name="CEO" id="CEO" class="form-control" placeholder="CEO">	
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                
                                    <label for="create_date">Create Date</label>
                                    <input type="date"  max="{{date('Y')}}-{{date('m')}}-{{date('d')}}"  name="create_date" id="create_date" class="form-control" placeholder="2000/3/3">	
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="Address">Address</label>
                                    <textarea name="location" id="location" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            
                        </div>
                    </div>							
                </div>
                <div class="p-3">
                    <button class="btn btn-primary"  id="create" name="create">Create</button>
                    <a class="btn btn-outline-dark ml-3" data-bs-toggle="modal" data-bs-target="#add_institute">Cancel</a>
                </div>
            </form>
        
                </div>
    
              </div>
            </div>
        </div>       
    
    {{-- end add --}}
    @endsection


    @section('saidbar')

    @include('layout.admin.adminsidebar')

@endsection

@section("scrtip")
    {{-- <script>
    $(document).ready(function () {
        $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
        $("#modal-title").html("Add Institute");
        var formdata=$('#addinsititue')[0];
        $('#create').click(function () { 
            
            var data = new FormData(formdata);

            $.ajax({
                type: "POST",
                url: "{{ route ('addins') }}",
                
                processData:false,
                contentType:false,
                data: data,

                success: function (response) {
                    
                }
           
            });

      
        });

});
        

    </script> --}}
<script>
    $(document).ready(function () {
        $.ajaxSetup({
        headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
        $('#modal-title').html('Login')
        var formdata = $('#addinstitute')[0];
        $('#create').click(function () { 
            var from = new  FormData(formdata);
        //  console.log(from);
    
    
    
        $.ajax({
    
          method:"POST",
          url: "{{ route('addins') }}",
          
          processData: false,
          contentType: false,
          data: from,
          
        
    
          success: function(data){
        
          },
          error: function(error){
            console.log(error);
          }
    
        });
    
          
        });
    
    });
</script>

@endsection


