
$(document).ready(function () {

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}

	});

	$('.main-content').hide();
	$('.main-content.clsdashboard').show();

	// this part of code use for hide the option of sidebar

	console.log(myArray)
	// for desible the add button





	// end
	//   for desibale the download cards btn


	//  end  desibale the download cards btn














	
	

	// for user name



	// Handle sidebar menu item click
	$('#sidebar .side-menu.top li a').on('click', function () {
		var li = $(this).parent();


		$('#sidebar .side-menu.top li').removeClass('active');
		li.addClass('active');


	});


	$('#sidebar .side-menu.top li a').on('click', function () {
		var li = $(this).parent();
		var id = li.attr('id');

		$('.main-content').hide();
		var sl = '.cls' + id;
		$(sl).show();



	});


});
