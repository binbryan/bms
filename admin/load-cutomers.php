<?php 
// Include our Transaction class.
require_once '../bank-include/functions.php';

// Include our configuration file.
require_once '../bank-include/config.php';

echo "<pre>";
print_r($_POST);
echo "</pre>";
if (!empty($_POST['numberOfRecordsPerPage']) && !empty($_POST['page'])) {
	// Store the Number of Records to be fetched.
	$numOfRecoreds = htmlspecialchars(stripcslashes(trim($_POST['numberOfRecordsPerPage'])));

	// Store the Page Number.
	$page = htmlspecialchars(stripcslashes(trim($_POST['page'])));
}
// Calclate the offset.
$offset = ($page - 1) * $numOfRecoreds;

echo "<br> offset :";
echo $offset;

?>

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
			######################################
				// Get a list of our customers.
				// Order by firstname.
				var_dump(getCustomer('firstname', $offset, $numOfRecoreds));
			######################################
		?>
		</tbody>
	</table>
		<?php include "pagination.php"; ?>
</div>