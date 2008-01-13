<?php
/**
 * The add customer template file
 *
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Page title.
$pageTitle = 'Add Customer';

// Include our header.php file
require 'header.php';

/**
 * Process form data.
 */
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	/**
	 * Validate and Sanitize First Name.
	 */
	if (empty($_POST['firstName'])) {
		// Store an error message.
		$firstName_err = "Please enter your first name";
	} else {
		// Store the customer's First Name.
		$param_firstName = htmlspecialchars(stripslashes(trim($_POST['firstName'])));
	}

	/**
	 * Validate and Sanitize alternative address.
	 */
	if (!empty($_POST['middleName'])) {
		// Store an error message.
		$param_middleName = htmlspecialchars(stripcslashes(trim($_POST['middleName'])));
	}

	/**
	 * Validate and Sanitize Last Name.
	 */
	if (empty($_POST['lastName'])) {
		// Store an error message.
		$lastName_err = "Please enter your last name";
	} else {
		// Store the customer's Last Name.
		$param_lastName = htmlspecialchars(stripslashes(trim($_POST['lastName'])));
	}

	/**
	 * Validate and Sanitize username.
	 */
	if (empty($_POST['username'])) {
		// Store an error message.
		$username_err = "Please enter a username";
	} else {
		// Store the customer's Last Name.
		$username = htmlspecialchars(stripslashes(trim($_POST['username'])));

		/**
		 * Check if the username already exist.
		 */
		if (_checkUsername($username) === true) {
			// Store an error message.
			$username_err = "Sorry, the username is already taken";
		} else {
			// Store the customer's Last Name.
			$param_username = htmlspecialchars(stripslashes(trim($_POST['username'])));			
		}
	}

	/**
	 * Validate and Sanitize email address.
	 */
	if (empty($_POST['email'])) {
		// Store an error message.
		$email_err = "Please enter your email address";
	} else {
		// Store the user's email address.
		$email_format = htmlspecialchars(stripcslashes(trim($_POST['email'])));

		/**
		 * Validate the email address.
		 */
		if(!filter_var($email_format, FILTER_VALIDATE_EMAIL)){
			// Store an error message.
			$email_err = "Invalid email format";
		}else{
			// Store the email address.
			$email = htmlspecialchars(stripcslashes(trim($_POST['email'])));

			/**
			 * Check if the email address is already exist.
			 */
			if (_checkEmail($email) === true) {
				// Store an error message.
				$email_err = "Sorry, the email address is already taken";
			} else {
				// Store the customer's Last Name.
				$param_email = htmlspecialchars(stripslashes(trim($_POST['email'])));			
			}
		}
	}

	/**
	 * Validate and Sanitize email address.
	 */
	if (empty($_POST['phoneNo'])) {
		// Store an error message.
		$phoneNo_err = "Please enter your phone number";
	} else {
		// Store the phone number.
		$phoneNo = htmlspecialchars(stripcslashes(trim($_POST['phoneNo'])));

		/**
		 * Validate.
		 */
		if (strlen($phoneNo) < 11 || strlen($phoneNo) > 15) {
			// Store an error message.
			$phoneNo_err = "Please enter a valid phone number";
		} else {
			// Store the phone number.
			$param_phoneNo = htmlspecialchars(stripcslashes(trim($_POST['phoneNo'])));
		}
	}

	/**
	 * Validate and Sanitize address.
	 */
	if (empty($_POST['address'])) {
		// Store an error message.
		$address_err = "Please enter your address";
	} else {
		// Store the address.
		$param_address = htmlspecialchars(stripcslashes(trim($_POST['address'])));
	}

	/**
	 * Validate and Sanitize alternative address.
	 */
	if (!empty($_POST['address1'])) {
		// Store an error message.
		$param_address1 = htmlspecialchars(stripcslashes(trim($_POST['address1'])));
	}

	/**
	 * Validate and Sanitize gender.
	 */
	if($_POST['gender'] == "Select Gender"){
		// Store an error message.
		$gender_err = "Please select your gender";
	}else{
		// Store the customer's gender.
		$param_gender = htmlspecialchars(stripcslashes(trim($_POST['gender'])));
	}

	/**
	 * Validate and Sanitize date of birth.
	 */
	if(empty($_POST['dateOfBirth'])){
		// Store an error message.
		$dateOfBirth_err = "Please enter your date of birth";
	}else{
		// Store the customer's date of birth.
		$param_dateOfBirth = htmlspecialchars(stripcslashes(trim($_POST['dateOfBirth'])));
	}

	/**
	 * Validate and Sanitize country.
	 */
	if(empty($_POST['country'])){
		// Store an error message.
		$country_err = "Please select your country";
	}else{
		// Store the country.
		$param_country = htmlspecialchars(stripcslashes(trim($_POST['country'])));
	}

	/**
	 * Validate and Sanitize state.
	 */
	if(empty($_POST['state'])){
		// Store an error message.
		$state_err = "Please select your state";
	}else{
		// Store the state.
		$param_state = htmlspecialchars(stripcslashes(trim($_POST['state'])));
	}

	/**
	 * Validate and Sanitize state.
	 */
	if (empty($_POST['zipcode'])) {
		// Store an error message.
		$zipcode_err = "Please enter your Zip Code";
	} elseif (!is_numeric($_POST['zipcode'])) {
		// Store an error message.
		$zipcode_err = "Please enter a valid Zip Code";
	} elseif (strlen($_POST['zipcode']) < 4) {
		// Store an error message.
		$zipcode_err = "Zip Code should be 4 numbers";
	} else {
		// Store the state.
		$param_zipcode = htmlspecialchars(stripcslashes(trim($_POST['zipcode'])));
	}

	/**
	 * Validate and Sanitize LGA.
	 */
	if (empty($_POST['lga'])) {
		// Store an error message.
		$lga_err = "Please enter your Local Government Area";
	} else {
		// Store the LGA
		$param_lga = htmlspecialchars(stripcslashes(trim($_POST['lga'])));
	}

	/**
	 * Validate and Sanitize LGA.
	 */
	if (empty($_POST['lga'])) {
		// Store an error message.
		$lga_err = "Please enter your Local Government Area";
	} else {
		// Store the LGA.
		$param_lga = htmlspecialchars(stripcslashes(trim($_POST['lga'])));
	}

	/**
	 * Validate and Sanitize state.
	 */
	if($_POST['acctType'] == 'Select Account Type'){
		// Store an error message.
		$acctType_err = "Please select an Account Type";
	}else{
		// Store the state.
		$param_acctType = htmlspecialchars(stripcslashes(trim($_POST['acctType'])));
	}

	/**
	 * Validate and Sanitize state.
	 */
	if(empty($_POST['password'])){
		// Store an error message.
		$password_err = "Please enter your password";
	} elseif (strlen($_POST['password']) < 6) {
		// Store an error message.
		$password_err = "Password to short, entry at least 6 or more characters";
	} else {
		// Store the state.
		$param_password = htmlspecialchars(stripcslashes(trim($_POST['password'])));

		/**
		 * Validate and Sanitize state.
		 */
		if (empty($_POST['password1'])) {
			// Store an error message.
			$password1_err = "Please retype your password";
		} else {
			// Store the state.
			$param_password1 = htmlspecialchars(stripcslashes(trim($_POST['password1'])));

			/**
			 * Verify password.
			 */
			if ($param_password != $param_password1) {
				// Store an error message.
				$password1_err = "Sorry! password didn't match";
			} else {
				// Hash the password.
	            $hashed_password = password_hash($param_password, PASSWORD_DEFAULT);
			}
		}
	}

	/**
	 * Insert user data into the database if there are no errors.
	 */
	if (!isset($firstName_err) && !isset($lastname_err) && !isset($email_err) && !isset($phoneNo_err) && !isset($address_err) && !isset($gender_err) && !isset($dateOfBirth_err) && !isset($country_err) && !isset($state_err) && !isset($zipcode_err) && !isset($lga_err) && !isset($acctType_err) && !isset($username_err) && (!isset($password_err) || !isset($password1_err))) {
		
		// Store an empty Middle Name if it is not specified.		
		if (empty($param_middleName)) {
			$param_middleName = ' ';
		}

		if (empty($param_acctNum)) {
			// Generate account number.
			$acctNum = rand(100000000, 999999999);
			
			$param_acctNum = $acctNum;
		}

		/**
		 * Insert user data into the database.
		 */
		if (addCustomer($param_username, $hashed_password, $param_email, $param_firstName, $param_middleName, $param_lastName, $param_acctNum, $param_acctType, $param_phoneNo, $param_dateOfBirth, $param_address, $param_gender, $param_country, $param_lga, $param_state/*, $param_passport*/) === true) {
			echo "Customers account created successfully";
		} else {
			$error = "Sorry, something went wrong trying to create an account";
		}
	}
	
}
?>


<div class="text-center col-md-12">
	<h2>Customer's Registration Form</h2>
</div>

<div class="col-md-12 order-md-1">
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<div class="row">
			<div class="col-md-4 mb-3">
				<label for="firstName">First name</label>

				<span class="float-right error"><?php if (isset($firstName_err)) { echo $firstName_err; } ?></span>
				<input type="text" name="firstName" class="form-control" id="firstName" value="<?php if (isset($param_firstName)) { echo $param_firstName; } ?>"  required="required">
			</div>

			<div class="col-md-4 mb-3">
				<label for="middleName">Middle Name(Optional)</label>

				<input type="text" name="middleName" class="form-control" id="middleName" value="<?php if (isset($param_middleName)) { echo $param_middleName; } ?>">
			</div>

			<div class="col-md-4 mb-3">
				<label for="lastName">Last Name</label>

				<span class="float-right"><?php if (isset($lastName_err)) { echo $lastName_err; } ?></span>
				<input type="text" name="lastName" class="form-control" id="lastName" value="<?php if (isset($param_lastName)) { echo $param_lastName; } ?>" required="required">
			</div>
		</div>	

		<div class="row">
			<div class="col-md-6 mb-3">
				<label for="Email">Email</label>
				
				<span class="float-right"><?php if (isset($email_err)) { echo $email_err; } ?></span>
				<div class="input-group">					
					<div class="input-group-prepend">
						<span class="input-group-text">@</span>
					</div>

					<input type="text" name="email" class="form-control" id="email" placeholder="example@mail.com" value="<?php if (isset($param_email)) { echo $param_email; } ?>" >
				</div>
			</div>


			<div class="col-md-6 mb-3">	
				<label for="Phone Number">Phone Number</label>

					<span class="float-right"><?php if (isset($phoneNo_err)) { echo $phoneNo_err; } ?></span>
				<div class="input-group">
					<div class="input-group-prepend">
						<i class="input-group-text fa fa-phone"></i>
					</div>

					<input type="number" name="phoneNo" maxlength="11" class="form-control" id="phoneNo" placeholder="+234(0) 000 000 0000" value="<?php if (isset($param_phoneNo)) { echo $param_phoneNo; } ?>" required="required">
				</div>
			</div>
        </div>

		<div class="mb-3">
			<label for="Address">Address</label>

			<span class="float-right"><?php if (isset($address_err)) { echo $address_err; } ?></span>
			<input type="text" name="address" maxlength="255" class="form-control" id="address" placeholder="1234 New World Street" value="<?php if (isset($param_address)) { echo $param_address; } ?>" required="required">
        </div>

    	<center>
        	<div class="col-md-3 mb-5">
				<label for="Gender">Gender</label>
				
				<select class="custom-select d-block w-100" name="gender" id="state" required="required">
					<?php if (isset($param_gender) && $param_gender == "Male"): ?>
						
						<option> <?php echo $param_gender; ?></option>
						<option>Female</option>

					<?php elseif(isset($param_gender) && $param_gender == "Female"): ?>

						<option> <?php echo $param_gender; ?></option>
						<option>male</option>

					<?php else: ?>
						
						<option>Select Gender</option>
						<option>Male</option>
						<option>Female</option>

					<?php endif ?>					
				</select>
				<span class="float-right"><?php if (isset($gender_err)) { echo $gender_err; } ?></span>
			</div>
    	</center>

        <div class="row">
        	<div class="col-md-3 mb-3">
				<label for="country">Date Of Birth</label>
				
				<input type="date" name="dateOfBirth" class="form-control" value="<?php if (isset($param_dateOfBirth)) { echo $param_dateOfBirth; } ?>" required="required">
				<span class="float-right"><?php if (isset($dateOfBirth_err)) { echo $dateOfBirth_err; } ?></span>
			</div>

			<div class="col-md-3 mb-3">
				<label for="country">Country</label>
				
				<input type="text" name="country" class="form-control" value="<?php if (isset($param_country)) { echo $param_country; } ?>" required="required">
				<span class="float-right"><?php if (isset($country_err)) { echo $country_err; } ?></span>
			</div>

			<div class="col-md-3 mb-3">
				<label for="country">State</label>
				
				<input type="text" name="state" class="form-control" value="<?php if (isset($param_state)) { echo $param_state; } ?>" required="required">
				<span class="float-right"><?php if (isset($state_err)) { echo $state_err; } ?></span>
			</div>

			<div class="col-md-3 mb-3">
				<label for="zipcode">Zip Code</label>
				
				<input type="text" name="zipcode" class="form-control" id="zipcode" placeholder="****" value="<?php if (isset($param_zipcode)) { echo $param_zipcode; } ?>" required="required">
				<span class="float-right"><?php if (isset($zipcode_err)) { echo $zipcode_err; } ?></span>
			</div>
        </div>

        <div class="mb-5">
			<label for="Local Government Area">Local Government Area (LGA)</label>
			
			<span class="float-right"><?php if (isset($lga_err)) { echo $lga_err; } ?></span>
			<input type="text" name="lga" class="form-control" id="lga" placeholder="Jama'a Local Government" value="<?php if (isset($param_lga)) { echo $param_lga; } ?>" required="required">
		</div>

		<div class="row">
			<div class="col-md-3">
				<label for="Account Type">Account Type</label>

				<select class="custom-select d-block w-100" name="acctType" id="accType" required="required">
					<?php if (isset($param_acctType) && $param_acctType == "Savings Account"): ?>
						
						<option><?php echo $param_acctType; ?></option>
						<option>Current Account</option>
						<option>Non Resident</option>
						<option>Transit and Confidential</option>

					<?php elseif(isset($param_acctType) && $param_acctType == "Current Account"): ?>

						<option><?php echo $param_acctType; ?></option>
						<option>Savings Account</option>
						<option>Non Resident</option>
						<option>Transit and Confidential</option>

					<?php elseif(isset($param_acctType) && $param_acctType == "Non Resident"): ?>

						<option><?php echo $param_acctType; ?></option>
						<option>Savings Account</option>
						<option>Current Account</option>
						<option>Transit and Confidential</option>

					<?php elseif(isset($param_acctType) && $param_acctType == "Transit and Confidential"): ?>

						<option><?php echo $param_acctType; ?></option>
						<option>Savings Account</option>
						<option>Current Account</option>
						<option>Non Resident</option>

					<?php else: ?>
						
						<option>Select Account Type</option>
						<option>Savings Account</option>
						<option>Current Account</option>
						<option>Non Resident</option>
						<option>Transit and Confidential</option>
					<?php endif ?>
					
				</select>
				<span class="float-right"><?php if (isset($acctType_err)) { echo $acctType_err; } ?></span>
			</div>

			<div class="col-md-3 mb-3">
				<label for="username">Username</label>

				<div class="input-group">
					<input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?php if (isset($param_username)) { echo $param_username; } ?>" required="required">
				</div>
				<span class="float-right"><?php if (!empty($username_err)) { echo $username_err; } ?></span>
			</div>

			<div class="col-md-3">
				<label for="password">Password</label>

				<div class="input-group">					
					<div class="input-group-prepend">
						<i class="input-group-text fa fa-lock"></i>
					</div>

					<input type="password" name="password" class="form-control" id="password" placeholder="" value="<?php if (isset($param_password)) { echo $param_password; } ?>" required="required">
				</div>
				
				<span class="float-right"><?php if (isset($password_err)) { echo $password_err; } ?></span>
			</div>

			<div class="col-md-3">
				<label for="Retype">Retype Password</label>

				<div class="input-group">					
					<div class="input-group-prepend">
						<i class="input-group-text fa fa-lock"></i>
					</div>

					<input type="password" name="password1" class="form-control" id="password1" required="required">
				</div>
				
				<span class="float-right"><?php if (isset($password1_err)) { echo $password1_err; } ?></span>
			</div>
		</div>

        <div class="panel-body">
			<input type="submit" class="btn-lg btn-block btn-cus" value="Submit" />
		</div>
	</form>
</div>



<?php

// Include our footer.php file
require 'footer.php';
?>