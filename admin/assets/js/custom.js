$(document).ready( function(){
	/*$(".delete-btn").click(function() {
		// Display modal.
		$(".delete-modal").show();
	});	*/

	$(".close").click(function() {
		// Hide modal.
		$(".delete-modal, .edit-modal").fadeOut();
	});

});

//#############################
	// Get account bal.
	function getAcctBal(accNum){
		if (accNum != '') {
			$("#accBal").load('account-balance.php', {
				accNum: accNum
			});
		}
	}
//#############################


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
$('document').ready(function () {
	// Set Page Number to zero.
	var page = 0;

	// Table Name
	var tableName = 'bank_customers';
	
	// Number of records to fetch.
	var numberOfRecordsPerPage = 5;

	$('#prev').click(function () {
		// Store button name.
		var button = 'prev';

		// Increment page number.
		page--;

		// Make request.
		$('#customers').load('load-cutomers.php', {
			button: button,
			page: page,
			numberOfRecordsPerPage: numberOfRecordsPerPage,
			tableName: tableName
		});
	});

	$('#next').click(function () {
		// Store button name.
		var button = 'next';

		// Increment page number.
		page++;

		// Make request.
		$('#customers').load('load-cutomers.php', {
			button: button,
			page: page,
			numberOfRecordsPerPage: numberOfRecordsPerPage,
			tableName: tableName
		});
	});
});
/*######################################################################################*/
							// Pagination for cutomers.php ends
/*######################################################################################*/