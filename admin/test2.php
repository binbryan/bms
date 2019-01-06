<!DOCTYPE html>
<html>
<head>
	<title></title>
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
		
  	<script>
		function test() {
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

		$('document').ready(function () {
			$('#loading').hide();
		});

		function load(){
			$('document').ready(function () {
				if ($("#password").val() == '') {
					$('#loading').show();
				}
			});
		}
	</script>
	<style>
		#loading{
			width: 7%;
			height: 0;
			border-radius: 100%;
			border: 6px solid #ccc;
			position: fixed;
			animation: round 0.7s linear infinite;
		}

		@keyframes round{
			from{
				transform: rotate(0deg);
			}

			to{
				transform: rotate(360deg);
			}
		}
	</style>
</head>
<body>
	<form action="<?php echo htmlspecialchars("process-login.php") ?>" method="POST">
		<p id="message"></p>

		<input type="text" name="username" id="username" placeholder="username" /><br>
		<input type="text" name="password" id="password" placeholder="password" />
	</form>
	<section ></section>
	<button type="submit" onclick="test()" style="width: 50%; height: 50px;"><span id="loading"></span>Test</button>
</body>
</html>