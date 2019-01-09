<?php
// Include connection file.
require_once '..\bank-include\functions.php';

var_dump($_GET);

if ($_SERVER['PHP_SELF'] == '/bank/admin/customers.php') {
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
}