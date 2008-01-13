<?php
/**
 * Transaction Class
 */
class Transaction{
	/*
	 *	@var int The Transaction ID from the database.
	 */
	private $id;

	/*
	 *	@var int The Admin's.
	 */
	private $adminId;

	/*
	 *	@var int The Account Name.
	 */
	private $accName;

	/*
	 *	@var int The Account Number.
	 */
	private $accNum;

	/*
	 *	@var int The Amount to Transfer.
	 */
	private $amtToTransfer;

	/*
	 *	@var int The Receivers Bank Name.
	 */
	private $recBank;

	/*
	 *	@var int The Receivers Account Name.
	 */
	private $recAccName;

	/*
	 *	@var int The Receivers Account Number.
	 */
	private $recAccNum;

	/*
	 *	@var int The Date the transaction to place.
	 */
	private $transactionDate;

	public function __construct(int $id = null, int $adminId = null, string $accName = null, int $accNum = null, float $amtToTransfer = null, string $recBank = null, string $recAccName = null, int $recAccNum = null, string $transactionDate = null) {

		if (isset($id)) {
			$this->id = $id;
		}

		if (isset($adminId)) {
			$this->adminId = $adminId;
		}

		if (isset($accName)) {
			$this->accName = $accName;
		}

		if (isset($accNum)) {
			$this->accNum = $accNum;
		}

		if (isset($amtToTransfer)) {
			$this->amtToTransfer = $amtToTransfer;
		}

		if (isset($recBank)) {
			$this->recBank = $recBank;
		}

		if (isset($recAccName)) {
			$this->recAccName = $recAccName;
		}

		if (isset($recAccNum)) {
			$this->recAccNum = $recAccNum;
		}

		if (isset($transactionDate)) {
			$this->transactionDate = $transactionDate;
		}

	}

	public function insert(): bool {
		// Include connection file.
		require_once '..\config.php';

		// Prepare & Bind param
		$sql = $conn->prepare("INSERT INTO bank_transaction(userId, accName, accNum, recBank, recAccName, recAccNum, transactionDate) VALUES(?, ?, ?, ?, ?, ?, ?)");

		/*$result  = $sql->bind_param('sssssss', $this->adminId, $this->accName, $this->accNum, $this->recBank, $this->recAccName, $this->recAccNum, $this->transactionDate);

		// Execute query.
		$result = $sql->execute();

		// Check if query was successful.
		if ($result == true) {
			return true;
		}*/

		$sql->close();
		$conn->close();

		return false;
	}

	/*public function getTransactionDetails(): array {
		$data = [];

		$transaction['id'] = $this->id;
		$transaction['adminId'] = $this->adminId;
		$transaction['accName'] = $this->accName;
		$transaction['accNum'] = $this->accNum;
		$transaction['AuthorId'] = $this->AuthorId;
		$transaction['AuthorId'] = $this->AuthorId;
		$transaction['AuthorId'] = $this->AuthorId;
		$transaction['transactionDate'] = $this->transactionDate;

		array_push($data, $transaction);

		return $data;
	}*/
}

$transaction = new Transaction($id = 1, $adminId = null, $accName = 'Bin Danjuma Emmanuel', $accNum = 749998878, $amtToTransfer = 9000.91, $recBank = 'Bank Management System', $recAccName = 'Jane Doe', $recAccNum = 749998744, $transactionDate = 2019);

var_dump($transaction->insert());