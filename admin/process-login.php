<?php
// Include functions file
require_once '..\bank-include\functions.php';

// Process form data when submitted.
if ($_SERVER['REQUEST_METHOD'] === "POST") {
	// Validate username.
	if(empty(trim($_POST['username']))){
		// Print an error message.
		echo "
			<head>
				<title>Login | Bank Management System</title>
				<meta charset='utf-8'>
				<link rel='shortcut icon' type='image/png' href='assets/images/favicon.png'>

				<link href='assets/css/login.css' rel='stylesheet'>
				<!-- custom css -->
		        <link rel='stylesheet' href='assets/css/custom.css'>

				<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
		     
		        <!-- font-awesome v4.6.3 css -->
		        <link rel='stylesheet' href='assets/css/font-awesome.min.css'>
		        <!-- jquery.min -->
		        <script src='assets/js/vendor/jquery-2.2.4.min.js'></script>
		        <!-- custom jquery-->
		        <script src='assets/js/custom.js'></script>

		        <script>
					function validate() {
						$('ducument').ready(function () {
							event.preventDefault();

							var username = $('#username').val();
							var password = $('#password').val();
							
							$.ajax({
								type: 'POST',
								
								url: 'process-login.php',
								
								data: {
									username: username,
									password: password
								},
								
								success: function (response) {
									document.getElementById('message').innerHTML=response;

									$('#hide').hide();
								}
							});
						});

					}
				</script>
				
			</head>
			<body class='text-center'>
				<form action='".htmlentities($_SERVER['PHP_SELF'])."' method='POST' class='form-signin'>
					<i class='fa fa-user large' onclick='test()'></i>
					<br/>
					<br/>

					<p><span class='error popIn'>Please enter your username</span></p>

					<label class='sr-only'>Username</label>

					<input type='username' name='username' id='username' class='form-control' placeholder='Username' value='' autofocus>

					<label for='inputPassword' class='sr-only'>Password</label>
						
					<input type='password' name='password' id='password' class='form-control' placeholder='Password' value='' >

					<button class='btn btn-lg btn-cus btn-block' type='submit' onclick='validate()'>LogIn</button>

					<br/>
					<p>
						<span class='site-info'>&copy;". date('Y') ."<a href='#'>Bank Management System</a> - All Right Reserve</span>
					</p>
				</form>
			</body>
		";
	}else{
		// Store the username.
		$param_username = htmlspecialchars(stripcslashes(trim($_POST['username'])));

		if (checkUsername($param_username) === false) {
			// Print an error message.
			echo "
				<head>
					<title>Login | Bank Management System</title>
					<meta charset='utf-8'>
					<link rel='shortcut icon' type='image/png' href='assets/images/favicon.png'>

					<link href='assets/css/login.css' rel='stylesheet'>
					<!-- custom css -->
			        <link rel='stylesheet' href='assets/css/custom.css'>

					<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
			     
			        <!-- font-awesome v4.6.3 css -->
			        <link rel='stylesheet' href='assets/css/font-awesome.min.css'>
			        <!-- jquery.min -->
			        <script src='assets/js/vendor/jquery-2.2.4.min.js'></script>
			        <!-- custom jquery-->
			        <script src='assets/js/custom.js'></script>

			        <script>
						function validate() {
							$('ducument').ready(function () {
								event.preventDefault();

								var username = $('#username').val();
								var password = $('#password').val();
								
								$.ajax({
									type: 'POST',
									
									url: 'process-login.php',
									
									data: {
										username: username,
										password: password
									},
									
									success: function (response) {
										document.getElementById('message').innerHTML=response;

										$('#hide').hide();
									}
								});
							});

						}
					</script>
					
				</head>

				<body class='text-center'>
					<form action='".htmlentities($_SERVER['PHP_SELF'])."' method='POST' class='form-signin'>
						<i class='fa fa-user large' onclick='test()'></i>
						<br/>
						<br/>

						<p><span class='error popIn'>Incorrect Username</span></p>

						<label class='sr-only'>Username</label>

						<input type='username' name='username' id='username' class='form-control' placeholder='Username' value='". $param_username ."' autofocus>

						<label for='inputPassword' class='sr-only'>Password</label>
							
						<input type='password' name='password' id='password' class='form-control' placeholder='Password' value='' >

						<button class='btn btn-lg btn-cus btn-block' type='submit' onclick='validate()'>LogIn</button>

						<br/>
						<p>
							<span class='site-info'>&copy;". date('Y') ."<a href='#'>Bank Management System</a> - All Right Reserve</span>
						</p>
					</form>
				</body>
			";
		} else {
			// Validate password.
			if (empty($_POST['password'])) {
				// Print an error message.
				echo "
				<head>
					<title>Login | Bank Management System</title>
					<meta charset='utf-8'>
					<link rel='shortcut icon' type='image/png' href='assets/images/favicon.png'>

					<link href='assets/css/login.css' rel='stylesheet'>
					<!-- custom css -->
			        <link rel='stylesheet' href='assets/css/custom.css'>

					<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
			     
			        <!-- font-awesome v4.6.3 css -->
			        <link rel='stylesheet' href='assets/css/font-awesome.min.css'>
			        <!-- jquery.min -->
			        <script src='assets/js/vendor/jquery-2.2.4.min.js'></script>
			        <!-- custom jquery-->
			        <script src='assets/js/custom.js'></script>

			        <script>
						function validate() {
							$('ducument').ready(function () {
								event.preventDefault();

								var username = $('#username').val();
								var password = $('#password').val();
								
								$.ajax({
									type: 'POST',
									
									url: 'process-login.php',
									
									data: {
										username: username,
										password: password
									},
									
									success: function (response) {
										document.getElementById('message').innerHTML=response;

										$('#hide').hide();
									}
								});
							});

						}
					</script>
					
				</head>

				<body class='text-center'>
					<form action='".htmlentities($_SERVER['PHP_SELF'])."' method='POST' class='form-signin'>
						<i class='fa fa-user large' onclick='test()'></i>
						<br/>
						<br/>

						<p><span class='error popIn'>Please enter your password</span></p>

						<label class='sr-only'>Username</label>

						<input type='username' name='username' id='username' class='form-control' placeholder='Username' value='". $param_username ."' autofocus>

						<label for='inputPassword' class='sr-only'>Password</label>
							
						<input type='password' name='password' id='password' class='form-control' placeholder='Password' value='' >

						<button class='btn btn-lg btn-cus btn-block' type='submit' onclick='validate()'>LogIn</button>

						<br/>
						<p>
							<span class='site-info'>&copy;". date('Y') ."<a href='#'>Bank Management System</a> - All Right Reserve</span>
						</p>
					</form>
				</body>
				";
			} else {
				// Store the password.
				$param_password = htmlspecialchars(stripcslashes(trim($_POST['password'])));

				// Verify the password.
				if (verifyPass($param_username, $param_password) === false) {
					// Print an error message.
					echo "
						<head>
							<title>Login | Bank Management System</title>
							<meta charset='utf-8'>
							<link rel='shortcut icon' type='image/png' href='assets/images/favicon.png'>

							<link href='assets/css/login.css' rel='stylesheet'>
							<!-- custom css -->
					        <link rel='stylesheet' href='assets/css/custom.css'>

							<link rel='stylesheet' href='assets/css/bootstrap.min.css'>
					     
					        <!-- font-awesome v4.6.3 css -->
					        <link rel='stylesheet' href='assets/css/font-awesome.min.css'>
					        <!-- jquery.min -->
					        <script src='assets/js/vendor/jquery-2.2.4.min.js'></script>
					        <!-- custom jquery-->
					        <script src='assets/js/custom.js'></script>

					        <script>
								function validate() {
									$('ducument').ready(function () {
										event.preventDefault();

										var username = $('#username').val();
										var password = $('#password').val();
										
										$.ajax({
											type: 'POST',
											
											url: 'process-login.php',
											
											data: {
												username: username,
												password: password
											},
											
											success: function (response) {
												document.getElementById('message').innerHTML=response;

												$('#hide').hide();
											}
										});
									});

								}
							</script>
							
						</head>

						<body class='text-center'>
							<form action='".htmlentities($_SERVER['PHP_SELF'])."' method='POST' class='form-signin'>
								<i class='fa fa-user large' onclick='test()'></i>
								<br/>
								<br/>

								<p><span class='error popIn'>Incorrect Password or User account is not active</span></span></p>

								<label class='sr-only'>Username</label>

								<input type='username' name='username' id='username' class='form-control' placeholder='Username' value='". $param_username ."' autofocus>

								<label for='inputPassword' class='sr-only'>Password</label>
									
								<input type='password' name='password' id='password' class='form-control' placeholder='Password' value='' >

								<button class='btn btn-lg btn-cus btn-block' type='submit' onclick='validate()'>LogIn</button>

								<br/>
								<p>
									<span class='site-info'>&copy;". date('Y') ."<a href='#'>Bank Management System</a> - All Right Reserve</span>
								</p>
							</form>
						</body>
					";
				} else {
					// Log the user in.
					login();
					
				}
			}	
		}
	}
} else {
	// Print an error message.
	$error_message = "Something went wrong, contact <a href='mailto:binemmanuel@ymail.com'> admin </a>";
}