<?php
/**
 * The customer template file.
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

/*
 * Delete customer script.
 */
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] = 'delete') {
	$id = $_GET['id'];

	echo "
		<div class='delete-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='delete-modal-body'>
				<p>Are you sure you want to delete this account?</p>
				
				<p style='margin-top: 30px;'' class='float-right'>
					<a href='?id=". $id ."&delete=yes' class='yes-btn'><i class='fa fa-check'></i>&nbsp; Yes</a>
					<a class='no-btn close' id='close'><i class='fa fa-close'></i>&nbsp; No</a>
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

?>

<div class="col-md-12" id="result">
	<div class="text-center col-md-12 mb-4 heading">
		<h2>Customers</h2>
	</div>

	<div class="container">
		<div class="table-responsive" >
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
					
					<?php 
					##################################
					// Get a list of our customers
						getCustomer();
					##################################
					?>
					
				</tbody>
			</table>

			<nav aria-label="page navigation" class="pagination-sm float-right">
				<ul class="pagination">
					<li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span class="" aria-hidden="true">Prev</span></a></li>
					<li class="page-item active"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">4</a></li>
					<li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">Next</span></a></li>
				</ul>
			</nav>

		</div>
	</div>
</div>

<?php
// Include our footer.php file
require 'footer.php';
?>