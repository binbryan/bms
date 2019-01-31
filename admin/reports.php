<?php
/**
 * The report template file.
 *
 * Author: Bin Emmanuel
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Page title.
$pageTitle = 'Report';

// Include our header.php file
require 'header.php';
?>

<div class="col-md-12" id="result">
	<div class="text-center col-md-12 mb-4 heading">
		<h5>Reports</h5>
	</div>
	
	<?php include 'test2.php'; ?>

	<div class="report-section col-md-12 mb-4">
		
		<!-- Side Bar -->
		<div class="row col-md-4 col-sm-12 float-right">
			<div class="sidebar-content col-md-12">
				<div class="sidebar-heading col-md-12">
					<h5 class="text-center"> Newly Registered Customers </h5>
				</div>
			
				<div class="sidebar-body container">
					<div class="table-responsive" >
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>Acct No</th>
								</tr>
							</thead>

							<tbody>
								<?php
								#####################################################
									// Get a list of newly registered  customers.
									// Order by firstname.
									getCustomer('createdOn', 0, 5);
								#####################################################
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="sidebar-content col-md-12">
				<div class="sidebar-heading col-md-12">
					<h5 class="text-center"> Newly Registered Users </h5>
				</div>
				
				<div class="sidebar-body container">
					<div class="table-responsive" >
						<table class="table table-striped">
							<thead>
								<tr>
									<th>Name</th>
									<th>User Role</th>
								</tr>
							</thead>

							<tbody>
								<?php
								##############################################
									// Get a list of newly register users.
									// Order by firstname.
									$users = getUser('createdOn' , 0, 5);
								##############################################

								foreach ($users as $user) {
									echo "
										<tr>
											<td>". $user['firstname'] ." ". $user['middlename'] ." ". $user['lastname'] ."</td>
											<td>". $user['userRole'] ."</td>
										</tr>
									";
								}

								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Side Bar Ends -->

		<!-- <div class="col-lg-12 col-12">
            <div class="resorce-wrap">
                <div id="chartContainer">
                </div>
            </div>
        </div> -->

		


		<!-- Transaction Row -->
        <div class='row col-md-8'>
			<div class="container ">
				<div class="transaction-heading text-center">
					Transactions
				</div>

				<div class="container">
					

					<div class="transactions transaction-area">
						<?php
						######################################################
							// Get all recent transactions 
							$transaction = Transaction::getTransactions(0, 5);
						######################################################
						?>

					</div>
						
					<div>
						<button class='btn btn-cus float-left' id='prev'> Prev </button>

						<button class='btn btn-cus float-right' id='next'> Next </button>
					</div>
				</div>

			</div>

		</div>
		<!-- Transaction Row ends -->


	</div>

</div>

<?php
// Include our footer.php file
require 'footer.php';
?>