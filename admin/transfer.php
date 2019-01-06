<?php
/**
 * The customer template file that displays a form for transfer funds.
 *
 * @link http://developers.zerabtech.com/bank-management-system
 *
 * @version 1.0
 */
// Page title.
$pageTitle = 'Transfer';

// Include our header.php file
require 'header.php';

/*
 * Include account-balance.php
 * 
 * account-balance is the file that get's the customer's account balance form our db.
 */
require 'account-balance.php';

/**
 * Process form data.
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	/**
	 * Validate and Sanitize Account Name.
	 */
	if (empty($_POST['accName'])) {
		// Store an error message.
		$accName_err = 'Please enter an Account Name';
	} else {
		// Store the account name.
		$accName = htmlspecialchars(stripcslashes(trim($_POST['accName'])));
	}

	/**
	 * Validate and Sanitize Account Number.
	 */
	if (empty($_POST['accNum'])) {
		// Store an error message.
		$accNum_err = 'Please enter an Account Number';
	} elseif (!is_numeric($_POST['accNum'])) {
		// Store an error message.
		$accNum_err = 'Please enter a valid Account Number';
	} else {
		// Store the account name.
		$accNum = htmlspecialchars(stripcslashes(trim($_POST['accNum'])));
	}

	/**
	 * Validate and Sanitize Amount to Transfer.
	 */
	if (empty($_POST['amtToTransfer'])) {
		// Store an error message.
		$amtToTransfer_err = 'Please enter the amount to you want to transfer';
	} else {
		// Store the account name.
		$amtToTransfer = htmlspecialchars(stripcslashes(trim($_POST['amtToTransfer'])));
	}

	/**
	 * Validate and Sanitize Receiver's Account Name.
	 */
	if (empty($_POST['recBank'])) {
		// Store an error message.
		$recBank_err = "Please enter the receiver's Bank Name";
	} else {
		// Store the account name.
		$recBank = htmlspecialchars(stripcslashes(trim($_POST['recBank'])));
	}

	/**
	 * Validate and Sanitize Receiver's Account Name.
	 */
	if (empty($_POST['recAccName'])) {
		// Store an error message.
		$recAccName_err = "Please enter the Receiver's Account Name";
	} else {
		// Store the account name.
		$recAccName = htmlspecialchars(stripcslashes(trim($_POST['recAccName'])));
	}

	/**
	 * Validate and Sanitize Receiver's Account Number.
	 */
	if (empty($_POST['recAccNum'])) {
		// Store an error message.
		$recAccNum_err = "Please enter the Receiver's Account Number";
	} else {
		// Store the account name.
		$recAccNum = htmlspecialchars(stripcslashes(trim($_POST['recAccNum'])));
	}


	if (empty($accName_err) && empty($accNum_err) && empty($recBank_err) && empty($recAccName_err) && empty($recAccNum_err) && empty($amtToTransfer_err) && empty($recBankName_err)) {
		#############################
			// Make The Transfer,
		#############################

		// Check if customer is eligible to make transfer.
		if (checkEligibility($accNum) === true) {
			if (makeTransfer($accName, $accNum, $amtToTransfer, $recBank, $recAccName, $recAccNum) === true) {
				########################################
					// Keep Recored of the Transfer,
				########################################
				$userId = 61; // Temp
				if (keepRecord($userId, $accName, $accNum, $amtToTransfer, $recBank, $recAccName, $recAccNum) == false) {
					// Store an error message.
					$error_message = "Sorry, something went wrong when trying to make the transfer of ₦". number_format($amtToTransfer) ." to ". $recAccName;
				} else {
					// Store a success message.
					$message = "
						<p class='center'>
							The transfer of <strong> ₦". number_format($amtToTransfer) ."</strong>
						</p>
						<br/>
						<div class='row'>
							<div class='col-md-6'>

								<p>
									From: <br/>
									Acct Name: <strong>". $accName ."</strong> <br/>
									Acct NO: <strong>". $accNum ."</strong><br/><br/>
								</p>
							</div>

							<div class='col-md-6'>
								<p>
									To: <br/>
									Acct Name: <strong>". $recAccName ."</strong><br/>
									Acct NO: <strong>". $recAccNum ."</strong>
								</p>

							</div>
						</div>
						
						<p class='float-right'>was successful</p>
					";

				}
			} else {
				// Store an error message.
				$error_message = "Sorry, something went wrong when trying to make the transfer of ₦". number_format($amtToTransfer) ." to ". $recAccName;

			}
		} else {
			// Store an error message.
				$error_message = "Sorry, you are not eligible to make this transfer due to insufficient fund. <br> You need to have more than ₦". number_format($amtToTransfer) ." to make a transfer. ";
		}		
	}
}
?>

<div class="text-center col-md-12 mb-4 heading">
	<h2>Transfer Fund</h2>
</div>

<div class="col-md-12 order-md-1">

	<?php if (isset($error_message)): ?>
		<div class='edit-modal error'> 
			<i class='fa fa-close float-right close'></i>

			<div class='delete-modal-body'>
				<p><?php echo $error_message; ?></p>
			</div>
		</div>
	<?php elseif (isset($message)): ?>
		<div class='edit-modal success-modal'>
			<i class='fa fa-close float-right close'></i>

			<div class='success-modal-body'>
				<?php echo $message; ?>
			</div>
		</div>
	<?php endif ?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
		<div class="row">
			<div class="col-md-6 mb-3" style="box-shadow: 0 0 11px 4px #fff, 0 0 0 0.2rem #CFCFCF; border-radius: 5px;">
				<small class="float-right" id="accBal">Account Balance: ₦0</small>

				<h3 class="mb-3">From</h3>
				
				<div class="mb-4">
					<label for="Account Name">Account Name</label>
					
					<?php 
						if (isset($accName_err)) {
							echo "<span class='float-right'>". $accName_err ."</span>";
						}
					?>
					<input type="text" class="form-control" name="accName" id="accName" placeholder="John Doe" value="<?php if (isset($accName)) { echo $accName; } ?>" >
				</div>

				<div class="mb-4">
					<label for="Account No">Account Number</label>

					<?php 
						if (isset($accNum_err)) {
							echo "<span class='float-right'>". $accNum_err ."</span>";
						}
					?>
					<input type="text" class="form-control" name="accNum" id="accNum" placeholder="000-000-0000" onkeyup="getAcctBal(this.value);" value="<?php if (isset($accNum)) { echo $accNum; } ?>">
				</div>

				<div class="mb-4">
					<label for="Amount to Transfer">Amount to Transfer</label>

					<?php 
						if (isset($amtToTransfer_err)) {
							echo "<span class='float-right'>". $amtToTransfer_err ."</span>";
						}
					?>
					<input type="text" class="form-control" name="amtToTransfer" id="amtToTransfer transfer" placeholder="In NGN (₦)" value="<?php if (isset($amtToTransfer)) { echo $amtToTransfer; } ?>" >
				</div>
			</div>

			<div class="col-md-6 mb-3" style="box-shadow: 0 0 11px 4px #fff, 0 0 0 0.2rem #CFCFCF; border-radius: 5px;">
				<h3 class="mb-3">To</h3>

				<div class="mb-4">
					<label for="Receiver's Bank Name">Bank Name (Default - BMS)</label>

					<?php 
						if (isset($recBank_err)) {
							echo "<span class='float-right'>". $recBank_err ."</span>";
						}
					?>
					<input type="text" class="form-control" name="recBank" id="recBank" value="<?php if (isset($recBank)) { echo $recBank; } ?>" >
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="Account Name">Account Name</label>

						<input type="text" class="form-control" name="recAccName" id="recAccName" placeholder="Jane Doe" value="<?php if (isset($recAccName)) { echo $recAccName; } ?>">
						<?php 
							if (isset($recAccName_err)) {
								echo "<span class='float-right'>". $recAccName_err ."</span>";
							}
						?>
					</div>

					<div class="col-md-6 mb-4">
						<label for="Account No">Account Number</label>

						<input type="text" class="form-control" name="recAccNum" id="recAccNum" placeholder="000-000-0000" value="<?php if (isset($recAccNum)) { echo $recAccNum; } ?>">
						<?php 
							if (isset($recAccNum_err)) {
								echo "<span class='float-right'>". $recAccNum_err ."</span>";
							}
						?>
					</div>
				</div>

				<div class="panel-body float-right">
					<input type="submit" class="btn-lg btn-block btn-cus" id="transfer" value="Transfer" />
				</div>
			</div>
		</div>
	</form>
</div>

<?php
// Include our footer.php file
require 'footer.php';
?>