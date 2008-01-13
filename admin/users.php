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
	<div class="table-responsive">
		<table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Sr.</th>
					<th>Name</th>
					<th>Account No</th>
					<th>Email</th>
					<th>Phone No</th>
					<th>Date</th>
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
				<tr>
					<td>1</td>
					<td><a href="customer.php">Bin Emmanuel</a></td>
					<td>08923956362346</td>
					<td><a href="mailto:binemmanuel@mail.com">mailto:binemmanuel@mail.com</a></td>
					<td>0832682360</td>
					<td>0832682360</td>
					<td class="active">Active</td>
					<td><button class="btn danger float-right"><i class='fa fa-trash'></i>&nbsp; Delete </button></td>
				</tr>

				<tr>
					<td>2</td>
					<td>Bin Emmanuel</td>
					<td>08923956362346</td>
					<td>binemmanuel@mail.com</td>
					<td>0832682360</td>
					<td>0832682360</td>
					<td class="active">Active</td>
					<td><button class="btn danger float-right"><i class='fa fa-trash'></i>&nbsp; Delete </button></td>
				</tr>

				<tr>
					<td>3</td>
					<td>Bin Emmanuel</td>
					<td>08923956362346</td>
					<td>binemmanuel@mail.com</td>
					<td>0832682360</td>
					<td>0832682360</td>
					<td class="active">Active</td>
					<td><button class="btn danger float-right"><i class='fa fa-trash'></i>&nbsp; Delete </button></td>
				</tr>
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

<?php
// Include our footer.php file
require 'footer.php';
?>