<?php
/**
 * The customers template file.
 *
 * Author: Bin Emmanuel
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Page title.
$pageTitle = 'Customers';

// Include our header.php file
require 'header.php';

// Table Name.
$tableName = 'bank_customers';

// Store the to rows.
$totalRows = getTotalNumOfRows($tableName);

// Execute if Page Number is set.
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
	// Store the Page Number.
	$page = htmlspecialchars(stripcslashes(trim($_GET['page'])));	
} elseif (empty($_GET['page']) || $_GET['page'] < 0) {
	// Page Number should be one if the Page Number is not set.
	$page = 1;
}

// Number of records to fetch per page.
$numberOfRecordsPerPage = 5 ;

// Offset.
$offset = ($page - 1) * $numberOfRecordsPerPage;

// Calculate the total number of page.
$totalPages = ceil($totalRows / $numberOfRecordsPerPage);

// Store the CSS class in $class
// if the Page Number is greater than the total page.
if ($page >= $totalPages) {
	$class = 'disabled';
}

#################################################################################################
									//Delete customer script.
#################################################################################################
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] = 'delete') {
	$id = $_GET['id'];

	echo "
		<div class='delete-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='delete-modal-body'>
				<p>Are you sure you want to delete this account?</p>
				
				<p style='margin-top: 30px;'' class='float-right'>
					<a href='?id=". $id . "&delete=yes' class='yes-btn'><i class='fa fa-check'></i>&nbsp; Yes</a>
					<a href='?id=". $id ."' class='no-btn close' id='close'><i class='fa fa-close'></i>&nbsp; No</a>
				</p>
			</div>
		</div>
	";	
}

if (isset($_GET['delete']) && $_GET['delete'] === "yes") {
	// Store the ID of the account we want to delete.
	$id = $_GET['id'];

	#############################
		// Delete.
		if (delCustomerAcct($id) === true) { ?>
			<script type="text/javascript">
				$('document').ready(function () {
					alert('Account deleted successfully');
				});
			</script>
		<?php }
	#############################
}
#################################################################################################
									//Delete customer script Ends.
#################################################################################################

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

<?php
// Include our footer.php file
require 'footer.php';
?>