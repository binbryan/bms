<?php
// Page title.
$pageTitle = ' Test Customers';

// Include our header.php file
require 'header.php';

// Table Name.
$tableName = 'bank_customers';

// Store the to rows.
$totalRows = getTotalNumOfRows($tableName);

/*if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }
    $offset = ($pageno-1) * $no_of_records_per_page;
}*/

// Execute if Page Number is set.
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	// Store the Page Number.
	$page = htmlspecialchars(stripcslashes(trim($_GET['page'])));
	
	// Store Prev's Button Number.
	//$prev = $page - 2;
} elseif (empty($_GET['page']) || $_GET['page'] < 0) {
	// Page Number should be one if the Page Number is not set.
	$page = 1;
}

// Number of records to fetch per page.
$numberOfRecordsPerPage = 2;

// Offset.
$offset = ($page - 1) * $numberOfRecordsPerPage;

// Calculate the total number of page.
$totalPages = ceil($totalRows / $numberOfRecordsPerPage);

// Store the CSS class in $class
// if the Page Number is greater than the total page.
if ($page >= $totalPages) {
	$class = 'disabled';
}

// Keep track of the last page.
$counter = 0;
while ($counter < $totalPages) {
	$counter++;
}

?>

<div class="col-md-12" id="result">
	<div class="text-center col-md-12 mb-4 heading">
		<h2>Customers</h2>
	</div>

	<!-- .container -->
	<div class="container">
		<!-- .table-responsive -->
		<div class="table-responsive">
			<!-- .table -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Sr.</th>
						<th>Name</th>
						<th>Account No</th>
						<th>Email</th>
						<th>Phone No</th>
						<th>Created On</th>
						<th>Status</th>
						<th>
							<div class="float-right sm-width">
								<span class="toolkit">Create a New Account</span>
								<a href="add-customer.php" class="btn btn-cus" id="clear"><i class="fa fa-plus"></i></a>
							</div>
						</th>
					</tr>
				</thead>
				
				<tbody>
					<div id="customers">
						<?php 
						######################################
							// Get a list of our customers.
							// Order by firstname.
							getCustomer('firstname', $offset, $numberOfRecordsPerPage);
						######################################
						?>
					</div>
				</tbody>
			</table>
			<!-- .table ends -->

			<?php include 'pagination.php'; ?>
			
		</div>
		<!-- table-responsive ends -->
	</div>
	<!-- .container ends -->
</div>
