<?php

/**
 * Include account-balance.php
 * 
 * This is the file that get's the customer's account balance form our db.
 * 
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */

// Include connection file.
require_once '..\bank-include\config.php';

if (isset($_POST['accNum'])) {
	// Account Number.
	$acctNum = $_POST['accNum'];

	$sql = "SELECT acctBal FROM bank_customers WHERE acctNum = $acctNum";

	$result = $conn->query($sql);

	echo "<br/>";

	if ($result == true && $result->num_rows == 1) {
		if ($row = $result->fetch_assoc()) {
			$bal = number_format($row['acctBal']);
			echo 'Account Balance: ₦'. $bal; ?>


			<script type="text/javascript">
				// Disable #transfer if account balance == 0.
				$('#transfer').prop('disabled', false);
			</script>

		<?php }
	} else {
		echo 'Account Balance: ₦0'; ?>

		<script type="text/javascript">
			$('#transfer').prop('disabled', 'disabled');
		</script>
	<?php }
}

/*
 * Disable #tranfer if account balance == 0.
 */

