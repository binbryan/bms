<?php
/**
 * The customer template file.
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Page title.
$pageTitle = 'Admin Users';

// Include our header.php file
require 'header.php';

// Table Name.
$tableName = 'bank_users';

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
$numberOfRecordsPerPage = 5;

// Offset.
$offset = ($page - 1) * $numberOfRecordsPerPage;

// Calculate the total number of page.
$totalPages = ceil($totalRows / $numberOfRecordsPerPage);

// Store the CSS class in $class
// if the Page Number is greater than the total page.
if ($page >= $totalPages) {
	$class = 'disabled';
}

$counter = 0;
while ($counter <= $totalPages) {
	$counter++;
}

?>

<!-- .text-center .col-md-12 .mb-4 .heading -->
<div class="text-center col-md-12 mb-4 heading">
	<h2>Admin Users</h2>
</div>
<!-- .text-center .col-md-12 .mb-4 .heading ends -->

<!-- .container -->
<div class="container">
	<!-- .col-md-12 .mb-4 ends -->
	<div class="col-md-12 mb-4">
		<!-- .container .profile-area -->
		<div class="container profile-area">
			<?php
				########################################################################
					// Get a list of users.
					// Order by firstname.
					$users = getUser('firstname', $offset, $numberOfRecordsPerPage);
				########################################################################

				foreach ($users as $user) {
					if (empty($user['profilePic'])) {
						$user['profilePic'] = DEFUALTPROFILEPIC;
					}
					echo "
						<div class='row'>
							<div class='profile-wrap col-md-12'>
								<i class='fa fa-pencil fa-lg float-right'></i>

								<div class='col-md-3 float-left'>
									<a href='user.php?id=". $user['id'] ."'>
										<img src='". $user['profilePic'] ."' style='box-shadow: 0px 2px 10px rgba(,0,0,.1); border: 2px solid gray; border-radius: 100%; height: 208px; width: 100%;' class='mb-4'>

										<p class='text-center'><strong>". $user['firstname'] .' '. $user['middlename'] .' '. $user['lastname'] ."</strong></p>

									</a>
								</div>

								<div class='col-md-9 float-right'>
									<div class='table-responsive' >
										<p>
											<table class='mb-5'>
												<tbody class='table'>
													<tr id='profile-wrap-table'>
														<td><strong>Name:</strong></td>
														<td id='left-spacing'>
															<a href='user.php?id=". $user['id'] ."'>".
																$user['firstname'] .' '. $user['middlename'] .' '. $user['lastname'] ."
															</a>
														</td>
														<td></td>
														<td></td>
														
														<td><strong>Username:</strong></td>										
														<td id='left-spacing'>". $user['username'] ."</td>
													</tr>

													<tr>
														<td><strong>Email:</strong></td>
														<td>". $user['email'] ."</td>									
														<td></td>
														<td></td>
																									
														<td><strong>Country:</strong></td>
														<td>Nigeria</td>
													</tr>

													<tr>
														<td><strong>User Role:</strong></td>
														<td>". $user['userRole'] ."</td>
														<td></td>
														<td></td>

														<td><strong>Created On:</strong></td>
														<td>". getDateFormated($user['createdOn']) ."</td>
													</tr>
												</tbody>
											</table>
										</p>
									</div>
										
									<h3>Bio</h3>
									<p>
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris.
									</p>
								</div>
							</div>
						</div>
					";


				}
			?>
			<?php include 'pagination.php'; ?>
		</div>
		<!-- .container .profile-area ends -->
	</div>
	<!-- .col-md-12 .mb-4 ends -->
</div>
<!-- .container ends -->

<?php
// Include our footer.php file
require 'footer.php';
?>
