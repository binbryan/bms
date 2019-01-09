<?php
/**
 * Search class.
 */
class Search{
	/*
	 *	@var string The To search from.
	 */
	public $keyWord;

	function __construct( string $keyWord = null){
		if (!empty($keyWord)) {
			$this->keyWord = $keyWord;
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

		if (is_numeric($this->keyWord)) {
			$sql = "SELECT id, firstname, middlename, lastname, acctNum, email, phoneNo, createdOn, active FROM bank_customers WHERE acctNum LIKE $this->keyWord";
			
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				if ($row = $result->fetch_assoc() ) {
					// Store Customer's data
					$data = [];
					array_push($data, $row);
		
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
				echo $data;
			}

		} else {
			echo "Ooop!, searched term not fount.";
		}

		// Close connection.
		$conn->close();
		
	}
}

/*$search = new search('emmanuel');

var_dump($search->search());
*/