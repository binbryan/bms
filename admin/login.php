<!DOCTYPE html>
<html>
	<head>
		<title>Login | Bank Management System</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">

		<link href="assets/css/login.css" rel="stylesheet">
		<!-- custom css -->
        <link rel="stylesheet" href="assets/css/custom.css">

		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <!-- owl.carousel.2.0.0-beta.2.4 css -->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <!-- swiper.min.css -->
        <link rel="stylesheet" href="assets/css/swiper.min.css">
        <!-- font-awesome v4.6.3 css -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- flaticon.css -->
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <!-- magnific-popup.css -->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <!-- metisMenu.min.css -->
        <link rel="stylesheet" href="assets/css/metisMenu.min.css">
        <!-- style css -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="assets/css/responsive.css">
        <!-- modernizr css -->
        <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
        <!-- jquery.min -->
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- custom jquery-->
        <script src="assets/js/custom.js"></script>

        <script>
			function validate() {
				$("ducument").ready(function () {
					event.preventDefault();

					var username = $("#username").val();
					var password = $("#password").val();
					
					$.ajax({
						type: 'POST',
						
						url: 'process-login.php',
						
						data: {
							username: username,
							password: password
						},
						
						success: function (response) {
							document.getElementById("message").innerHTML=response;
						}
					});
				});

			}
		</script>
		<?php 
		var_dump($_SESSION);
		
		if (isset($_SESSION)) {
			header('LOCATION: index.php');
			exit;
		} ?>
	</head>
	

	<body class="text-center">
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" class="form-signin">
			<i class="fa fa-user large" onclick="test()"></i>
			<br/>
			<br/>

			<p id="message"></p>

			<label for="" class="sr-only">Username</label>

			<input type="username" name="username" id="username" class="form-control" placeholder="Username" value="<?php if (isset($param_username)) { echo $param_username; } ?>" autofocus>

			<label for="inputPassword" class="sr-only">Password</label>
				
			<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php if (isset($param_password)) { echo $param_password; } ?>" >

			<button class="btn btn-lg btn-cus btn-block" type="submit" onclick="validate()">LogIn</button>

			<br/>
			<p>
				<span class="site-info">&copy; <?php echo date('Y'); ?> <a href="#">Bank Management System</a> - All Right Reserve</span>
			</p>
		</form>
	</body>
</html>