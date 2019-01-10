<?php
/**
 * User class
 */
class User{
	/*
	 *	@var int The User's ID from the database.
	 */
	private $id;

	/*
	 *	@var string The User's username.
	 */
	public $username;

	/*
	 *	@var string The User's password.
	 */
	private $password;

	/*
	 *	@var string The User's email.
	 */
	private $email;

	/*
	 *	@var string The User's first name.
	 */
	private $firstname;

	/*
	 *	@var string The User's middle.
	 */
	private $middlename;

	/*
	 *	@var string The User's last name.
	 */
	private $lastname;

	/*
	 *	@var string The User's biography.
	 */
	private $bio;

	/*
	 *	@var string The User's user role.
	 */
	private $userRole;

	/*
	 *	@var string Account status.
	 */
	private $active;

	/*
	 *	@var string Account activation token.
	 */
	private $token;

	/*
	 *	@var string Reset token.
	 */
	private $resetToken;

	/*
	 *	@var string The date the user account was created.
	 */
	private $createdOn;

	/*
	 *	@var string The User's profile picture.
	 */
	private $profilePic;
	
	function __construct(int $id = null, string $username = null, string $password = null, string $email = null, string $userRole = null, string $token = null, string $firstname = null, string $middlename = null, string $lastname = null, string $bio = null, int $active = null, string $resetToken = null, string $createdOn = null, string $profilePic = null){	
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

		if (!empty($bio)) {
			$this->bio = (string) htmlspecialchars(trim(stripslashes($bio)));
		}

		if (!empty($userRole)) {
			$this->userRole = (string) htmlspecialchars(trim(stripslashes($userRole)));
		}

		if (!empty($active)) {
			$this->active = (string) htmlspecialchars(trim(stripcslashes($active)));
		}

		if (!empty($token)) {
			$this->token = (string) htmlspecialchars(trim(stripslashes($token)));
		}

		if (!empty($resetToken)) {
			$this->resetToken = (string) htmlspecialchars(trim(stripslashes($resetToken)));
		}

		if (!empty($createdOn)) {
			$this->createdOn = (string) htmlspecialchars(trim(stripcslashes($createdOn)));
		}

		if (!empty($profilePic)) {
			$this->profilePic = (string) htmlspecialchars(trim(stripslashes($profilePic)));
		}
	}

	/*
	 *	Get the username from the database.
	 *
	 *	@return false || true if the username already exit.
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
		$sql = "SELECT username FROM bank_users WHERE username = '$this->username'";

		// Execute query & Check if it was successful.
		$result = $conn->query($sql);
		
		if ($result->num_rows == 1) {
			return true;
		}
		$conn->close();

		return false;
	}

	/*
	 *	Get the user's email ID from the database.
	 *
	 *	@return true || false if the User's email doesn't exist.
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
		$sql = "SELECT email FROM bank_users WHERE email = '$this->email'";

		// Execute query & Check if it was successful.
		$result = $conn->query($sql);
		
		if ($result->num_rows == 1) {
			return true;
		}
		$conn->close();

		return false;
	}

	/*
	 *	Get the user's password from the database.
	 *
	 *	@return Array User's data.
	 */
	public function checkPass(){
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
		$sql = "SELECT id, username, password, email, active FROM bank_users WHERE username = '$this->username'";

		// Execute query & Check if it was successful.
		$result = $conn->query($sql);
		
		if ($result->num_rows == 1) {
			// Fetch password
			if($row = $result->fetch_assoc()){
				// Verify password && Check if user is active or not
				if(password_verify($this->password, $row['password']) && $row['active'] == 1){
					// Store user's data
					$userData = [
						'id' => $row['id'],
						'username' => $row['username'],
						'email' => $row['email']
					];
					return $userData;
				}
			}
		}
		$conn->close();

		return false;
	}

	/*
	 *	Inserts the current User object to the database.
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
		$sql = $conn->prepare("INSERT INTO bank_users(username, password, email, userRole, token) VALUES(?, ?, ?, ?, ?)");

		$sql->bind_param('sssss', $this->username, $this->password, $this->email, $this->userRole, $this->token);
		
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
	 *	Fetch the current User object's token and status.
	 *	
	 *	@return Array || NULL if the user record wasn't found.
	 */
	public function getToken(){
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
		$sql = "SELECT active, token FROM bank_users WHERE username = '$this->username'";

		// Execute query & Check if it was successful.
		$result = $conn->query($sql);
		
		if ($result->num_rows == 1) {
			if ($row = $result->fetch_assoc() ) {
				// Store user's data
				$userData = [
					'status' => $row['active'],
					'token' => $row['token']
				];
				return $userData;
			}
		}
		$conn->close();

		return false;
	}

	/*
	 *	Activate the user's account.
	 *	
	 *	@return false || true if the user's account has been activated.
	 */
	public function activate(): bool{
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
		$sql = $conn->prepare("UPDATE bank_users SET active = ? WHERE username = ?");
		$sql->bind_param('ss', $this->active, $this->username);
		$result = $sql->execute();

		if ($result == true) {
			return true;
		}
		$sql->close();
		$conn->close();

		return false;
	}	

	/*
	 * Get the list of User objects in the database.
	 * 
	 * @Option param int Numbers of rows to be retrieved (default = 2000000).
	 * @param string Retrieve User's objects ordered by First Name in descending order.
	 */
	public static function getUsers(int $numRows = null, string $order = 'firstname') {
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

		$sql = "SELECT id, username, email, firstname, middlename, lastname, bio, userRole, profilePic, createdOn FROM bank_users ORDER BY $order ASC LIMIT $numRows";

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
				$rowBio = $row['bio'];
				$rowUserRole = $row['userRole'];
				$rowProfilePic = $row['profilePic'];
				$rowCreatedOn = $row['createdOn'];

				/*$usersData = new User($rowId, $rowUsername, $password = null, $rowEmail, $rowUserRole, $token = null, $rowFirstName, $rowMiddleName, $rowLastName, $rowBio, $active = null, $resetToken = null, $rowCreatedOn, $rowProfilePic);*/

				// Bind array.
				array_push($data, $row);

			}

		} else {
			return false;
		}

		return $data;
	}
} // End of file.