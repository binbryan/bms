<?php
/**
 * Search class.
 */
class Search{
	/*
	 *	@var string The To search from.
	 */
	public $keyWord;

	/*
	 *	@var string Where the request is coming from.
	 */
	public $page;

	function __construct(string $keyWord, string $page){
		if (!empty($keyWord)) {
			$this->keyWord = htmlspecialchars(stripcslashes(trim($keyWord)));
		}

		if (!empty($page)) {

			$this->page = htmlspecialchars(stripcslashes(trim($page)));
		}
	}


	public function search() {
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		// Mysqli escape string.
		$this->keyWord = mysqli_real_escape_string($conn, $this->keyWord);
		$this->page = mysqli_real_escape_string($conn, $this->page);

		switch ($this->page) {
			case '/bank/admin/customers.php':

				if (is_numeric($this->keyWord)) {

					$sql = "SELECT id, firstname, middlename, lastname, acctNum, email, phoneNo, createdOn, active FROM bank_customers WHERE acctNum LIKE $this->keyWord";
					
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						if ($row = $result->fetch_assoc() ) {
							// Store Customer's data
							$data = [];
							array_push($data, $row);
				
							if (isset($data[0]['active']) && $data[0]['active'] == 1) {
								$data[0]['active'] = 'Active';

								$class = "class='active'";
							} else {
								$data[0]['active'] = 'Inactive';

								$class = "
									style='color: brown;
									font-weight: bold;
								'";
							}

							// Count column.
							$count = 0;
							$count++;
							for ($i = 0; $i < $count; $i++) { 
								$Sr = $count;
							}

							// Display account details.
							$data = "
								<div class='text-center col-md-12 mb-4 heading'>
									<h2>Customers</h2>
								</div>

								<div class='table-responsive' id='search'>
									<table class='table table-striped'>
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
													<div class='float-right sm-width'>
														<span class='toolkit'>Create a New Account</span>
														<a href='add-customer.php' class='btn btn-cus' id='clear'><i class='fa fa-plus'></i></a>
													</div>
												</th>
											</tr>
										</thead>
										
										<tbody>
											<tr>
												<td>". $Sr ."</td>
												<td><a href='profile.php?id=". $data[0]['id'] ."'>". $data[0]['firstname'] .' '. $data[0]['middlename'] .' '. $data[0]['lastname'] ."</a></td>
												<td>". $data[0]['acctNum'] ."</td>
												<td><a href='mailto:binemmanuel@mail.com'>". $data[0]['email'] ."</a></td>
												<td>". $data[0]['phoneNo'] ."</td>
												<td>". getDateFormated( $data[0]['createdOn'] ) ."</td>
												<td ". $class .">". $data[0]['active'] ."</td>
												<td>
													<span>
														<a href='?id=". $data[0]['id'] ."&action=delete' class='btn danger delete-btn float-right'><i class='fa fa-trash'></i>&nbsp; Delete </a>
													</span>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							";

							return $data;
						}
					}
				} elseif (is_string($this->keyWord)) {
					$sql = "SELECT id, firstname, middlename, lastname, acctNum, email, phoneNo, createdOn, active FROM bank_customers WHERE firstname = '$this->keyWord' OR middlename = '$this->keyWord' OR lastname = '$this->keyWord'";
				
					$result = $conn->query($sql);


					if ($result->num_rows > 0) {
						// Count column.
						$count = 1;

						$data = "
							<div class='text-center col-md-12 mb-4 heading'>
								<h2>Customers</h2>
							</div>
							
							<div class='table-responsive'>
								<table class='table table-striped'>
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
												<div class='float-right sm-width'>
													<span class='toolkit'>Create a New Account</span>
													<a href='add-customer.php' class='btn btn-cus' id='clear'><i class='fa fa-plus'></i></a>
												</div>
											</th>
										</tr>
									</thead>
									
									<tbody>
						";
						
						while ($rows = $result->fetch_assoc()) {
							$Sr = $count++;

							if ($rows['active'] == 1) {
								$active = 'Active';

								$class = "class='active'";
							} else {
								$active = 'Inactive';

								$class = "
									style='color: brown;
									font-weight: bold;
								'";
							}
							$data .= "
								<tr>
									<td>". $Sr ."</td>
									<td><a href='profile.php?id=". $rows['id'] ."'>". $rows['firstname'] .' '. $rows['middlename'] .' '. $rows['lastname'] ."</a></td>
									<td>". $rows['acctNum'] ."</td>
									<td><a href='mailto:binemmanuel@mail.com'>". $rows['email'] ."</a></td>
									<td>". $rows['phoneNo'] ."</td>
									<td>". getDateFormated( $rows['createdOn'] ) ."</td>
									<td ". $class .">". $active ."</td>
									<td>
										<span>
											<a href='?id=". $rows['id'] ."&action=delete' class='btn danger delete-btn float-right'><i class='fa fa-trash'></i>&nbsp; Delete </a>
										</span>
									</td>
								</tr>
							";

							// Store Customer's data
						}
						
						$data .= "
									</tbody>
								</table>
							</div>
						";

						return $data;
					} else {
						echo "
							<div class='text-center col-md-12 mb-4 heading'>
								<h3>Search Results</h3>
							</div>

							<div>
								<h4>Nothing Found</h4>
								<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
							</div>
						";
					}

				}
				break;

			case '/bank/admin/profile.php':
				if (is_string($this->keyWord)) {
					// Prepare a statement.
					$sql = "SELECT * FROM bank_customers WHERE firstname = '$this->keyWord' OR middlename = '$this->keyWord' OR lastname = '$this->keyWord'";

					$result = $conn->query($sql);

					$data = array();

					// Count users.
					$count = 0;

					if ($result == true && $result->num_rows > 0) {
						// Retrieve rows.
						while ($row = $result->fetch_assoc()) {
							// Increment var count.
							$count++;

							// Initialize an empty variable.
							$class = "";

							if ($count > 1) {
								$class = "top-spacing";
							}

							echo "
								<div class='text-center col-md-12 mb-4 heading ". $class ."'>
									<h2>Customer's Profile</h2>
								</div>
							";

							##################
							#	Basic Info   #
							##################
							echo "
							<table class='table table-striped table-sm'>
								<thead>
									<tr>
										<th><h4>Basic Info</h4></th>
									</tr>
								</thead>

								<tbody>
									<tr'>
										<td><strong>Name:</strong></td>
										<td>". $row['firstname'] .' '. $row['middlename'] .' '. $row['lastname'] ."</td>
										<td></td>
									</tr>

									<tr>
										<td><strong>Gender:</strong></td>
										<td>". $row['gender'] ."</td>
										<td></td>
									</tr>

									<tr>
										<td><strong>Date Of Birth:</strong></td>
										<td>". getDateFormated( $row['dateOfBirth'] ) ."</td>
										<td></td>
									</tr>
								</tbody>
							";

							####################
							#	Contact Info   #
							####################
							echo "
								<thead>
									<tr>
										<th><h4 class='heading'>Contact Info</h4></th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td><strong>Email ID:</strong></td>
										<td>". $row['email'] ."</td>
										<td>
											<div class='float-right sm-width'>
												<span>
													<a href='?action=editEmail&id=". $row['id'] ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
												</span>
											</div>
										</td>
									</tr>

									<tr>
										<td><strong>Phone No:</strong></td>
										<td>". $row['phoneNo'] ."</td>
										<td>
											<div class='float-right sm-width'>
												<span>
													<a href='?action=editPhoneNo&id=". $row['id'] ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
												</span>
											</div>
										</td>
									</tr>
								</tbody>
							";

							#################
							#	Residence   #
							#################
							echo "
								<thead>
									<tr>
										<th><h4 class='heading'>Residence</h4></th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td><strong>Address:</strong></td>
										<td>". $row['address'] .', '. $row['state'] .', '. $row['country']."</a></td>
										<td>
											<div class='float-right sm-width'>
												<span>
													<a href='?action=editAddress&id=". $row['id'] ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
												</span>
											</div>
										</td>
									</tr>

									<tr>
										<td><strong>City:</strong></td>
										<td>". $row['state'] ."</td>
										<td>
											<div class='float-right sm-width'>
												<span>
													<a href='?action=editCity&id=". $row['id'] ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
												</span>
											</div>
										</td>
									</tr>

									<tr>
										<td><strong>Country:</strong></td>
										<td>". $row['country'] ."</td>
										<td></td>
									</tr>
								</tbody>
							";

							##################
							#	Other Info   #
							##################
							echo "
								<thead>
									<tr>
										<th><h4 class='heading'>Other Info</h4></th>
									</tr>
								</thead>
								
								<tbody>
									<tr>
										<td><strong>Account Name:</strong></td>
										<td>". $row['firstname'] .' '. $row['middlename'] .' '. $row['lastname'] ."</td>
										<td></td>
									</tr>

									<tr>
										<td><strong>Account Number:</strong></td>
										<td>". $row['acctNum'] ."</td>
										<td></td>
									</tr>

									<tr>
										<td><strong>Account Type:</strong></td>
										<td>". $row['acctType'] ."</td>
										<td></td>
									</tr>

									<tr>
										<td><strong>Current Balance:</strong></td>
										<td>₦ ". number_format($row['acctBal']) ."</td>
										<td></td>
									</tr>

									<tr>
										<td><strong>Created On:</strong></td>
										<td>". getDateFormated($row['createdOn']) ."</td>
										<td></td>
									</tr>
								</tbody>

							</table>

							<span>
								<a href='?id=". $row['id'] ."&action=delete' class='btn danger delete-btn float-right'><i class='fa fa-trash'></i>&nbsp; Delete </a>
							</span>
							";
						}
					} else {
						echo "
							<div class='text-center col-md-12 mb-4 heading'>
								<h3>Search Results</h3>
							</div>

							<div>
								<h4>Nothing Found</h4>
								<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
							</div>
						";
					}
				}
				break;
			
			default:
				echo "
					<div class='text-center col-md-12 mb-4 heading'>
						<h3>Search Results</h3>
					</div>

					<div>
						<h4>Nothing Found</h4>
						<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
					</div>
				";
				break;
		}
		
		// Close connection.
		$conn->close();		
	}
}