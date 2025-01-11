@extends('layout.Institute_manager.managerlayout')
@section('content')
    

		<!-- MAIN -->
	<main>
		{{-- MAIN HOME --}}
		<div class="main-content dashbaord-content clsdashboard">
			<div class="head-title">
				<div class="left">
					<h1 id='username'></h1>
					<ul class="breadcrumb">
					
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active " href="" id="dashboard">Home</a>

						</li>
					</ul>
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>
			
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>1020</h3>
						<p>Active Student</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Teacher</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2543</h3>
						<p>All Student</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<div class="head license">
						<h3>Institute License & Finance</h3>
						
					</div>
					<table class='license'>
						<thead>
							<tr>
								<th>Name</th>
								<th>Expire Date</th>
								<th>Remain Time</th>
							</tr>
						</thead>
						<tbody>
							<tr id="license">
								<td>
									License
									{{-- <p>{{$institute_data->expire_date}}</p> --}}
								</td>
								<td>
									@isset($institute_license->expire_date)
									{{ $institute_license->expire_date }}
								@else
									N/A
								@endisset
								</td>
								@isset($institute_license->expire_date)

								@php
								  $expireDate = \Carbon\Carbon::createFromFormat('Y/m/d', $institute_license->expire_date);
									$currentTime = \Carbon\Carbon::now();
									$diff = $currentTime->diff($expireDate);
					@endphp
								<td>
									@if ($currentTime > $expireDate)
										<p class="status pending"> Expired : {{ $diff->y }}Y,{{ $diff->m }}M,{{ $diff->d }}D ago</p>
									@else
											@if($diff->y.'/'.$diff->m.'/'.$diff->d > '0/6/1')
											<p class="status completed">Remaining time: {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
										
											@else
											<p class="status process">Remaining time: {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>

											@endif

										
									@endif
								</td>
						
							@else
							<td><span class="status pending">N/A</span></td>

							@endisset

							</tr>
							<tr>
								<td>
									<p>ISA</p>
								</td>
								<td>
								
									@isset($isa->expire_date)
									{{ $isa->expire_date }}
								@else
									N/A
								@endisset
								</td>
								@isset($isa->expire_date)
									@php
									$expireDate = \Carbon\Carbon::createFromFormat('Y/m/d', $isa->expire_date);
									  $currentTime = \Carbon\Carbon::now();
									  $diff = $currentTime->diff($expireDate);
					  @endphp
								  <td>
									  @if ($currentTime > $expireDate)
										  <p class="status pending"> Expired : {{ $diff->y }}Y,{{ $diff->m }}M,{{ $diff->d }}D ago</p>
									  @else
											  @if($diff->y.'/'.$diff->m.'/'.$diff->d > '0/6/1')
											  <p class="status completed">Remaining time: {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
										  
											  @else
											  <p class="status process">Remaining time: {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
  
											  @endif
  
										  
									  @endif
									</td>
								@else
								<td><span class="status pending">N/A</span></td>

								@endisset

								
								
							</tr>
							<tr>
								<td>
									<p>Finance</p>
								</td>
								<td>
									@isset($finance->end_date)
										{{ $finance->end_date }}
									@else
										N/A
									@endisset
								</td>
								@isset($finance->end_date)
								@php
								
									$expireDate = \Carbon\Carbon::createFromFormat('Y/m/d', $finance->end_date);
									  $currentTime = \Carbon\Carbon::now();
									  $diff = $currentTime->diff($expireDate);
					  				@endphp

								  <td>
									  @if ($currentTime > $expireDate)
										  <p class="status pending"> Expired : {{ $diff->y }}Y,{{ $diff->m }}M,{{ $diff->d }}D ago</p>
									  @else
											  @if($diff->y.'/'.$diff->m.'/'.$diff->d > '0/6/1')
											  <p class="status completed">Remaining time: {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
										  
											  @else
											  <p class="status process">Remaining time: {{ $diff->y }}Y,{{ $diff->m }}M, and {{ $diff->d }}D</p>
  
											  @endif
  
										  
									  @endif

								@else
								
								<td><span class="status pending">N/A</span></td>
								@endisset
							
							</tr>
					
						
						</tbody>
					</table>
				</div>
				<div class="todo">
					<div class="head">
						<h3>Departments</h3>
						
					</div>
					<ul class="todo-list" id="departmentslist">
						
					</ul>
				</div>
			</div>

		</div>
		{{-- MAIN HOME END --}}

{{-- other blade --}}
@include('user.institute.student.student')
@include('user.institute.teacher.teacher')
@include('user.institute.setting.setting')


		</main>
		<!-- MAIN -->
<script>
// 	$(document).ready(function () {
		

//     var table = $('#studenttable').DataTable({
// 		"processing": true,
//   "retrieve": true,
//   "serverSide": true,
//   'paginate': true,
//   'searchDelay': 700,
//   "bDeferRender": true,
//   "responsive": true,
//   "autoWidth": false,
//   "pageLength": 5,
//   "lengthMenu": [[5, 10,15,20], [5, 10,15,20]],
//   ajax: "{{ route('manager.studentload') }}" ,
// 		 'columns': [

// 			 {data: 'Sid'},
// 			 {data: 'student_name'},
// 			 {data: 'kankur_no'},
// 			 {data: 'status'},
// 			 {data: 'gender'},
// 			 {data: 'action', name: 'action', orderable:false, searchabel:false},
// 		  ]
// 		});
// 	});
</script>
	<!-- CONTENT -->
	@endsection