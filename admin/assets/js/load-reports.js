/*#################################################################################*/
							// Pagination for Records.php
/*#################################################################################*/
$('document').ready(function () {
	// Number if records to be fetched.

	// Set page to zero.
	var page = 0;

	var numberOfRecordsPerPage = 5;

	$('#prev').click(function () {
		if (page >= 1) {
		
		page--;

			// Make a request.
			$('.transactions').load('load-reports.php', {
				prev: 'prev',
				numberOfRecordsPerPage: numberOfRecordsPerPage,
				page: page
			});
		}
	});

	
	$('#next').click(function () {
		// Increment Page Number.
		page++;

		// Make a request.
		$('.transactions').load('load-reports.php', {
			next: 'next',
			numberOfRecordsPerPage: numberOfRecordsPerPage,
			page: page
		});
	});
});
/*######################################################################################*/
							// Pagination for Records.php ends
/*######################################################################################*/


/*######################################################################################*/
							// Pagination for cutomers.php
/*######################################################################################*/