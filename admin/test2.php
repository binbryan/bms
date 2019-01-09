<?php

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Test Page</title>

	    <!-- jquery.min -->
	    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	    
	    <!-- custom jquery-->
	    <script src="assets/js/custom.js"></script>

		<script>
			$('document').ready(function () {
				$('#more, #loaded').hide();

				$('#readMore').click(function () {
					$('#more').slideToggle();
					//$('#loaded').fadeIn(6000);

					$('#readMore').addClass('hide');
				});
			});
		</script>

		<style>
			.readMore{
				cursor: pointer;
				background: #999;
				border: 2px solid #567;
				border-radius: 5px;
				padding: 5px;
			}
			
			.loaded{
				position: absolute;
				top: 100px;
				left: 550px;
				background: #f1f1f1;
				border: 2px solid #c0c0c0;
				border-radius: 5px;
				padding: 15px 20px;
				opacity: 4;
			}

			.hide{
				display: none;
			}
		</style>
	</head>
	
	<body>
		<div id="content">
			<p id="paragraph">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

				<p id="more">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</p>
				<span class="readMore" id="readMore">Read More...</span>
			</p>
		</div>

		<div class="loaded" id="loaded"><strong>Loaded!</strong></div>

	</body>
</html>