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

	/*
	 *	Insert Transaction object in the database.
	 */
	public function recordTransaction(): bool {
		// Include connection file.
		/*require_once '..\config.php';*/
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		// Prepare a statement.
		$sql = $conn->prepare("INSERT INTO bank_transaction(id, accName, accNum, amount, recBank, recAccName, recAccNum) VALUES(?, ?, ?, ?, ?, ?, ?)");

		// Bind parameters.
		$sql->bind_param('isiissi', $this->userId, $this->accName, $this->accNum, $this->amtToTransfer, $this->recBank, $this->recAccName, $this->recAccNum);

		// Execute query.
		// Check if query was successful.
		if ($sql->execute() == true) {
			return true;
		}
		// Close Statement.
		$sql->close();

		// Close connection.
		$conn->close();

		return false;
	}

	/*
	 *	Updates the sender's account balance.
	 */
	public function updateBalance(): bool{
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("UPDATE bank_customers SET acctBal = ? WHERE acctNum = ?");

		// Bind parameters.
		$result  = $sql->bind_param('ii', $this->amtToTransfer, $this->accNum);

		// Execute query.
		$result = $sql->execute();

		// Check if query was successful.
		if ($result == true) {
			return true;
		}

		$sql->close();
		$conn->close();
	}

	/*
	 *	Transfer fund.
	 *	
	 *	Updates the receiver's account balance.
	 */
	public function tranferFund(): bool{
		// Include connection file.
		/*require_once '..\config.php';*/
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		// Prepare a statement.
		$sql = $conn->prepare("UPDATE bank_customers SET acctBal = ? WHERE acctNum = ?");

		// Bind parameters.
		$result  = $sql->bind_param('ii', $this->amtToTransfer, $this->recAccNum);

		// Execute query.
		$result = $sql->execute();

		// Check if query was successful.
		if ($result == true) {
			return true;
		}

		// Close statement.
		$sql->close();
		
		// Close connection.
		$conn->close();
		
		return false;
	}

	/*
	 *	Fetch Sender's account balance.
	 */
	public function getSendersBalance(): float{
		// Include connection file.
		/*require_once '..\config.php';*/
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("SELECT acctBal FROM bank_customers WHERE acctNum = ? LIMIT 1");

		// Bind parameters.
		$sql->bind_param('i', $this->accNum);

		// Execute query.
		$sql->execute();

		// Bind result value
		$sql->bind_result($bal);

		if ($sql->fetch() == true) {
			return $bal;
		}
		// Close statement.
		$sql->close();
		
		// Close connection.
		$conn->close();
		
		return false;
	}

	/*
	 *	Fetch Sender's account balance.
	 */
	public function getReceiversBalance(): float{
		// Include connection file.
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("SELECT acctBal FROM bank_customers WHERE acctNum = ? LIMIT 1");

		// Bind parameters.
		$sql->bind_param('i', $this->recAccNum);

		// Execute query.
		$sql->execute();

		// Bind result value
		$sql->bind_result($bal);

		if ($sql->fetch() == true) {
			return $bal;
		}
		// Close statement.
		$sql->close();
		
		// Close connection.
		$conn->close();
		
		return false;
	}

	public static function countRows(string $tableName): int{
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		// Get the number of pages
		$totalPageSql = "SELECT COUNT(*) FROM $tableName";

		$result = $conn->query($totalPageSql);

		$totalRows = $result->fetch_assoc()['COUNT(*)'];

		return $totalRows;
	}

	public static function getTransactions(int $offset = null, int $limit = null) {
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'bank_';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		$sql = $conn->prepare("SELECT id, transactionId, accName, accNum, amount, recBank, recAccName, recAccNum, transactionDate FROM bank_transaction ORDER BY transactionDate DESC LIMIT ?, ?");

		// Bind parameters.
		$sql->bind_param('ii', $offset, $limit);

		// Execute query.
		$result = $sql->execute();

		$data = [];

		// Bind result value
		$sql->bind_result($data['id'], $data['transactionId'], $data['accName'], $data['accNum'], $data['amount'], $data['recBank'], $data['recAccName'], $data['recAccNum'], $data['transactionDate']);


		while ($sql->fetch() == true) {
			$transactions = [];

			array_push($transactions, $data);
			
			foreach ($transactions as $transaction) {
				echo "
					<div class='transaction-wrap col-md-12'>
						<p>".
							"<strong>Account Name</strong>: ". $transaction['accName'] ."<br>
							<strong>Account Number</strong>: ". $transaction['accNum'] . 

							"<p class='text-center'> made a transfer of ₦". number_format($transaction['amount']) ."<br>to 
						</p>

						<p>
							<strong>Account Name</strong>: ". $transaction['recAccName'] ."<br>
							<strong>Account Number</strong>: ". $transaction['recAccNum'] ."</br>
							
							<strong> On </strong>". getDateFormated($transaction['transactionDate'])
						."</p>
					</div>
				";
			}
		}

		// Close statement.
		$sql->close();
		
		// Close connection.
		$conn->close();
	}
}