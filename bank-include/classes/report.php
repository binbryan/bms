<?php
/**
 * Report class
 */
class report{
	/*
	 *	@var int The Transaction ID from the database.
	 */
	private $id;

	/*
	 *	@var int The Admin's.
	 */
	private $userId;

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

	public function __construct(int $id = null, int $userId = null, string $accName = null, int $accNum = null, float $amtToTransfer = null, string $recBank = null, string $recAccName = null, int $recAccNum = null, string $transactionDate = null) {

		if (!empty($id)) {
			$this->id = $id;
		}

		if (!empty($userId)) {
			$this->userId = $userId;
		}

		if (!empty($accName)) {
			$this->accName = $accName;
		}

		if (!empty($accNum)) {
			$this->accNum = $accNum;
		}

		if (!empty($amtToTransfer)) {
			$this->amtToTransfer = $amtToTransfer;
		}

		if (!empty($recBank)) {
			$this->recBank = $recBank;
		}

		if (!empty($recAccName)) {
			$this->recAccName = $recAccName;
		}

		if (!empty($recAccNum)) {
			$this->recAccNum = $recAccNum;
		}

		if (!empty($transactionDate)) {
			$this->transactionDate = $transactionDate;
		}

	}
	
}