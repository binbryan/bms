<?php
// Include connection file.
require_once '..\bank-include\functions.php';


if (isset($_GET['page'])) {
	$action = htmlspecialchars(stripcslashes(trim($_GET['page'])));
}

/*if (isset($_GET['page']) && $_GET['page'] == '/bank/admin/customers.php') {
	if (empty($_GET['search']) && isset($_GET['action']) && $_GET['action'] === "search") {
		// Display error modal.
		echo "
			<div class='error-modal error'>
				<i class='fa fa-close float-right close'></i>

				<div class='error-modal-body'>
					<p>Please enter a keyword to search from</p>
				</div>
			</div>
		";
	} elseif (isset($_GET['search'])) {
		// Store the keyword.
		$keyWord = htmlspecialchars(stripcslashes(trim($_GET['search'])));

		// Make the search.
		echo search($keyWord);
	}
}*/

switch ($action) {
	case '/bank/admin/customers.php':
		
		if (empty($_GET['search']) && isset($_GET['action']) && $_GET['action'] === "search") {
			// Display error modal.
			echo "
				<div class='text-center col-md-12 mb-4 heading'>
					<h2>Customers</h2>
				</div>

				<div class='error-modal error'>
					<i class='fa fa-close float-right close'></i>

					<div class='error-modal-body'>
						<p>Please enter a keyword to search from</p>
					</div>
				</div>
			";
		} elseif (isset($_GET['search'])) {
			// Store the keyword.
			$keyWord = htmlspecialchars(stripcslashes(trim($_GET['search'])));

			// Store the page.
			$page = htmlspecialchars(stripcslashes(trim($_GET['page'])));

			// Make the search.
			echo search($keyWord, $page);
		}

		break;
	
	case '/bank/admin/profile.php':
		if (empty($_GET['search']) && isset($_GET['action']) && $_GET['action'] === "search") {
			// Display error modal.
			/*echo "
				<div class='error-modal error'>
					<i class='fa fa-close float-right close'></i>

					<div class='error-modal-body'>
						<p>Please enter a keyword to search from</p>
					</div>
				</div>
			";*/
		} elseif (isset($_GET['search'])) {
			// Store the keyword.
			$keyWord = htmlspecialchars(stripcslashes(trim($_GET['search'])));

			// Store the page.
			$page = htmlspecialchars(stripcslashes(trim($_GET['page'])));

			// Make the search.
			echo search($keyWord, $page);
		}

		break;
	default:
		
		break;
}