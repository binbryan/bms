<?php
/**
 * The customer template file that displays the customer's profile.
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */
// Page title.
$pageTitle = 'Profile';

// Include our header.php file
require 'header.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	// Store the user's ID.
	$id = htmlspecialchars(stripcslashes(trim($_GET['id'])));
}

?>

<div class="text-center col-md-12 mb-4 heading">
	<h2>User Profile</h2>
</div>

<div class="container">
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th><h4>Basic Info</h4></th>
					<th>
						<div class="float-right sm-width">							
							<span class="toolkit">Edit Account</span>

							<span><a href="add-customer.php" class="btn btn-cus" id="clear"><i class="fa fa-pencil fa-lg"></i></a></span>

						</div>
					</th>

				</tr>
			</thead>
			
			<tbody>
				<tr">
					<td><strong>Name:</strong></td>
					<td><a href="customer.php">Bin Emmanuel</a></td>
				</tr>

				<tr>
					<td><strong>Gender:</strong></td>
					<td><a href="customer.php">Male</a></td>
				</tr>

				<tr>
					<td><strong>Date Of Birth:</strong></td>
					<td><a href="customer.php">9 Jen 1999</a></td>
				</tr>

				<tr>
					<td><strong>Language:</strong></td>
					<td><a href="customer.php">English</a></td>
				</tr>

			</tbody>

			<thead>
				<tr>
					<th><h4 class="heading">Contact Info</h4></th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td><strong>Email ID:</strong></td>
					<td><a href="customer.php">binemmanuel@mail.com</a></td>
				</tr>

				<tr>
					<td><strong>Phone No:</strong></td>
					<td><a href="customer.php">08181904289</a></td>
				</tr>
			</tbody>


			<thead>
				<tr>
					<th><h4 class="heading">Residence</h4></th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td><strong>Address:</strong></td>
					<td><a href="customer.php">1234 New World St</a></td>
				</tr>

				<tr>
					<td><strong>City:</strong></td>
					<td><a href="customer.php">Abuja</a></td>
				</tr>

				<tr>
					<td><strong>State:</strong></td>
					<td><a href="customer.php">Abuja</a></td>
				</tr>

				<tr>
					<td><strong>Country:</strong></td>
					<td><a href="customer.php">Nigeria</a></td>
				</tr>
			</tbody>

			<thead>
				<tr>
					<th><h4 class="heading">Other Info</h4></th>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<td><strong>Account Name:</strong></td>
					<td><a href="customer.php">Bin Emmanuel</a></td>
				</tr>

				<tr>
					<td><strong>Account Number:</strong></td>
					<td><a href="customer.php">097123512351</a></td>
				</tr>

				<tr>
					<td><strong>Account Type:</strong></td>
					<td><a href="customer.php">Savings Account</a></td>
				</tr>

				<tr>
					<td><strong>Current Balance:</strong></td>
					<td><a href="customer.php">$0</a></td>
				</tr>
			</tbody>
		</table>

		<span>
			<button class="btn danger float-right"><i class='fa fa-trash'></i>&nbsp; Delete </button>
		</span>
	</div>
</div>


<?php
// Include our footer.php file
require 'footer.php';
?>