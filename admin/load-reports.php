<?php
// Include our Transaction class.
require_once '../bank-include/functions.php';

// Include our configuration file.
require_once '../bank-include/config.php';

// Store the page number.		
$page = htmlspecialchars(stripcslashes(trim($_POST['page'])));

// Page number.
$page += 1;

// Number of records to fetch per page.
$numberOfRecordsPerPage = htmlspecialchars(stripcslashes(trim($_POST['numberOfRecordsPerPage'])));

// Table Name.
$tableName = 'bank_transaction';

// Execute if next is clicked on.
if (isset($_POST['next']) && $_POST['next'] === 'next') {
	// Check if page is set.
	// If set process data.
	if (isset($_POST['page']) && is_numeric($_POST['page'])) {

		// Decrement $page by 1.
		$prev = $page - 1;

		// Offset.
		$offset = ($page - 1) * $numberOfRecordsPerPage;

		#########################################
			// Get the total number of rows.
			$totalRows = getTotalNumOfRows($tableName);
		#########################################

		// Calculate the total number of page.
		$totalPages = ceil($totalRows / $numberOfRecordsPerPage);

		if ($page <= $totalPages) {
			######################################################
				// Get all recent transactions 
				$sql = Transaction::getTransactions($offset, $numberOfRecordsPerPage);
			######################################################
		} else {
			// Print an error messages.
			echo "No more records to dispaly";
		}	
	}
}

// Execute if prev is clicked on.
if (isset($_POST['prev'])) {
	// Set page to page one.
	$prev = htmlspecialchars(stripcslashes(trim($_POST['prev'])));

	// Decrement $page by 1.
	$prev = $page - 1;

	// Offset.
	$offset = ($page - 1) * $numberOfRecordsPerPage;

	#########################################
		// Get the total number of rows.
		$totalRows = getTotalNumOfRows($tableName);
	#########################################

	// Calculate the total number of page.
	$totalPages = ceil($totalRows / $numberOfRecordsPerPage);
	
	##############################################################################
		// Get all recent transactions 
		$sql = Transaction::getTransactions($offset, $numberOfRecordsPerPage);
	##############################################################################
}