<?php
// Include functions file
require_once '..\bank-include\functions.php';

// Process form data when submitted.
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	// Validate username.
	if(empty(trim($_POST['username']))){
		// Print an error message.
		echo "<span class='error popIn'>Please enter your username</span>";
	}else{
		// Store the username.
		$param_username = htmlspecialchars(stripcslashes(trim($_POST['username'])));

		if (checkUsername($param_username) === false) {
			// Print an error message.
			echo "<span class='error popIn'>Incorrect Username</span>";
		} else {
			// Validate password.
			if (empty($_POST['password'])) {
				// Print an error message.
				echo "<span class='error popIn'>Please enter your password</span>";
			} else {
				// Store the password.
				$param_password = htmlspecialchars(stripcslashes(trim($_POST['password'])));

				// Verify the password.
				if (verifyPass($param_username, $param_password) === false) {
					// Print an error message.
					echo "<span class='error popIn'>Incorrect Password or User account is not active</span>";
				} else {
					// Log the user in.
					login();
					//var_dump($_SESSION);
				}
			}	
		}
	}
} else {
	// Print an error message.
	echo "Something went wrong, contact <a href='mailto:binemmanuel@ymail.com'> admin </a>";
}