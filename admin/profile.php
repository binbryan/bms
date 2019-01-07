<?php 
/**
 * The customer template file that displays the customer's profile.
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */
// Page title.
$pageTitle = 'Profile';

// Instantiate empty variable ID.
$id = '';

// Include our header.php file
require 'header.php';



// Collect ID from .edit-modal.
if (isset($_POST['id'])) {
	$id = $_POST['id'];
}

// Collect ID from customers.php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}



###############################################
#	The block for editing customer's email.   #
###############################################

/*
 * Display the edit-modal.
 * 
 * Collect ID from customers.php
 */
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'editEmail') {
	$id = $_GET['id'];

	// Check if we have an email error.
	if (!isset($email_err)) {
		$email_err = '';
	}

	echo "
		<div class='edit-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='edit-modal-body'>
				<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
					<input type='hidden' name='id' value='". $id ."' required='required'>

					<div class='row'>
						<div class='col-md-12 mb-3'>
							<label for='Email'>Email</label>".
							
							$email_err
							."<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>@</span>
								</div>

								<input type='text' name='email' class='form-control' id='email' placeholder='example@mail.com' autofocus='autofocus'>
							</div>
						</div>
					</div>
					
					<p style='margin-top: 30px;'' class='float-right'>
						<input type='submit' name='edit-email' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
					</p>
				</form> 
			</div>
		</div>
	";
}

/**
 * Process form data from .edit-modal
 */
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-email']) && $_POST['edit-email'] == 'Submit') {
	/**
	 * Validate and Sanitize email address.
	 */
	if (empty($_POST['email'])) {
		// Store an error message.
		$email_err = "<span class='float-right'>Please enter your email address</span>";

		echo "
			<div class='edit-modal'>
				<i class='fa fa-close float-right close'></i>

				<div class='edit-modal-body'>
					<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
						<input type='hidden' name='id' value='". $id ."' required='required'>

						<div class='row'>
							<div class='col-md-12 mb-3'>
								<label for='Email'>Email</label>".
								
								$email_err
								."<div class='input-group'>
									<div class='input-group-prepend'>
										<span class='input-group-text'>@</span>
									</div>

									<input type='text' name='email' class='form-control' id='email' placeholder='example@mail.com' autofocus='autofocus'>
								</div>
							</div>
						</div>
						
						<p style='margin-top: 30px;'' class='float-right'>
							<input type='submit' name='edit-email' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
						</p>
					</form> 
				</div>
			</div>
		";
	} else {
		// Store the user's email address.
		$email_format = htmlspecialchars(stripcslashes(trim($_POST['email'])));

		/**
		 * Validate the email address.
		 */
		if(!filter_var($email_format, FILTER_VALIDATE_EMAIL)){
			// Store an error message.
			$email_err = "<span class='float-right'>Invalid email format</span>";

			echo "
				<div class='edit-modal'>
					<i class='fa fa-close float-right close'></i>

					<div class='edit-modal-body'>
						<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
							<input type='hidden' name='id' value='". $id ."' required='required'>

							<div class='row'>
								<div class='col-md-12 mb-3'>
									<label for='Email'>Email</label>".
									
									$email_err
									."<div class='input-group'>
										<div class='input-group-prepend'>
											<span class='input-group-text'>@</span>
										</div>

										<input type='text' name='email' class='form-control' id='email' placeholder='example@mail.com' autofocus='autofocus'>
									</div>
								</div>
							</div>
							
							<p style='margin-top: 30px;'' class='float-right'>
								<input type='submit' name='edit-email' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
							</p>
						</form> 
					</div>
				</div>
			";
		}else{
			// Store the email address.
			$email = htmlspecialchars(stripcslashes(trim($_POST['email'])));

			/**
			 * Check if the email address is already exist.
			 */
			if (_checkEmail($email) === true) {
				// Store an error message.
				$email_err = "<span class='float-right'>Sorry, the email address is already taken</span>";

				echo "
					<div class='edit-modal'>
						<i class='fa fa-close float-right close'></i>

						<div class='edit-modal-body'>
							<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
								<input type='hidden' name='id' value='". $id ."' required='required'>

								<div class='row'>
									<div class='col-md-12 mb-3'>
										<label for='Email'>Email</label>".
										
										$email_err
										."<div class='input-group'>
											<div class='input-group-prepend'>
												<span class='input-group-text'>@</span>
											</div>

											<input type='text' name='email' class='form-control' id='email' placeholder='example@mail.com' autofocus='autofocus'>
										</div>
									</div>
								</div>
								
								<p style='margin-top: 30px;'' class='float-right'>
									<input type='submit' name='edit-email' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
								</p>
							</form> 
						</div>
					</div>
				";
			} else {
				// Store the customer's Last Name.
				$param_email = htmlspecialchars(stripslashes(trim($_POST['email'])));			
			}
		}
	}
} // Processing form edit-modal block End $_SERVER['REQUEST_METHOD'] === "POST".

/**
 * Update Email.
 */
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-email']) && isset($_POST['email']) && $_POST['edit-email'] == 'Submit') {
	// Initialize null variables.
	$phoneNo = null;
	$address = null;
	$city = null;

	// Collect data to be uploaded.
	$email = htmlspecialchars(stripcslashes(trim($_POST['email'])));

	#############################################################################
		// Update email.
		if (updateAccount($id, $email, $phoneNo, $address, $city) === true && !isset($email_err)) { ?>
			<script type="text/javascript">
				$('document').ready(function () {
					// Success Message.
					alert('Your email address was updated successfully');
				});
			</script>
		<?php }
	#############################################################################
}

################################################
#	The block for editing email address ends   #
################################################


############################################
#	The block for editing phone Number.   #
############################################

/*
 * Display the edit-modal.
 * 
 * Collect ID from customers.php
 */
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'editPhoneNo') {
	$id = $_GET['id'];

	echo "
		<div class='edit-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='edit-modal-body'>
				<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
					<input type='hidden' name='id' value='". $id ."' required='required'>

					<div class='row'>
						<div class='col-md-12 mb-3'>
							<label for='Phone Number'>Phone Number</label>

							<div class='input-group'>
								<div class='input-group-prepend'>
									<i class='input-group-text fa fa-phone'></i>
								</div>

								<input type='number' name='phoneNo' class='form-control' id='email' placeholder='+234(0) 000 000 0000' autofocus='autofocus'>
							</div>
						</div>
					</div>
					
					<p style='margin-top: 30px;'' class='float-right'>
						<input type='submit' name='edit-phoneNumber' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
					</p>
				</form> 
			</div>
		</div>
	";
}

/**
 * Process form data from .edit-modal
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-address']) && $_POST['edit-address'] == 'Submit') {
	/**
	 * Validate and Sanitize Phone Number.
	 */
	if (empty($_POST['phoneNo'])) {
		// Store an error message.
		$phoneNo_err = "<span class='float-right'>Please enter your phone number</span>";

		echo "
			<div class='edit-modal'>
				<i class='fa fa-close float-right close'></i>

				<div class='edit-modal-body'>
					<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
						<input type='hidden' name='id' value='". $id ."' required='required'>

						<div class='row'>
							<div class='col-md-12 mb-3'>
								<label for='Phone Number'>Phone Number</label>".
								
								$phoneNo_err
								."<div class='input-group'>
									<div class='input-group-prepend'>
										<i class='input-group-text fa fa-phone'></i>
									</div>

									<input type='number' name='phoneNo' class='form-control' id='email' placeholder='+234(0) 000 000 0000' autofocus='autofocus'>
								</div>
							</div>
						</div>
						
						<p style='margin-top: 30px;'' class='float-right'>
							<input type='submit' name='edit-phoneNumber' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
						</p>
					</form> 
				</div>
			</div>
		";
	} else {
		// Store the phone number.
		$phoneNo = htmlspecialchars(stripcslashes(trim($_POST['phoneNo'])));

		/**
		 * Validate.
		 */
		if (strlen($phoneNo) < 11 || strlen($phoneNo) > 15) {
			// Store an error message.
			$phoneNo_err = "<span class='float-right'>Please enter a valid phone number</span>";

			echo "
			<div class='edit-modal'>
				<i class='fa fa-close float-right close'></i>

				<div class='edit-modal-body'>
					<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
						<input type='hidden' name='id' value='". $id ."' required='required'>

						<div class='row'>
							<div class='col-md-12 mb-3'>
								<label for='Phone Number'>Phone Number</label>".
								
								$phoneNo_err
								."<div class='input-group'>
									<div class='input-group-prepend'>
										<i class='input-group-text fa fa-phone'></i>
									</div>

									<input type='number' name='phoneNo' class='form-control' id='email' placeholder='+234(0) 000 000 0000' autofocus='autofocus'>
								</div>
							</div>
						</div>
						
						<p style='margin-top: 30px;'' class='float-right'>
							<input type='submit' name='edit-phoneNumber' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
						</p>
					</form> 
				</div>
			</div>
		";
		}
	}

	// Check if we have an email error.
	if (!isset($phoneNo_err)) {
		$phoneNo_err = '';
	}
} // End $_SERVER['REQUEST_METHOD'] === "POST".

/**
 * Update Email.
 */
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-phoneNumber']) && isset($_POST['phoneNo']) && $_POST['edit-phoneNumber'] === 'Submit') {
	// Initialize null variables.
	$email = null;
	$address = null;
	$city = null;

	// Collect data to be uploaded.
	$phoneNo = htmlspecialchars(stripcslashes(trim($_POST['phoneNo'])));

	#############################################################################
		// Update email.
		if (updateAccount($id, $email, $phoneNo, $address, $city) === true && empty($phoneNo_err)) { ?>
			<script type="text/javascript">
				$('document').ready(function () {
					// Success Message.
					alert('Your phone number was updated successfully');
				});
			</script>
		<?php }
	#############################################################################
}
################################################
#	The block for editing phone number ends.   #
################################################


############################################
#	The block for editing address.   #
############################################
/*
 * Display the edit-modal.
 * 
 * Collect ID from customers.php
 */
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'editAddress') {
	$id = $_GET['id'];

	echo "
		<div class='edit-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='edit-modal-body'>
				<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
					<input type='hidden' name='id' value='". $id ."' required='required'>

					<div class='row'>
						<div class='col-md-12 mb-3'>
							<label for='Address'>Address</label>

							<div class='input-group'>
								<div class='input-group-prepend'>
									<i class='input-group-text fa fa-phone'></i>
								</div>

								<input type='text' name='address' class='form-control' id='email' placeholder='123 New World St, Gwagwalada' autofocus='autofocus'>
							</div>
						</div>
					</div>
					
					<p style='margin-top: 30px;'' class='float-right'>
						<input type='submit' name='edit-address' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
					</p>
				</form> 
			</div>
		</div>
	";
}

/**
 * Process form data from .edit-modal
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-address']) && $_POST['edit-address'] == 'Submit') {
	/**
	 * Validate and Sanitize Phone Number.
	 */
	if (empty($_POST['address'])) {
		// Store an error message.
		$address_err = "<span class='float-right'>Please enter your address</span>";

		echo "
			<div class='edit-modal'>
				<i class='fa fa-close float-right close'></i>

				<div class='edit-modal-body'>
					<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
						<input type='hidden' name='id' value='". $id ."' required='required'>

						<div class='row'>
							<div class='col-md-12 mb-3'>
								<label for='Address'>Address</label>".
								
								$address_err
								."<div class='input-group'>
									<div class='input-group-prepend'>
										<i class='input-group-text fa fa-phone'></i>
									</div>

									<input type='text' name='address' class='form-control' id='email' placeholder='123 New World St, Gwagwalada' autofocus='autofocus'>
								</div>
							</div>
						</div>
						
						<p style='margin-top: 30px;'' class='float-right'>
							<input type='submit' name='edit-address' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
						</p>
					</form> 
				</div>
			</div>
		";
	}

	// Check if we have an email error.
	if (!isset($address_err)) {
		$address_err = '';
	}
} // End $_SERVER['REQUEST_METHOD'] === "POST".

/**
 * Update Email.
 */
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-address']) && isset($_POST['address']) && $_POST['edit-address'] === 'Submit') {
	// Initialize null variables.
	$email = null;
	$phoneNo = null;
	$city = null;

	// Collect data to be uploaded.
	$address = htmlspecialchars(stripcslashes(trim($_POST['address'])));
	 echo $address;

	#############################################################################
		// Update email.
		if (updateAccount($id, $email, $phoneNo, $address, $city) === true && empty($address_err)) { ?>
			<script type="text/javascript">
				$('document').ready(function () {
					// Success Message.
					alert('Your phone number was updated successfully');
				});
			</script>
		<?php }
	#############################################################################
}
################################################
#	The block for editing address ends.        #
################################################

############################################
#	The block for editing address.         #
############################################
/*
 * Display the edit-modal.
 * 
 * Collect ID from customers.php
 */
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'editCity') {
	$id = $_GET['id'];

	echo "
		<div class='edit-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='edit-modal-body'>
				<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
					<input type='hidden' name='id' value='". $id ."' required='required'>

					<div class='row'>
						<div class='col-md-12 mb-3'>
							<label for='City'>City</label>

							<div class='input-group'>

								<input type='text' name='city' class='form-control' id='email' placeholder='FCT Abuja' autofocus='autofocus'>
							</div>
						</div>
					</div>
					
					<p style='margin-top: 30px;'' class='float-right'>
						<input type='submit' name='edit-city' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
					</p>
				</form> 
			</div>
		</div>
	";
}

/**
 * Process form data from .edit-modal
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit-city']) && $_POST['edit-city'] == 'Submit') {
	/**
	 * Validate and Sanitize Phone Number.
	 */
	if (empty($_POST['city'])) {
		// Store an error message.
		$city_err = "<span class='float-right'>Please enter your city</span>";

		echo "
			<div class='edit-modal'>
				<i class='fa fa-close float-right close'></i>

				<div class='edit-modal-body'>
					<form action='". htmlspecialchars($_SERVER['PHP_SELF']) ."' method='POST'>
						<input type='hidden' name='id' value='". $id ."' required='required'>

						<div class='row'>
							<div class='col-md-12 mb-3'>
								<label for='City'>City</label>".
								
								$city_err
								."<div class='input-group'>
									
									<input type='text' name='city' class='form-control' id='city' placeholder='FCT Abuja' autofocus='autofocus'>
								</div>
							</div>
						</div>
						
						<p style='margin-top: 30px;'' class='float-right'>
							<input type='submit' name='edit-city' value='Submit' class='btn-sm btn-block btn-cus' style='color: #59524c; font-weight: bold;'>
						</p>
					</form> 
				</div>
			</div>
		";
	}

	// Check if we have a city error.
	if (!isset($city_err)) {
		$city_err = '';
	}
} // End $_SERVER['REQUEST_METHOD'] === "POST".

/**
 * Update Customer's City.
 */
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['edit-city']) && isset($_POST['city']) && $_POST['edit-city'] === 'Submit') {
	// Initialize null variables.
	$email = null;
	$phoneNo = null;
	$address = null;

	// Collect data to be uploaded.
	$city = htmlspecialchars(stripcslashes(trim($_POST['city'])));

	#############################################################################
		// Update email.
		if (updateAccount($id, $email, $phoneNo, $address, $city) === true && empty($city_err)) { ?>
			<script type="text/javascript">
				$('document').ready(function () {
					// Success Message.
					alert('Your city was updated successfully');
				});
			</script>
		<?php }
	#############################################################################
}
###########################################
#	The block for editing address ends.   #
###########################################


###############################
#	Delete customer script.   #
###############################
if (isset($_GET['id']) && isset($_GET['action']) && $_GET['action'] === 'delete') {
	$id = $_GET['id'];

	echo "
		<div class='delete-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='delete-modal-body'>
				<p>Are you sure you want to delete this account?</p>
				
				<p style='margin-top: 30px;'' class='float-right'>
					<a href='?id=". $id ."&delete=yes' class='yes-btn'><i class='fa fa-check'></i>&nbsp; Yes</a>
					<a href='?id=". $id ."&delete=no' class='no-btn close' id='close'><i class='fa fa-close'></i>&nbsp; No</a>
				</p>
			</div>
		</div>
	";	
}

if (isset($_GET['delete']) && $_GET['delete'] === "yes") {
	// Store the ID of the account we want to delete.
	$id = $_GET['id'];

	#############################
		// Delete.
		if (delCustomerAcct($id) === true) {
			// Take user to customers.php
			header("LOCATION: customers.php");
			exit;
		}
	#############################
}

/*
 * Execute if the user selects NO.
 */
if (isset($_GET['delete']) && $_GET['delete'] === "no") {
	$id = $_GET['id'];

	$link = $_SERVER['PHP_SELF'] .'?id='. $id;
	
	header('LOCATION: '. $link);
	exit;
}

####################################
#	Delete customer script ends.   #
####################################
?>

<div class="text-center col-md-12 mb-4 heading">
	<h2>Customer's Profile</h2>
</div>

<div class="container">
	<div class="table-responsive">
		<?php
			if (!empty($id)) {
				getCustomerById($id);
			}
		?>		
	</div>
</div>

<?php
// Include our footer.php file
require 'footer.php';
?>