<?php
// Include our User class
require_once 'classes/user.php';

// Include our User class.
require_once 'classes/customer.php';

// Include our Transaction class.
require_once 'classes/transaction.php';

// Include our Search class.
require_once 'classes/search.php';

/*
 * The function that inserts a Post into the database.
 *
 * @param string User's username.
 * @param string User's password.
 * @param string User's email.
 * @param string The user's role.
 * @param string Account verification token.
 * 
 * @return bool Returns false true if user recored was inserted.
 */
function addUser(string $username, string $password, string $email, string $userRole, string $token): bool{
	/* Initialize a null ID */
	$id = null;

	/*
	 * Store required data if they are not empty.
	 */
	$param_username = $username;
	$param_password = $password;
	$param_email = $email;
	$param_userRole = $userRole;
	$param_token = $token;

	/*
	 * Instantiate an object.
	 */
	$user = new User($id, $username, $password, $email, $userRole, $token);

	// Insert user date into the database.
	if ($user->insert() == true) {
		return true;
	}
	return false;
}

/*
 * The function that inserts a Post into the database.
 *
 * @param string User's username.
 * @param string User's password.
 * @param string User's email.
 * @param string The user's first name.
 * @param string The user's middle name.
 * @param string The user's last name.
 * @param string The user's phoneNo.
 * @param string The user's date of birth.
 * @param string The user's address.
 * @param string The user's Local Government Area.
 * @param string The user's city.
 * @param string The user's state.
 * @param string The user's passport.
 * @param string Account activation.
 * 
 * @return bool Returns false true if user recored was inserted.
 */
function addCustomer(string $username, string $password, string $email, string $firstname, string $middlename = null, string $lastname, int $acctNum = null, $acctType, string $phoneNo, string $dateOfBirth, string $address, string $gender, string $country, string $lga, string $state, string $passport): bool{
	/* Initialize a null ID */
	$id = null;
	$acctBal = null;

	if (!empty($middlename)) {
		$middlename = $middlename;
	}
		
	/*
	 * Instantiate an object.
	 */
	$customer = new Customer($id, $username, $firstname, $middlename, $lastname, $acctType, $acctNum, $acctBal, $password, $email, $phoneNo, $dateOfBirth, $address, $gender, $lga, $country, $state, $passport);

	// Insert user date into the database.
	if ($customer->insert() == true) {
		return true;
	}	
	return false;
}

/*
 * The function that inserts a Post into the database.
 *
 * @param string User's email.
 * @param string The user's phoneNo.
 * @param string The user's address.
 * @param string The user's city.
 * 
 * @return bool Returns false true if user recored was inserted.
 */
function updateAccount(int $id, string $email = null, string $phoneNo = null, string $address = null, string $city = null/*, string $passport*/): bool{
	if (!empty($email)) {
		// Instantiate all param to NULL.
		$username = null;
		$firstname = null;
		$middlename = null;
		$lastname = null;
		$acctType = null;
		$acctNum = null;
		$acctBal = null;
		$password = null;
		$dateOfBirth = null;
		$address = null;
		$gender = null;
		$lga = null;
		$country = null;
		$state = null;

		// Collect data to be uploaded.
		$email = $email;

		/*
		 * Instantiate an object.
		 */
		$customer = new Customer($id, $username, $firstname, $middlename, $lastname, $acctType, $acctNum, $acctBal, $password, $email, $phoneNo, $dateOfBirth, $address, $gender, $lga, $country, $state/*, $passport*/);

		// Insert user date into the database.
		if ($customer->updateEmail() === true) {
			return true;
		}
	}

	if (!empty($phoneNo)) {
		// Instantiate all param to NULL.
		$username = null;
		$firstname = null;
		$middlename = null;
		$lastname = null;
		$acctType = null;
		$acctNum = null;
		$acctBal = null;
		$password = null;
		$email = null;
		$dateOfBirth = null;
		$address = null;
		$gender = null;
		$lga = null;
		$country = null;
		$state = null;

		// Collect data to be uploaded.
		$phoneNo = $phoneNo;

		/*
		 * Instantiate an object.
		 */
		$customer = new Customer($id, $username, $firstname, $middlename, $lastname, $acctType, $acctNum, $acctBal, $password, $email, $phoneNo, $dateOfBirth, $address, $gender, $lga, $country, $state/*, $passport*/);

		// Insert user date into the database.
		if ($customer->updatePhoneNo() === true) {
			return true;
		}
	}
	
	if (!empty($address)) {
		// Instantiate all param to NULL.
		$username = null;
		$firstname = null;
		$middlename = null;
		$lastname = null;
		$acctType = null;
		$acctNum = null;
		$acctBal = null;
		$password = null;
		$email = null;
		$phoneNo = null;
		$dateOfBirth = null;
		$gender = null;
		$lga = null;
		$country = null;
		$state = null;

		// Collect data to be uploaded.
		$address = $address;

		/*
		 * Instantiate an object.
		 */
		$customer = new Customer($id, $username, $firstname, $middlename, $lastname, $acctType, $acctNum, $acctBal, $password, $email, $phoneNo, $dateOfBirth, $address, $gender, $lga, $country, $state/*, $passport*/);

		// Insert user date into the database.
		if ($customer->updateAddress() === true) {
			return true;
		}
	}

	if (!empty($city)) {
		
		$username = null;
		$firstname = null;
		$middlename = null;
		$lastname = null;
		$acctType = null;
		$acctNum = null;
		$acctBal = null;
		$password = null;
		$email = null;
		$phoneNo = null;
		$dateOfBirth = null;
		$address = null;
		$gender = null;
		$lga = null;
		$country = null;

		// Collect data to be uploaded.
		$state = $city;

		/*
		 * Instantiate an object.
		 */
		$customer = new Customer($id, $username, $firstname, $middlename, $lastname, $acctType, $acctNum, $acctBal, $password, $email, $phoneNo, $dateOfBirth, $address, $gender, $lga, $country, $state/*, $passport*/);

		// Insert user date into the database.
		if ($customer->updateCity() === true) {
			return true;
		}
	}
	
	return false;
}

/*
 * The function that deletes a customer's account.
 *
 * @param int Customer's ID.
 * 
 * @return bool Returns false || true if the customer's email ID already exits.
 */
function getCustomer(string $orderBy, int $offset, int $numCustomers = null) {
	// Get a large number of customers if $numCustomers is not specified.
	if (is_null($numCustomers)) {
		$numCustomers = 2000000;
	}

	/*
	 * Instantiate an object.
	 */
	$customers = Customer::getCustomers($orderBy, $offset, $numCustomers);

	switch ($_SERVER['PHP_SELF']) {
		case '/bank/admin/customers.php':
			// Get data in a tabular form if list is set to true.
			if (empty($customers)) {
				echo "
					<tr>
						<td></td>
						<td><a href='add-customer.php' >Click here to create an account.</a></td>
						<td></td>				
						<td></td>				
						<td></td>				
						<td></td>				
						<td></td>				
						<td></td>				
					</tr>
				";
			} else {
				// Count the number of rows.
				$count = 0;

				foreach ($customers as $customer) {
					if (isset($customer->active) && $customer->active === 1) {
						$customer->active = 'Active';

						$class = "class='active'";
					} else {
						$customer->active = 'Inactive';

						$class = "
							style='color: brown;
							font-weight: bold;
						'";
					}

					// Count column.
					$count++;
					for ($i = 0; $i < $count; $i++) { 
						$Sr = $count;
					}

					// Display account details.
					echo "
						<tr>
							<td>". $Sr ."</td>
							<td><a href='profile.php?id=". $customer->id ."'>". $customer->firstname .' '. $customer->middlename .' '. $customer->lastname ."</a></td>
							<td>". $customer->acctNum ."</td>
							<td><a href='mailto:binemmanuel@mail.com'>". $customer->email ."</a></td>
							<td>". $customer->phoneNo ."</td>
							<td>". getDateFormated( $customer->createdOn ) ."</td>
							<td ". $class .">". $customer->active ."</td>
							<td>
								<span>
									<a href='?id=". $customer->id ."&action=delete' class='btn danger delete-btn float-right'><i class='fa fa-trash'></i>&nbsp; Delete </a>
								</span>
							</td>
						</tr>
					";
				} // End of for loop
			}
			break;
			
		case '/bank/admin/reports.php':
			// Iterate though the customers object.
			foreach ($customers as $customer) {
				echo "
					<tr>
						<td>". $customer->firstname .' '. $customer->middlename .' '. $customer->lastname ."</td>
						<td>". $customer->acctNum ."</td>
					</tr>
				";
			}
			break;

		default:
			# code...
			break;
	}


} // End of function.

/*
 * The function fetches a list of user's from the db by ID
 *
 * @param int Number of customer's to fetch.
 * @param string sorting.
 * 
 * @return bool Returns false || true user's data was fetched successfully.
 */

function getUser(int $numCustomers = null, string $order = null): array {
	// Get a large number of customers if $numCustomers is not specified.
	if (is_null($numCustomers)) {
		$numCustomers = 2000000;
	}

	// Initialize an empty array.
	$data = [];

	switch ($_SERVER['PHP_SELF']) {
		case '/bank/admin/users.php':
			/*
			 * Instantiate an object.
			 */
			if (User::getUsers($numCustomers, $order) == true) {
				array_push($data, User::getUsers($numCustomers, $order));

				foreach ($data as $user) {
					return $user;
				}
			}
			break;

		case '/bank/admin/reports.php':
			/*
			 * Instantiate an object.
			 */
			if (User::getUsers($numCustomers, $order) == true) {
				array_push($data, User::getUsers($numCustomers, $order));

				foreach ($data as $user) {
					return $user;
				}
			}
			break;

		default:
			# code...
			break;
	}

	return false;
}

/*
 * The function fetches a list of user's from the db by ID
 *
 * @param int Customer's ID.
 * 
 * @return bool Returns false || true if the customer's email ID already exits.
 */

/*
 * The function that formats date to d, m year.
 *
 * @param date Date to be formated.
 * 
 */
function getDateFormated(string $date) {
	/*
	 *Format date to d, m year.
	 */
	// Split date.
	$split = explode(' ', $date);

	$dateFormat = $split[0]; // Remove time.
	
	// Change the format.
	$split = explode('-', $dateFormat);
	// Created the desired format.
	$dateFormat = $split[2] .'-'. $split[1] .'-'. $split[0];

	$formatedDate = strtotime($dateFormat);

	$dateFormat = date('j M, Y', $formatedDate);
	
	return $dateFormat;
}

/*
 * The function that fetches newly registered customers data by ID.
 *
 * @param int number of customers to fetch.
 *
 * @return A table of The customer's data.
 */
function getNewCutomers( string $n) {
	
}

/*
 * The function that fetches customers data by ID.
 *
 * @param int Customer's ID.
 * 
 * @return A table of The customer's data.
 */
function getCustomerById($id = null){
	if (empty($id)) {
		$id = 46;
	}

	/*
	 * Instantiate an object.
	 */
	$customer = Customer::getById($id);

	if (empty($customer[0]->acctBal)) {
		$customer[0]->acctBal = 00.0;
	}

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
				<td>". $customer[0]->firstname .' '. $customer[0]->middlename .' '. $customer[0]->lastname ."</td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Gender:</strong></td>
				<td>". $customer[0]->gender ."</td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Date Of Birth:</strong></td>
				<td>". getDateFormated( $customer[0]->dateOfBirth ) ."</td>
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
				<td>". $customer[0]->email ."</td>
				<td>
					<div class='float-right sm-width'>
						<span>
							<a href='?action=editEmail&id=". $customer[0]->id ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
						</span>
					</div>
				</td>
			</tr>

			<tr>
				<td><strong>Phone No:</strong></td>
				<td>". $customer[0]->phoneNo ."</td>
				<td>
					<div class='float-right sm-width'>
						<span>
							<a href='?action=editPhoneNo&id=". $customer[0]->id ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
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
				<td>". $customer[0]->address .', '. $customer[0]->state .', '. $customer[0]->country."</a></td>
				<td>
					<div class='float-right sm-width'>
						<span>
							<a href='?action=editAddress&id=". $customer[0]->id ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
						</span>
					</div>
				</td>
			</tr>

			<tr>
				<td><strong>City:</strong></td>
				<td>". $customer[0]->state ."</td>
				<td>
					<div class='float-right sm-width'>
						<span>
							<a href='?action=editCity&id=". $customer[0]->id ."' class='btn btn-cus edit-btn float-right' style='color: #fff;'><i class='fa fa-pencil'></i>&nbsp; Edit </a>
						</span>
					</div>
				</td>
			</tr>

			<tr>
				<td><strong>Country:</strong></td>
				<td>". $customer[0]->country ."</td>
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
				<td>". $customer[0]->firstname .' '. $customer[0]->middlename .' '. $customer[0]->lastname ."</td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Account Number:</strong></td>
				<td>". $customer[0]->acctNum ."</td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Account Type:</strong></td>
				<td>". $customer[0]->acctType ."</td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Current Balance:</strong></td>
				<td>₦ ". number_format($customer[0]->acctBal) ."</td>
				<td></td>
			</tr>

			<tr>
				<td><strong>Created On:</strong></td>
				<td>". getDateFormated($customer[0]->createdOn) ."</td>
				<td></td>
			</tr>
		</tbody>

	</table>

	<span>
		<a href='?id=". $customer[0]->id ."&action=delete' class='btn danger delete-btn float-right'><i class='fa fa-trash'></i>&nbsp; Delete </a>
	</span>
	";
}

/*
 * This function displays Page Count for pagination.
 */
function displayPageNum(int $page, int $totalPages){
	for ($page = 1; $page <= $totalPages; $page++) { 

		echo "<li class='page-item '><a class='page-link' href='"."?page=". $page ."'>". $page ."</a></li>";

	}
}

/*
 * The function that checks if a Customer's username is already taken.
 *
 * @param string User's username.
 * 
 * @return bool Returns false || true if the customer's username already exits.
 */
function _checkUsername(string $username): bool{
	/* Initialize an null ID */
	$id = null;

	/*
	 * Instantiate an object.
	 */
	$customerExist = new Customer($id, $username);

	// Check if the username is taken.
	if ($customerExist->checkUsername() === true) {
		return true;
	}
	return false;
}

/*
 * The function that checks if a Customer's email ID is already taken.
 *
 * @param string Customer's email ID.
 * 
 * @return bool Returns false || true if the customer's email ID already exits.
 */
function _checkEmail(string $email): bool{
	/* Initialize an null variables */
	$id = null;
	$username = null;
	$firstname = null;
	$acctType = null;
	$acctNum = null;
	$middlename = null;
	$lastname = null;
	$acctNum = null;
	$acctBal = null;
	$password = null;

	/*
	 * Instantiate an object.
	 */
	$customerExist = new Customer($id, $username, $firstname, $middlename, $lastname, $acctType, $acctNum, $acctBal, $password, $email);

	// Check if the user's email ID is taken.
	if ($customerExist->checkEmail() == true) {
		return true;
	}

	return false;
}

/*
 * The function that deletes a customer's account.
 *
 * @param int Customer's ID.
 * 
 * @return bool Returns false || true if the customer's email ID already exits.
 */
function delCustomerAcct(int $id): bool{
	/*
	 * Instantiate an object.
	 */
	$customer = new Customer($id);

	// Check if the user's email ID is taken.
	if ($customer->delete() === true) {
		return true;
	}

	return false;
}

/*
 * The function that inserts a Post into the database.
 *
 * @param string User's username.
 * @param string User's email ID.
 * 
 * @return bool Returns false || true if the user's email ID already exits.
 */
function checkUsername(string $username): bool{
	/* Initialize an null ID */
	$id = null;

	/*
	 * Instantiate an object.
	 */
	$userExist = new User($id, $username);

	// Check if the username is taken.
	if ($userExist->checkUsername() == true) {
		return true;
	}
	return false;
}

/*
 * The function that inserts a Post into the database.
 *
 * @param string User's username.
 * @param string User's email ID.
 * 
 * @return bool Returns false || true if the user's email ID already exits.
 */
function checkEmail(string $email): bool{
	/* Initialize an null variables */
	$id = null;
	$username = null;
	$password = null;

	/*
	 * Instantiate an object.
	 */
	$userExist = new User($id, $username, $password, $email);

	// Check if the user's email ID is taken.
	if ($userExist->checkEmail() == true) {
		return true;
	}
	return false;
}

/*
 * The function that verifies user account before activation.
 *
 * @param string User's username.
 * @param string Activation key.
 * 
 * @return bool Returns false || true if the user's email ID already exits.
 */
function verify(string $username, string $token): bool{
	// Instantiate an Object.
	$usersDatas = new User(null, $username);
	
	if (is_array($userData = $usersDatas->getToken())) {
		// Initialize an empty array to store the collected object.
		$data = [];

		// Push the object into the array.
		array_push($data, $userData);
		
		if ($data['0']['status'] === 1) {
			// Return false, this user's account as been verified.
			return false;
		} elseif ($token !== $data['0']['token']) {
			return false;
		} else {
			return true;
		}
	}
	return false;
}

/*
 * The function that verifies user account before activation.
 *
 * @param string User's username.
 * 
 * @return bool Returns false || true if the user's account is active.
 */
function isActive(string $username): bool{
	// Instantiate an Object.
	$usersData = new User(null, $username);
	
	if (is_array($userData = $usersData->getToken())) {
		// Initialize an empty array to store the collected object.
		$data = [];

		// Push the object into the array.
		array_push($data, $userData);
		
		if ($data['0']['status'] === 1) {
			return true;
		}
	}

	return false;
}

/*
 * The function that verifies user's password.
 *
 * @param string User's username.
 * 
 * @return bool Returns false || true if the user's password is the right one.
 */
function verifyPass(string $username, string $password): bool{
	/* Initialize an null variables */
	$id = null;

	// Instantiate an Object.
	$pass = new User($id, $username, $password);

	if ($pass->checkPass() == true) {
		if (is_array($password = $pass->checkPass())) {
			// Initialize an empty array to store the collected object.
			$data = [];

			// Push the object into the array.
			array_push($data, $password);

			// Store session in variables
			$_SESSION['loggedin'] = true;
			$_SESSION['id'] = $data['0']['id'];
			$_SESSION['username'] = $data['0']['username'];
			$_SESSION['email'] = $data['0']['email'];

			if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
				return true;
			}
		}
	}

	return false;
}

/*
 * The function for making transfer of funds.
 * 
 * @param string The Transfer's Account Name.
 * @param int The Transfer's Account Number.
 * @param float The Amount to be Transfered.
 * @param string The Receiver's Bank Name.
 * @param string The Receiver's Account Name.
 * @param int The Receiver's Account Number.
 * 
 * @return bool Returns false || true if the transaction was successful.
 */
//makeTransfer('Bin Danjuma Emmanuel', 558444985, 90, 'BMS',  'Jane Doe', 896584729);

function makeTransfer(string $accName, int $accNum, float $amount, string $recBank, string $recAccName, int $recAccNum){
	// Set transaction ID to Null
	$id = null;
	$userId = null;

	// Instantiate an Object.
	$bal = new Transaction($id, $userId, $accName, $accNum, $amount, $recBank, $recAccName, $recAccNum);

	// Get the sender's current account balance.
	if ($bal->getSendersBalance() == true) {

		$balance = $bal->getSendersBalance();

		// Deduct from sender's account balance.
		if ($balance >= 0 && $balance >= $amount) {
			$balance -= $amount;
		
			// Instantiate an Object.
			$newBal = new Transaction($id, $userId, $accName, $accNum, $balance, $recBank, $recAccName, $recAccNum);
			
			// Update sender's account balance.
			if ($newBal->updateBalance() == true) {
				
				############################
				#	Transfer to Receiver   #
				############################
				// Instantiate an Object.
				$recBal = new Transaction($id, $userId, $accName, $accNum, $amount, $recBank, $recAccName, $recAccNum);

				// Get the receiver's current account balance.
				if ($recBal->getReceiversBalance() == true) {
					// Store the receiver's account balance.
					$receiversBalance = $recBal->getReceiversBalance();

					// Add to receiver's account balance.
					$receiversBalance += $amount;
					
					// Instantiate an Object.
					$transfer = new Transaction($id, $userId, $accName, $accNum, $receiversBalance, $recBank, $recAccName, $recAccNum);

					// Update Receiver's account balance.					
					if ($transfer->tranferFund() == true) {
						return true;
					}
				}
			}
		}	
	}

	return false;
}

/*
 * The function for making transfer of funds.
 * 
 * @param int ID of the user that made the Transaction.
 * @param string The Transfer's Account Name.
 * @param int The Transfer's Account Number.
 * @param float The Amount to be Transfered.
 * @param string The Receiver's Bank Name.
 * @param string The Receiver's Account Name.
 * @param int The Receiver's Account Number.
 * 
 * @return bool Returns false || true if the transaction was successful.
 */

function checkEligibility(int $accNum): bool{
	$id = null;
	$userId = null;
	$accName = null;
	$amtToTransfer = null;
	$recBank = null;
	$recAccName = null;
	$recAccNum = null;
	
	// Instantiate an Object.
	$checkBal = new Transaction($id, $userId, $accName, $accNum, $amtToTransfer, $recBank, $recAccName, $recAccNum);
	
	if ($checkBal->getSendersBalance() <= 1000) {
		return false;
	}

	return true;
}

/*
 * The function for making transfer of funds.
 * 
 * @param int ID of the user that made the Transaction.
 * @param string The Transfer's Account Name.
 * @param int The Transfer's Account Number.
 * @param float The Amount to be Transfered.
 * @param string The Receiver's Bank Name.
 * @param string The Receiver's Account Name.
 * @param int The Receiver's Account Number.
 * 
 * @return bool Returns false || true if the transaction was successful.
 */
function keepRecord(int $userId, string $accName, int $accNum, float $amtTransfered, string $recBank, string $recAccName, int $recAccNum): bool{
	$id = null;
	// Instantiate an Object.
	$transaction = new Transaction($id, $userId, $accName, $accNum, $amtTransfered, $recBank, $recAccName, $recAccNum);

	// Check if record was successfully made.
	if ($transaction->recordTransaction()) {
		return true;
	}

	return false;
}

/*
 * The function for checking file type.
 * 
 * @param string The File name.
 * 
 * @return bool Returns false || true if the transaction was successful.
 */
function checkFileType(string $fileName): bool{
	// Store the target directory and target file.
	$target_file = basename($fileName);

	// Store the image types we want.
	$validFileType = ['jpeg', 'jpg', 'png', 'gif'];

	// Store file type.
	$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Check the file type.
	if (in_array($fileType, $validFileType) === true) {
		return true;
	}

	return false;
}

/*
 * The Search function.
 * 
 * @param string The Key Word to search for.
 * 
 * @return array Returns searched data.
 */
function search(string $keyWord, string $page) {
	// Instantiate an Object.
	$search = new Search($keyWord, $page);

	 echo $search->search();
}

/*
 * The function that fetches.
 * 
 * @return int Returns the total number of rows in db.
 */
function getTotalNumOfRows(string $tableName): int {
	// Sanitize and store table name.
	$tableName = htmlspecialchars(stripcslashes(trim($tableName)));

	// Return the number of rows.
	return Transaction::countRows($tableName);
}

/*
 * The function that takes admin users to the dashboard.
 */
function dashboard(){
	// Redirect.
	header("location: index.php");
	exit;
}

/*
 * The function that checks if the user is logged in.
 *
 * @return bool Returns false || true if the user is logged in.
 */
function isLogedOut(): bool{
	if (empty($_SESSION['loggedin']) && empty($_SESSION['email']) && empty($_SESSION['username']) && basename(htmlspecialchars($_SERVER['PHP_SELF'])) !== 'login.php' && basename(htmlspecialchars($_SERVER['PHP_SELF'])) !== 'signup.php') {
		return true;
	}
	return false;
}	

/*
 * The function that logs the user in.
 * 
 */
function login(){
	// Redirect.	
	header('LOCATION: index.php');
	exit;
		
}

/*
 * The function that takes users to the login page.
 * 
 */
function loginPage(){
	// Redirect.
	header("location: login.php");
	exit;
}

/*
 * The function that logs users out.
 */
function logOut(){
	// Initialize the session
	session_start ();

	// Destroy the session.
	session_destroy();

	return true;
}