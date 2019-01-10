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

?>

<div class="text-center col-md-12 mb-4 heading">
	<h2>Admin Users</h2>
</div>

<div class="container">
	<div class="col-md-12 mb-4">
		<div class="container profile-area">
			<?php
				$users = getUser();

				foreach ($users as $user) {
					echo "
						<div class='row'>
							<div class='profile-wrap col-md-12'>
								<i class='fa fa-pencil fa-lg float-right'></i>

								<div class='col-md-3 float-left'>
									<img src='". $user['profilePic'] ."' style='box-shadow: 0px 2px 10px rgba(,0,0,.1); border-radius: 100%; height: 223px; width: 100%;'>
								</div>

								<div class='col-md-9 float-right'>
									<div class='table-responsive' >
										<p>
											<table class='mb-2'>
												<tbody class='table'>
													<tr id='profile-wrap-table'>
														<td><strong>Name:</strong></td>
														<td id='left-spacing'>". $user['firstname'] .' '. $user['middlename'] .' '. $user['lastname'] ."</td>
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
		</div>
	</div>
</div>

<?php
// Include our footer.php file
require 'footer.php';
?>