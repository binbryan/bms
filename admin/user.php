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
	<?php
		########################################################################
			// Get a list of users.
			// Order by firstname.
			$user = getUserById($id);

			// Collect Full Name.
			$user[0]['fullname'] = $user[0]['firstname'] . " " . $user[0]['middlename'] . " " . $user[0]['lastname'];
		########################################################################
	?>

	<div class="table-responsive">
		<div class='text-center'>
			<img src='<?php echo $user[0]['profilePic']; ?>' alt="<?php echo $user[0]['fullname'] ."'s profile picture"; ?>" style='width: 30%; height: 290px; border-radius: 100%; margin-bottom: 20px;'/>
		<div>

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
				<tr>
					<td><strong>Name:</strong></td>
					<td><?php echo $user[0]['fullname']; ?></td>
				</tr>
				
				<tr>
					<td><strong>Username:</strong></td>
					<td><?php echo $user[0]['username']; ?></td>
				</tr>

				<tr>
					<td><strong>Email ID:</strong></td>
					<td><a href="mailto:"><?php echo $user[0]['email']; ?></a></td>
				</tr>

				<tr>
					<td><strong>User Role:</strong></td>
					<td><?php echo $user[0]['userRole']; ?></td>
				</tr>

				<tr>
					<td><strong>Bio:</strong></td>
					<td>
						<p><?php echo $user[0]['bio']; ?></p>
					</td>
				</tr>

				<tr>
					<td><strong>Created On:</strong></td>
					<td><?php echo getDateFormated($user[0]['createdOn']); ?></td>
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