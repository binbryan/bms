<?php
/**
 * Customer class
 */

class Customer{
	/*
	 *	@var int The User's ID from the database.
	 */
	public $id;

	/*
	 *	@var string The User's username.
	 */
	public $username;

	/*
	 *	@var string The User's first name.
	 */
	public $firstname;

	/*
	 *	@var string The User's middle.
	 */
	public $middlename;

	/*
	 *	@var string The User's last name.
	 */
	public $lastname;

	/*
	 *	@var string The User's password.
	 */
	public $password;

	/*
	 *	@var string The User's email.
	 */
	public $email;
	
	/*
	 *	@var int The Customer's date of birth.
	 */
	public $dateOfBirth;

	/*
	 *	@var int The Customer's Account Number.
	 */
	public $acctNum;

	/*
	 *	@var string Account Type.
	 */
	public $acctType;

	/*
	 *	@var string Account Balance.
	 */
	public $acctBal;

	/*
	 *	@var int The Customer's phone number.
	 */
	public $phoneNo;

	/*
	 *	@var string The Customer's address.
	 */
	public $address;

	/*
	 *	@var string The Customer's address.
	 */
	public $gender;

	/*
	 *	@var string The Customer's Local Government Area.
	 */
	public $lga;

	/*
	 *	@var string The Customer's country.
	 */
	public $country;

	/*
	 *	@var string The Customer's State.
	 */
	public $state;

	/*
	 *	@var string The Customer's passport.
	 */
	public $passport;

	/*
	 *	@var string The Customer's nationalId.
	 */
	public $active;

	/*
	 *	@var string The Customer's nationalId.
	 */
	public $resetToken;

	/*
	 *	@var string The Customer's nationalId.
	 */
	public $createdOn;

	function __construct(int $id = null, string $username = null, string $firstname = null, string $middlename = null, string $lastname = null, string $acctType = null, string $acctNum = null, float $acctBal = null, string $password = null, string $email = null, string $phoneNo = null, string $dateOfBirth = null, string $address = null, string $gender = null, string $lga = null, string $country = null, string $state = null, string $passport = null, int $active = null, string $resetToken = null, string $createdOn = null){

		/*
		 * Store the data if they are not empty.
		 */
		if (!empty($id)) {
			$this->id = (int) $id;
		}

		if (!empty($username)) {
			$this->username = (string) htmlspecialchars(trim(stripcslashes($username)));
		}

		if (!empty($password)) {
			$this->password = (string) htmlspecialchars(trim(stripslashes($password)));
		}

		if (!empty($email)) {
			$this->email = (string) htmlspecialchars(trim(stripslashes($email)));
		}

		if (!empty($firstname)) {
			$this->firstname = (string) htmlspecialchars(trim(stripcslashes($firstname)));
		}

		if (!empty($middlename)) {
			$this->middlename = (string) htmlspecialchars(trim(stripslashes($middlename)));
		}

		if (!empty($lastname)) {
			$this->lastname = (string) htmlspecialchars(trim(stripcslashes($lastname)));
		}

		if (!empty($acctNum)) {
			$this->acctNum = (int) htmlspecialchars(trim(stripslashes($acctNum)));
		}

		if (!empty($acctType)) {
			$this->acctType = (string) htmlspecialchars(trim(stripslashes($acctType)));
		}

		if (!empty($acctBal)) {
			$this->acctBal = (string) htmlspecialchars(trim(stripslashes($acctBal)));
		}

		if (!empty($phoneNo)) {
			$this->phoneNo = (string) htmlspecialchars(trim(stripslashes($phoneNo)));
		}

		if (!empty($dateOfBirth)) {
			$this->dateOfBirth = (string) htmlspecialchars(trim(stripslashes($dateOfBirth)));
		}

		if (!empty($address)) {
			$this->address = (string) htmlspecialchars(trim(stripslashes($address)));
		}

		if (!empty($gender)) {
			$this->gender = (string) htmlspecialchars(trim(stripslashes($gender)));
		}

		if (!empty($lga)) {
			$this->lga = (string) htmlspecialchars(trim(stripcslashes($lga)));
		}

		if (!empty($country)) {
			$this->country = (string) htmlspecialchars(trim(stripslashes($country)));
		}

		if (!empty($state)) {
			$this->state = (string) htmlspecialchars(trim(stripslashes($state)));
		}

		if (!empty($passport)) {
			$this->passport = (string) htmlspecialchars(trim(stripcslashes($passport)));
		}

		if (!empty($active)) {
			$this->active = (int) htmlspecialchars(trim(stripslashes($active)));
		}

		if (!empty($resetToken)) {
			$this->resetToken = (string) htmlspecialchars(trim(stripslashes($resetToken)));
		}

		if (!empty($createdOn)) {
			$this->createdOn = (string) htmlspecialchars(trim(stripslashes($createdOn)));
		}
	}

	/*
	 * Get the number of rows in the db table.
	 * 
	 * @param string Table Name.
	 */
	public static function countRows(string $tableName): int{
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

		// Get the number of pages
		$totalPageSql = "SELECT COUNT(*) FROM $tableName";

		$result = $conn->query($totalPageSql);

		$totalRows = $result->fetch_assoc()['COUNT(*)'];

		return $totalRows;
	}

	/*
	 * Get the list of Customer objects in the database.
	 * 
	 * @Option param int Numbers of rows to be retrieved (default = 2000000).
	 * @param string Retrieve Customer objects ordered by CustomeredDate in descending order.
	 */
	public static function getCustomers(string $order = null, int $offset, int $numRows = null) {
		if ($order !== 'createdOn') {
			// Sort in ascending order.
			$ascend = 'ASC';
		} else {
			// Sort in descending order.
			$ascend = 'DESC';

			// Fetch last 10 inserted data.
			$numRows = 10;
		}

		/*
		 * Create a connection to the database.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn === false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = "SELECT * FROM bank_customers ORDER BY $order $ascend LIMIT $offset, $numRows";

		$result = $conn->query($sql);

		// Initialize an empty array.
		$data = [];

		if ($result == true && $result->num_rows > 0) {
			// Loop through the data.
			while ($row = $result->fetch_assoc()) {
				// Store the retrieved rows.
				$rowId = $row['id'];
				$rowUsername = $row['username'];
				$rowEmail  = $row['email'];
				$rowFirstName = $row['firstname'];
				$rowMiddleName = $row['middlename'];
				$rowLastName = $row['lastname'];
				$rowAcctNum = $row['acctNum'];
				$rowAcctType = $row['acctType'];
				$rowAcctBal = $row['acctBal'];
				$password = null;
				$rowDateOfBirth = $row['dateOfBirth'];
				$rowPhoneNo = $row['phoneNo'];
				$rowAddress = $row['address'];
				$rowGender = $row['gender'];
				$rowLga = $row['lga'];
				$rowCountry = $row['country'];
				$rowState = $row['state'];
				$rowPassport = $row['passport'];
				$rowActive = $row['active'];
				$resetToken = null;
				$rowCreatedOn = $row['createdOn'];

				$customersData = new Customer($rowId, $rowUsername, $rowFirstName, $rowMiddleName, $rowLastName, $rowAcctType, $rowAcctNum, $rowAcctBal, $password, $rowEmail, $rowPhoneNo, $rowDateOfBirth, $rowAddress, $rowGender, $rowLga, $rowCountry, $rowState, $rowPassport, $rowActive, $resetToken, $rowCreatedOn);

				// Bind array.
				array_push($data, $customersData);
			}

		} else {
			return false;
		}

		return $data;
	}

	public static function getById(int $id = null){
		/*
		 * Create a connection to the database.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection.
		if ($conn === false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}
		
		// Prepare a statement.
		$sql = "SELECT * FROM bank_customers WHERE id = $id LIMIT 1";

		$result = $conn->query($sql);

		$data = array();

		if ($result == true && $result->num_rows == 1) {
			// Retrieve rows.
			while ($row = $result->fetch_assoc()) {
				// Store the retrieved rows.
				$rowId = $row['id'];
				$rowUsername = $row['username'];
				$rowEmail  = $row['email'];
				$rowFirstName = $row['firstname'];
				$rowMiddleName = $row['middlename'];
				$rowLastName = $row['lastname'];
				$rowAcctNum = $row['acctNum'];
				$rowAcctType = $row['acctType'];
				$rowAcctBal = $row['acctBal'];
				$password = null;
				$rowDateOfBirth = $row['dateOfBirth'];
				$rowPhoneNo = $row['phoneNo'];
				$rowAddress = $row['address'];
				$rowGender = $row['gender'];
				$rowLga = $row['lga'];
				$rowCountry = $row['country'];
				$rowState = $row['state'];
				$rowPassport = $row['passport'];
				$rowActive = $row['active'];
				$rowResetToken = null;
				$rowCreatedOn = $row['createdOn'];

				$customersData = new Customer($rowId, $rowUsername, $rowFirstName, $rowMiddleName, $rowLastName, $rowAcctType, $rowAcctNum, $rowAcctBal, $password, $rowEmail, $rowPhoneNo, $rowDateOfBirth, $rowAddress, $rowGender, $rowLga, $rowCountry, $rowState, $rowPassport, $rowActive, $rowResetToken, $rowCreatedOn);

				// Bind array.
				array_push($data, $customersData);
			}
		} else {
			return false;
		}

		return $data;
	}

	/*
	 *	Inserts the current Customer object to the database.
	 *	
	 *	@return Bool true||false.
	 */
	public function insert(): bool{
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

		// Prepare & Bind param
		$sql = $conn->prepare("INSERT INTO bank_customers(username, password, email, firstname, middlename, lastname, dateOfBirth, phoneNo, address, gender, lga, country, state, passport, acctType, acctNum) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

		$result  = $sql->bind_param('sssssssssssssssi', $this->username, $this->password, $this->email, $this->firstname, $this->middlename, $this->lastname, $this->dateOfBirth, $this->phoneNo, $this->address, $this->gender, $this->lga, $this->country, $this->state, $this->passport, $this->acctType, $this->acctNum);

		// Execute query.
		$result = $sql->execute();

		// Check if query was successful.
		if ($result == true) {
			return true;
		}

		$sql->close();
		$conn->close();

		return false;
	}

	/*
	 *	Update the current Customer object in the database.
	 */
	public function updateEmail(): bool{
		// Check if the Customer has an ID.
		if (empty($this->id))
			trigger_error("<strong>Customer::update()</strong>: Attempt to update a Customer object that doesn't have it's ID property set.", E_USER_ERROR);

		/*
		 * Update the Customer.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection.
		if ($conn == false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("UPDATE bank_customers SET email = ? WHERE id = ?");
		$sql->bind_param('si', $this->email, $this->id);
		
		if ($sql->execute() === true) {
			return true;
		}


		$sql->close();
		$conn->close();

		return false;
	}

	/*
	 *	Update the current Customer object in the database.
	 */
	public function updateAddress(): bool{
		// Check if the Customer has an ID.
		if (empty($this->id))
			trigger_error("<strong>Customer::update()</strong>: Attempt to update a Customer object that doesn't have it's ID property set.", E_USER_ERROR);

		/*
		 * Update the Customer.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection.
		if ($conn == false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("UPDATE bank_customers SET address = ? WHERE id = ?");
		$sql->bind_param('si', $this->address, $this->id);
		
		if ($sql->execute() === true) {
			return true;
		}

		$sql->close();
		$conn->close();

		return false;
	}

	/*
	 *	Update the current Customer object in the database.
	 */
	public function updateCity(): bool{
		// Check if the Customer has an ID.
		if (empty($this->id))
			trigger_error("<strong>Customer::update()</strong>: Attempt to update a Customer object that doesn't have it's ID property set.", E_USER_ERROR);

		/*
		 * Update the Customer.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection.
		if ($conn == false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("UPDATE bank_customers SET state = ? WHERE id = ?");
		$sql->bind_param('si', $this->state, $this->id);
		
		if ($sql->execute() === true) {
			return true;
		}

		$sql->close();
		$conn->close();

		return false;
	}

	/*
	 *	Update the current Customer object in the database.
	 */
	public function updatePhoneNo(): bool{
		// Check if the Customer has an ID.
		if (empty($this->id))
			trigger_error("<strong>Customer::update()</strong>: Attempt to update a Customer object that doesn't have it's ID property set.", E_USER_ERROR);

		/*
		 * Update the Customer.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection.
		if ($conn == false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("UPDATE bank_customers SET phoneNo = ? WHERE id = ?");
		$sql->bind_param('si', $this->phoneNo, $this->id);
		
		if ($sql->execute() ===  true) {
			return true;
		}

		$sql->close();
		$conn->close();

		return false;
	}

	/*
	 *	Get the Customer's username from the database.
	 *
	 *	@return false || true if the Customer's username already exit.
	 */
	public function checkUsername(): bool{
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

		// Prepare & Bind param
		$sql = "SELECT username FROM bank_customers WHERE username = '$this->username'";

		// Execute query & Check if it was successful.
		$result = $conn->query($sql);
		
		if ($result->num_rows == 1) {
			return true;
		}
		$conn->close();

		return false;
	}

	/*
	 *	Get the Customer's email ID from the database.
	 *
	 *	@return true || false if the Customer's email doesn't exist.
	 */
	public function checkEmail(): bool{
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

		// Prepare & Bind param
		$sql = "SELECT email FROM bank_customers WHERE email = '$this->email'";

		// Execute query & Check if it was successful.
		$result = $conn->query($sql);

		if ($result->num_rows == 1) {
			return true;
		}
		$conn->close();

		return false;
	}

	/*
	 *	Get the Customer's email ID from the database.
	 *
	 *	@return true || false if the Customer's email doesn't exist.
	 */
	public function delete(): bool{
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

		/*
		 * Delete the customer's Account.
		 */
		$sql = $conn->prepare("DELETE FROM bank_customers WHERE id = ? LIMIT 1");
		$sql->bind_param('i', $this->id);
		
		$result = $sql->execute();

		if ($result == true) {
			return true;
		}

		$sql->close();
		$conn->close();

		return false;	
	}
} // End of file.
