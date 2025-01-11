
$(document).ready(function () {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}

	});

	$('.main-content').hide();
	$('.main-content.clsdashboard').show();

	// this part of code use for hide the option of sidebar

	$.each(permisi, function (array, key) {
		$.each(key, function (keyy, value) {
			console.log(value)
			$('#' + value + '').addClass('exist');



		});
	});
	console.log(myArray)
	// for desible the add button


	var searchValue = 'add-student';
	var found = false;


	$.each(permisi, function (i, row) {
		$.each(row, function (j, value) {
			if (value === searchValue) {
				found = true;

				return false; // to break out of the loop
			}
		});
		if (found) {
			return false; // to break out of the loop
		}
	});

	if (found) {
		$('#add_student').show();
	} else {
		$('#add_student').hide();

	}

	// end 
	//   for desibale the download cards btn


	var searchValue = 'download-card';
	var found = false;


	$.each(permisi, function (i, row) {
		$.each(row, function (j, value) {
			if (value === searchValue) {
				found = true;

				return false; // to break out of the loop
			}
		});
		if (found) {
			return false; // to break out of the loop
		}
	});

	if (found) {
		$('#download_cards').show();
	} else {
		$('#download_cards').hide();

	}

	//  end  desibale the download cards btn











	// department 
	$.each(department, function (array, key) {

		var listItem = '<li>' + key.department_name + ' --- Semester No  :  ' + key.Semester_no + '</li>';
		$('#departmentslist').append(listItem);
	});

	$('.close_go_to').on('click', function (e) {

		$('#dashbaord').click();

	});

	// end


	// console.log(institute.Institute_name+':'+institute.name)
	// for title webpage
	$('#pagetitle').html(institute.Institute_name + ':' + institute.name);
	console.log(institute.Institute_name)
	//  for the name of instiute
	var capitalizedString = institute.Institute_name.charAt(0).toUpperCase() + institute.Institute_name.slice(1);
	$('#insitute_name').html(capitalizedString);

	$('#stutable_header').html(capitalizedString + '-Institute Students List');

	// for user name
	var usernamecap = institute.name.charAt(0).toUpperCase() + institute.name.slice(1);
	$('#username , #usernames').html(usernamecap);


	// Handle sidebar menu item click
	$('#sidebar .side-menu.top li a').on('click', function () {
		var li = $(this).parent();


		$('#sidebar .side-menu.top li').removeClass('active');
		li.addClass('active');
		$('#studentform')[0].reset();

	});


	$('#sidebar .side-menu.top li a').on('click', function () {
		var li = $(this).parent();
		var id = li.attr('id');

		$('.main-content').hide();
		var sl = '.cls' + id;
		$(sl).show();



	});
	$('#manager-setting').on('click', function () {
		var li = $(this).parent();
		var id = li.attr('id');

		$('.main-content').hide();
		var sl = '.cls' + id;

		$('.clsmanager-setting').show();

		$('#managerphoto').attr('src', userimage)
		$('#managername').html(institute.name)
		$('#managerfname').html(institute.f_name)
		$('#managerphone').html(institute.phone)
		$('#manageremail').html(institute.email)
		$('#managercity').html(institute.city)



	});
	$('#change-photo').click(function (e) {
		e.preventDefault();
		$('.main-content').hide();
		$('.clschange-photo').show();
		$('.managerchange').hide();
		$('.chgphoto').show();
		$('#chgwindow').html('Photo');
		$('#chgphotoheader').html('Change Photo');
		$('#chgphoto').attr('src', userimage)

	});
	$('#mng_edit_btn').click(function (e) {
		e.preventDefault();
		$('.main-content').hide();
		$('.clschange-photo').show();
		$('.managerchange').hide();
		$('.changeinfo').show();
		$('#chgwindow').html('Information')
		$('#mngeditname').val(institute.name);
		$('#mngeditfname').val(institute.f_name);
		$('#mngeditphone').val(institute.phone);
		$('#mngeditemail').val(institute.email);
		$('#chgphotoheader').html('Change Information');
		$('#mngcity').append('<option>' + institute.city + '</option>')

	});

	// change photo

	// change password
	$('#change-password').click(function (e) {
		e.preventDefault();
		$('.main-content').hide();
		$('#chgwindow').html('Password')
		$('.clschange-photo').show();
		$('.managerchange').hide();
		$('.chgpassword').show();
		$('#chgphotoheader').html('Change Password');


	});
	// 
	$('#change_mng_photo').change(function () {
		var input = this;
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#chgphoto').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	});
	var chg_photo_data = $('#chg_photo_form')[0];

	$('#chg_photo_btn').click(function (e) {
		var formdata = new FormData(chg_photo_data);
		$('#chg_photo_btn').attr('disabled', true);
		$('#chg_photo_btn').html('Changing')
		$.ajax({
			method: "POST",
			url: chg_photo_url,
			processData: false,
			contentType: false,
			data: formdata,
			success: function (response) {
				$('#chg_photo_btn').attr('disabled', false);
				$('#chg_photo_btn').html('Change Photo')
				console.log(response)
				if (response.message) {

					swal("Success!", response.message, "success");

					//   table.draw();
					$('#setting_back').click();



				}

			},
			error: function (error) {


				if (error) {
					$('#chg_photo_btn').attr('disabled', false);
					$('#chg_photo_btn').html('Change Photo')

					if (error.responseJSON.errors.change_photo) {
						$('#change_mng_photo').addClass('is-invalid');
						$('#chg_photo_error').html(error.responseJSON.errors.change_photo)
					}
				}
			}
		});


	});
	// end change photo

	// change password

	chg_password_data = $('#chg_password_form')[0];

	$('#chg_password_btn').click(function (e) {
		var formdata = new FormData(chg_password_data);
		console.log(formdata)
		$('#chg_passwrd_btn').attr('disabled', true);
		$('#chg_password_btn').html('Changing')

		$.ajax({
			method: "POST",
			url: chg_password_url,
			processData: false,
			contentType: false,
			data: formdata,
			success: function (response) {
				$('#chg_password_btn').attr('disabled', false);
				$('#chg_password_btn').html('Change Password')
				console.log(response)
				if (response.error) {
					$('#old_password').addClass('is-invalid');
					$('#old_password_error').html(response.error)
				}
				if (response.message) {

					swal("Success!", response.message, "success");
					$('#setting_back').click();
					//   table.draw();



				}

			},
			error: function (error) {
				console.log(error)

				if (error) {
					$('#chg_password_btn').attr('disabled', false);
					$('#chg_password_btn').html('Change Password')

					if (error.responseJSON.errors.old_password) {
						$('#old_password').addClass('is-invalid');
						$('#old_password_error').html(error.responseJSON.errors.old_password)
					}
					if (error.responseJSON.errors.new_password) {
						$('#new_password').addClass('is-invalid');
						$('#new_password_error').html(error.responseJSON.errors.new_password)
					}
					if (error.responseJSON.errors.confirm_password) {
						$('#confirm_password').addClass('is-invalid');
						$('#confirm_password_error').html(error.responseJSON.errors.confirm_password)
					}
				}
			}
		});


	});



	// end change password

	// back to manager setting

	$('#setting_back').click(function (e) {
		e.preventDefault();
		$('#manager-setting').click();

	});
	// end back to manager setting 
	// Toggle sidebar
	$('#content nav .bx.bx-menu').on('click', function () {
		$('#sidebar').toggleClass('hide');
	});

	// Handle search button click
	$('#content nav form .form-input button').on('click', function (e) {
		if ($(window).width() < 576) {
			e.preventDefault();
			$('#content nav form').toggleClass('show');
			if ($('#content nav form').hasClass('show')) {
				$('#content nav form .form-input button .bx').removeClass('bx-search').addClass('bx-x');
			} else {
				$('#content nav form .form-input button .bx').removeClass('bx-x').addClass('bx-search');
			}
		}
	});

	// Update sidebar and search form visibility
	function updateSidebarAndSearchFormVisibility() {
		if ($(window).width() > 769) {
			$('#sidebar').removeClass('hide');
		} else if ($(window).width() < 768) {
			$('#sidebar').addClass('hide');
		} else if ($(window).width() > 576) {
			$('#content nav form .form-input button .bx').removeClass('bx-x').addClass('bx-search');
			$('#content nav form').removeClass('show');
		}
	}

	// Initial check on page load
	updateSidebarAndSearchFormVisibility();

	// Update visibility on window resize
	$(window).on('resize', function () {
		updateSidebarAndSearchFormVisibility();
		if ($(this).width() > 576) {
			$('#content nav form .form-input button .bx').removeClass('bx-x').addClass('bx-search');
			$('#content nav form').removeClass('show');
		}
	});

	// Handle switch mode change
	$('#switch-mode').on('change', function () {
		if ($(this).is(':checked')) {
			$('body').addClass('dark');
		} else {
			$('body').removeClass('dark');
		}
	});

	var table;
	$('#view-student').click(function (e) {
		// e.preventDefault();


		table = $('#studenttable').DataTable({
			"processing": true,
			"retrieve": true,
			"serverSide": true,
			'paginate': true,
			'searchDelay': 700,
			"bDeferRender": true,
			"responsive": true,
			"autoWidth": false,
			"pageLength": 5,
			"lengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]],
			ajax: studnetloadRoute,
			'columns': [

				{ data: 'Sid' },
				{ data: 'student_name' },
				{ data: 'kankur_no' },
				{ data: 'status' },
				{ data: 'semester' },
				{ data: 'action', name: 'action', orderable: false, searchabel: false },
			]
		});


	});

	// e.preventDefault();




	$('#add_student').click(function (e) {
		// 	e.preventDefault();
		// console.log('clicki')
		$('.main-content').hide();
		var sl = '.cls' + 'add-student';
		$(sl).show();
		$('#addstu_header').html('Add New Student')
		$('#create').html('ADD');
		$('#id').val('');

		$.ajax({
			method: "post",
			url: dep_city_list,
			success: function (response) {
				$('#department').empty();
				$('#city').empty();
				var dep = response[0]
				var city = response[1]

				$.each(dep, function (key, value) {

					$("#department").append('<option class="form-control" value="' + value.Did + '">' + value.department_name + '</option>');
				});
				$.each(city, function (key, value) {

					$("#city").append('<option class="form-control" value="' + value.id + '">' + value.city + '</option>');
				});




			},
			error: function (error) {

				console.log(error);

			}
		});

	});
	var data = $('#studentform')[0];

	// create student
	$('#create').click(function (e) {
		$('#create').attr('disabled', true);

		$('#create').html('Saving...')
		var formdata = new FormData(data);

		$.ajax({
			method: "POST",
			url: addstudent,
			processData: false,
			contentType: false,
			data: formdata,


			success: function (response) {
				$('#create').attr('disabled', false);
				table.draw();
				if (response.message) {

					swal("Success!", response.message, "success");

					//   table.draw();
					$('#studentform')[0].reset();
					$('#id').val('');
					$('#create').attr('disabled', false);

					$('#create').html('create');
					if (response.type == 'update') {
						$('.main-content').hide();
						$('.clsview-student').show();
					}


				}

			},
			error: function (error) {
				$('#create').html('Save')
				$('#create').attr('disabled', false);

				console.log(error);
				if (error) {
					// $('#create').attr('disabled', false);
					$('#create').html('Save')

					if (error.responseJSON.errors.name) {
						$('#name').addClass('is-invalid');
						$('#nameerror').html(error.responseJSON.errors.name)
					}
					if (error.responseJSON.errors.name == null) {
						$('#name').removeClass('is-invalid');
						$('#name').addClass('is-valid');
						$('#nameerror').html('');

					}
					if (error.responseJSON.errors.fname) {
						$('#fname').addClass('is-invalid');
						$('#fnameerror').html(error.responseJSON.errors.fname)
					}
					if (error.responseJSON.errors.fname == null) {
						$('#fname').removeClass('is-invalid');
						$('#fname').addClass('is-valid');
						$('#fnameerror').html('');

					}
					if (error.responseJSON.errors.department) {
						$('#department').addClass('is-invalid');
						$('#departmenterror').html(error.responseJSON.errors.department)
					}
					if (error.responseJSON.errors.department == null) {
						$('#department').removeClass('is-invalid');
						$('#department').addClass('is-valid');
						$('#departmenterror').html('');

					}
					if (error.responseJSON.errors.gender) {
						$('#gender').addClass('is-invalid');
						$('#gendererror').html(error.responseJSON.errors.gender)
					}
					if (error.responseJSON.errors.gender == null) {
						$('#gender').removeClass('is-invalid');
						$('#gender').addClass('is-valid');
						$('#gendererror').html('');

					}
					if (error.responseJSON.errors.city) {
						$('#city').addClass('is-invalid');
						$('#city').html(error.responseJSON.errors.city)
					}
					if (error.responseJSON.errors.city == null) {
						$('#city').removeClass('is-invalid');
						$('#city').addClass('is-valid');
						$('#cityerror').html('');

					}
					if (error.responseJSON.errors.DOB) {
						$('#DOB').addClass('is-invalid');
						$('#DOB').html(error.responseJSON.errors.DOB)
					}
					if (error.responseJSON.errors.DOB == null) {
						$('#DOB').removeClass('is-invalid');
						$('#DOB').addClass('is-valid');
						$('#DOBerror').html('');


					}
					if (error.responseJSON.errors.photo) {
						$('#photo').addClass('is-invalid');
						$('#photoerror').html(error.responseJSON.errors.photo)
					}
					if (error.responseJSON.errors.photo == null) {
						$('#photo').removeClass('is-invalid');
						$('#photo').addClass('is-valid');
						$('#photoerror').html('');


					}

				}
			}
		});


	});
	// end create student
	stud_id = '';
	$('#addstudent_back').click(function (e) {

		$('.main-content').hide();
		$('.clsview-student').show();

		$('#name').val('');
		$('#fname').val('');
		$('#lname').val('');
		$('#gfname').val('');

		$('#department ').empty();



		$('#gender ').empty();
		$('#city ').empty();

		$('#DOB').val('');

		$('#phone').val('');

		$('#infoname').val('');
		$('#infofname').val('');
		$('#infolname').val('');
		$('#infogfname').val('');

		$('#infodepartment ').empty();



		$('#infogender ').empty();
		$('#infocity ').empty();

		$('#infodob').val('');

		$('#infophone').val('');

		editStudentUrl = editStudentUrl.replace(stud_id, ':studentId');




	});
	// edit student
	$('body').on('click', '.editbutton', function () {
		var id = $(this).data('id');
		stud_id = id;
		editStudentUrl = editStudentUrl.replace(':studentId', id);

		$.ajax({
			method: "post",
			url: dep_city_list,
			success: function (response) {
				$('#department').empty();
				$('#city').empty();
				$('#id').val('');
				var dep = response[0]
				var city = response[1]

				$.each(dep, function (key, value) {

					$("#department").append('<option class="form-control" value="' + value.Did + '">' + value.department_name + '</option>');
				});
				$.each(city, function (key, value) {

					$("#city").append('<option class="form-control" value="' + value.id + '">' + value.city + '</option>');
				});



				$.ajax({
					url: editStudentUrl,
					method: 'GET',
					success: function (response) {
						$('.main-content').hide();
						var sl = '.cls' + 'add-student';
						$(sl).show();
						$('#addstu_header').html('Edit Student')
						$('#create').html('Update');


						$('#id').val(response.Sid);
						$('#name').val('');
						$('#name').val(response.student_name);
						$('#fname').val('');
						$('#fname').val(response.f_name);
						$('#lname').val('');
						$('#lname').val(response.l_name);
						$('#gfname').val('');
						$('#gfname').val(response.g_f_name);

						$('#department option[value="' + response.Did + '"]').attr('selected', 'selected')



						$('#gender option[value="' + response.gender + '"]').attr('selected', 'selected')

						$('#city option[value="' + response.city + '"]').attr('selected', 'selected')

						$('#DOB').val('');
						$('#DOB').val(response.DOB);

						$('#phone').val('');
						$('#phone').val(response.phone);





					},
					error: function (error) {
						console.log(error)
					}
				});
			},
			error: function (error) {

				console.log(error);

			}
		});


	});
	// end edit student 

	// delete student 
	$('body').on('click', '.delbutton', function () {
		var id = $(this).data('id');
		deleteStudentUrl = deleteStudentUrl.replace(':studentId', id);
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!" + id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({

						url: deleteStudentUrl,
						method: 'GET',
						success: function (response) {
							swal("Success!", response.message, "success");

							table.draw();

						},
						error: function (error) {
							console.log(error)
						}
					});

				} else {
					swal("Your imaginary file is safe!");
				}
			});

	});
	// end delete student 


	//   info student 
	$('body').on('click', '.infobutton', function () {
		var id = $(this).data('id');
		stud_id = id;
		editStudentUrl = editStudentUrl.replace(':studentId', id);
		$.ajax({
			method: "post",
			url: dep_city_list,
			success: function (response) {
				$('#infodepartment').empty();
				$('#city').empty();
				var dep = response[0]
				var city = response[1]

				$.each(dep, function (key, value) {

					$("#infodepartment").append('<option class="form-control" value="' + value.Did + '">' + value.department_name + '</option>');
				});
				$.each(city, function (key, value) {

					$("#infocity").append('<option class="form-control" value="' + value.id + '">' + value.city + '</option>');
				});



				$.ajax({
					url: editStudentUrl,
					method: 'GET',
					success: function (response) {
						var student_name = response.student_name.charAt(0).toUpperCase() + response.student_name.slice(1);

						studnetphoto = studnetphoto.replace(':studentimage', response.photo)
						$('.main-content').hide();
						var sl = '.cls' + 'info-student';
						$(sl).show();
						$('#addstu_header').html('Edit Student')
						$('#create').html('Update');
						$('#infophoto').attr('src', studnetphoto)

						$('#infokankur').html(response.kankur_no);
						$('#infoname').html(student_name + '  ' + response.l_name);
						$('#infophone').html(response.phone);
						$('#infofname').html(response.f_name);
						$('#infolname').html(response.l_name);
						$('#infostatus').html(response.status);
						$('#infodob').html(response.DOB);

						$('#infosemester').html(response.semester);
						$('#infogfname').html(response.g_f_name);
						$('#infodepartment option[value="' + response.Did + '"]').attr('selected', 'selected')



						gender = 'Male'
						if (response.gender == 0) {
							gender = 'Famale'
						}
						$('#infogender').html(gender)
						$('#infocity option[value="' + response.city + '"]').attr('selected', 'selected')






					},
					error: function (error) {
						console.log(error)
					}
				});
			},
			error: function (error) {

				console.log(error);

			}
		});


	});

	//   end info student

	//   back to student 
	$('#infostudent_back').click(function (e) {
		e.preventDefault();
		$('#addstudent_back').click();
	});
	$('#menu_student_info').click(function (e) {
		e.preventDefault();
		$('#addstudent_back').click();
	});
	$('#menu_student_').click(function (e) {
		e.preventDefault();
		$('#addstudent_back').click();
	});
	// end student

	// teacher part

	$('#view-teacher').click(function (e) {
		// e.preventDefault();


		var table = $('#teachertable').DataTable({
			"processing": true,
			"retrieve": true,
			"serverSide": true,
			'paginate': true,
			'searchDelay': 700,
			"bDeferRender": true,
			"responsive": true,
			"autoWidth": false,
			"pageLength": 5,
			"lengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]],
			ajax: teacherloadRoute,
			'columns': [

				{ data: 'Tid' },
				{ data: 'teacher_name' },
				{ data: 'education' },
				{ data: 'phone' },
				{ data: 'join_date' },
				// { data: 'action', name: 'action', orderable: false, searchabel: false },
				{
					data: null,
					orderable: false,
					searchable: false,
					render: function (data, type, row, meta) {
						return `
						
							<div class="btn-group"> <a href="javascript:void(0)" class="teachinfobutton btn-secondary btn" data-id="${row.Tid}">
                <svg class="filament-link-icon w-4 h-4 mr-1 " style="width: 1.5em; height: 1.5em;vertical-align: middle;fill: currentColor;overflow: hidden;" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"> <path d="M433 203.2H213c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V243.3s0-0.1 0.1-0.1H433s0.1 0 0.1 0.1l-0.1 219.9zM702.5 203.2c-82.5 0-150 67.5-150 150s67.5 150 150 150 150-67.5 150-150-67.5-150-150-150z m77.7 227.7c-20.9 20.9-48.4 32.3-77.7 32.3-29.2 0-56.8-11.5-77.7-32.3-20.9-20.9-32.3-48.4-32.3-77.7 0-29.2 11.5-56.8 32.3-77.7 20.9-20.9 48.4-32.3 77.7-32.3 29.2 0 56.8 11.5 77.7 32.3 20.9 20.9 32.3 48.4 32.3 77.7 0 29.2-11.5 56.8-32.3 77.7zM431.3 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9zM812.5 564.2h-220c-22 0-40 18-40 40v220c0 22 18 40 40 40h220c22 0 40-18 40-40v-220c0-22-18-40-40-40z m0 260l-219.9 0.1s-0.1 0-0.1-0.1V604.3s0-0.1 0.1-0.1h219.9s0.1 0 0.1 0.1l-0.1 219.9z"  fill="#5ABE64" /></svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary teacheditbutton" data-id="${row.Tid}">
           
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="24px" fill="#3C91E6"><path d="M0 0h24v24H0z" fill="none"/><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                </a>
                <a href="javascript:void(0)" class="btn btn-secondary  text-danger teachdelbutton" data-id="${row.Tid}">
             
                <svg xmlns="http://www.w3.org/2000/svg" height="20px" class="text-danger" viewBox="0 0 24 24" width="24px" fill="#F08080"><path d="M0 0h24v24H0z" fill="none"/><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                </a>
                
               </div> '
						`;
					}
				}
			]
		});


	});

	$('#menu_teacher_add').click(function (e) {
		$('#view-teacher').click();

	});
	// add teacher
	$('#add_teacher').click(function (e) {
		// 	e.preventDefault();
		// console.log('clicki')
		$('.main-content').hide();
		var sl = '.cls' + 'add-teacher';
		$(sl).show();
		$('#addteacher_header').html('Add New Teacher')
		$('#createteacher').html('ADD');

		$.ajax({
			method: "post",
			url: dep_city_list,
			success: function (response) {
				var dep = response[0]
				var city = response[1]

				$.each(dep, function (key, value) {

					$("#department").append('<option class="form-control" value="' + value.Did + '">' + value.department_name + '</option>');
				});
				$.each(city, function (key, value) {

					$("#city").append('<option class="form-control" value="' + value.id + '">' + value.city + '</option>');
				});




			},
			error: function (error) {

				console.log(error);

			}
		});

	});
	// end add teacher

	// store teacher 
	var teadata = $('#teacherform')[0];
	$('#createteacher').click(function (e) {
		$('#createteacher').attr('disabled', true);

		$('#createteacher').html('Saving...')
		var formdata = new FormData(teadata);

		$.ajax({
			method: "POST",
			url: addteacher,
			processData: false,
			contentType: false,
			data: formdata,


			success: function (response) {
				$('#createteacher').attr('disabled', false);
				if (response.message) {

					swal("Success!", response.message, "success");

					table.draw();
					$('#teacherform')[0].reset();
					$('#id').val('');
					$('#createteacher').attr('disabled', false);

					$('#createteacher').html('Add');



				}

			},
			error: function (error) {

				console.log(error);
				if (error) {
					$('#createteacher').attr('disabled', false);
					$('#createteacher').html('Add')

					if (error.responseJSON.errors.name) {
						$('#teachname').addClass('is-invalid');
						$('#teachnameerror').html(error.responseJSON.errors.name)
					}
					if (error.responseJSON.errors.name == null) {
						$('#teachname').removeClass('is-invalid');
						$('#teachname').addClass('is-valid');
						$('#teachnameerror').html('');

					}
					if (error.responseJSON.errors.fname) {
						$('#teachfname').addClass('is-invalid');
						$('#teachfnameerror').html(error.responseJSON.errors.fname)
					}
					if (error.responseJSON.errors.fname == null) {
						$('#teachfname').removeClass('is-invalid');
						$('#teachfname').addClass('is-valid');
						$('#teachfnameerror').html('');

					}

					if (error.responseJSON.errors.gender) {
						$('#teachgender').addClass('is-invalid');
						$('#teachgendererror').html(error.responseJSON.errors.gender)
					}
					if (error.responseJSON.errors.gender == null) {
						$('#teachgender').removeClass('is-invalid');
						$('#teachgender').addClass('is-valid');
						$('#teachgendererror').html('');

					}

					if (error.responseJSON.errors.join) {
						$('#teachjoin').addClass('is-invalid');
						$('#teachjoinerror').html(error.responseJSON.errors.join)
					}
					if (error.responseJSON.errors.join == null) {
						$('#teacjoin').removeClass('is-invalid');
						$('#teachjoin').addClass('is-valid');
						$('#teachjoinerror').html('');


					}
					if (error.responseJSON.errors.photo) {
						$('#teachphoto').addClass('is-invalid');
						$('#teachphotoerror').html(error.responseJSON.errors.photo)
					}
					if (error.responseJSON.errors.photo == null) {
						$('#teachphoto').removeClass('is-invalid');
						$('#teachphoto').addClass('is-valid');
						$('#teachphotoerror').html('');


					}

					if (error.responseJSON.errors.salary) {
						$('#teachsalary').addClass('is-invalid');
						$('#teachsalaryerror').html(error.responseJSON.errors.salary)
					}
					if (error.responseJSON.errors.salary == null) {
						$('#teachsalary').removeClass('is-invalid');
						$('#teachsalary').addClass('is-valid');
						$('#teachsalaryerror').html('');


					}

				}
			}
		});


	});
	// end store teacher

	// edit teacher
	$('body').on('click', '.teacheditbutton', function () {
		var id = $(this).data('id');
		stud_id = id;
		editTeacherUrl = editTeacherUrl.replace(':teacherId', id);




		$.ajax({
			url: editTeacherUrl,
			method: 'GET',
			success: function (response) {
				$('.main-content').hide();
				var sl = '.cls' + 'add-teacher';
				$(sl).show();
				$('#addteacher_header').html('Edit Teacher')
				$('#createteacher').html('Update');


				$('#teacher_id').val(id);

				$('#teachname').val(response.teacher_name);

				$('#teachfname').val(response.f_name);
				$('#teachlname').val(response.last_name);
				$('#teachgfname').val(response.g_f_name);

				$('#teachgender option[value="' + response.gender + '"]').attr('selected', 'selected')

				$('#teachcontract option[value="' + response.contract_type + '"]').attr('selected', 'selected')


				$('#teachexperince option[value="' + response.experince + '"]').attr('selected', 'selected')

				$('#teacheducation option[value="' + response.education + '"]').attr('selected', 'selected')


				$('#teachjoin').val(response.join_date);


				$('#teachphone').val(response.phone);
				$('#teachemail').val(response.email);
				$('#teachsalary').val(response.salary);





			},
			error: function (error) {
				console.log(error)
			}
		});




	});
	// end edit teacher

	// delete teacher 
	$('body').on('click', '.teachdelbutton', function () {
		var id = $(this).data('id');
		deleteTeacherUrl = deleteTeacherUrl.replace(':teacherId', id);
		swal({
			title: "Are you sure?",
			text: "Once deleted, you will not be able to recover this imaginary file!" + id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
			.then((willDelete) => {
				if (willDelete) {
					$.ajax({

						url: deleteTeacherUrl,
						method: 'GET',
						success: function (response) {
							swal("Success!", response.message, "success");

							table.draw();

						},
						error: function (error) {
							console.log(error)
						}
					});

				} else {
					swal("Your imaginary file is safe!");
				}
			});

	});
	// end delete teacher 


	//   info student 
	$('body').on('click', '.teachinfobutton', function () {
		var id = $(this).data('id');
		stud_id = id;
		editStudentUrl = editStudentUrl.replace(':studentId', id);
		$.ajax({
			method: "post",
			url: dep_city_list,
			success: function (response) {
				$('#infodepartment').empty();
				$('#city').empty();
				var dep = response[0]
				var city = response[1]

				$.each(dep, function (key, value) {

					$("#infodepartment").append('<option class="form-control" value="' + value.Did + '">' + value.department_name + '</option>');
				});
				$.each(city, function (key, value) {

					$("#infocity").append('<option class="form-control" value="' + value.id + '">' + value.city + '</option>');
				});



				$.ajax({
					url: editStudentUrl,
					method: 'GET',
					success: function (response) {
						var student_name = response.student_name.charAt(0).toUpperCase() + response.student_name.slice(1);

						studnetphoto = studnetphoto.replace(':studentimage', response.photo)
						$('.main-content').hide();
						var sl = '.cls' + 'info-student';
						$(sl).show();
						$('#addstu_header').html('Edit Student')
						$('#create').html('Update');
						$('#infophoto').attr('src', studnetphoto)

						$('#infokankur').html(response.kankur_no);
						$('#infoname').html(student_name + '  ' + response.l_name);
						$('#infophone').html(response.phone);
						$('#infofname').html(response.f_name);
						$('#infolname').html(response.l_name);
						$('#infostatus').html(response.status);
						$('#infodob').html(response.DOB);

						$('#infosemester').html(response.semester);
						$('#infogfname').html(response.g_f_name);
						$('#infodepartment option[value="' + response.Did + '"]').attr('selected', 'selected')



						gender = 'Male'
						if (response.gender == 0) {
							gender = 'Famale'
						}
						$('#infogender').html(gender)
						$('#infocity option[value="' + response.city + '"]').attr('selected', 'selected')






					},
					error: function (error) {
						console.log(error)
					}
				});
			},
			error: function (error) {

				console.log(error);

			}
		});






	});

	//   end info teacher

	// teacher back
	$('#teacher_back').click(function (e) {

		$('.main-content').hide();
		$('.clsview-teacher').show();

		$('#teacher_id').val('');
		$('#teachfname').val('');
		$('#teachcontract').val('');
		$('#teachemail').val('');

		$('#teachcontract ').empty();



		$('#teacheducation ').empty();
		$('#teachexperince ').empty();

		$('#teachname').val('');

		$('#teachlname').val('');

		$('#teachsalary').val('');
		$('#teachphone').val('');
		$('#teachjoin').val('');
		$('#infogfname').val('');

		$('#infodepartment ').empty();



		$('#infogender ').empty();
		$('#infocity ').empty();

		$('#infodob').val('');

		$('#infophone').val('');

		editStudentUrl = editStudentUrl.replace(stud_id, ':studentId');




	});




});
