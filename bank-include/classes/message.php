<?php

/**
 * 
 */
class Message {
	/*
	 *	@var int The Message's ID.
	 */
	private $id;

	/*
	 *	@var int The Sender's ID.
	 */
	private $senderId;
	
	/*
	 *	@var int The Receiver's ID. 
	 */
	private $recId;

	/*
	 *	@var int The Message. 
	 */
	private $message;

	/*
	 *	@var int The data the message was sent. 
	 */
	private $chatDate;
	
	function __construct(int $id = null, int $senderId = null, int $recId = null, string $message = null, string $chatDate = null) {
		if (!empty($id)) {
			$this->id = $id;
		}

		if (!empty($senderId)) {
			$this->senderId = $senderId;
		}

		if (!empty($recId)) {
			$this->recId = $recId;
		}

		if (!empty($message)) {
			$this->message = $message;
		}

		if (!empty($chatDate)) {
			$this->chatDate = $chatDate;
		}

		$this->chatId = 0;
	}

	/*
	 *	Get the sender's ID.
	 */
	public function getSenderId(): int{
		return $this->senderId;
	}

	/*
	 *	Get the sender's ID.
	 */
	public function getRecId(): int{
		return $this->recId;
	}

	/*
	 * Get the message.
	 */
	public function getMessage() {
		// Include our configurations.
		require '../bank-include/conn.php';

		$sql = $conn->prepare("SELECT message, chatDate FROM bank_chat WHERE senderId = ? LIMIT 5");

		// Bind parameters.
		$sql->bind_param('i', $this->senderId);

		// Execute query.
		if ($sql->execute() === true) {
			// Bind result value.
			$sql->bind_result($data['message'], $data['chatDate']);
			
			// Instantiate an empty array
			$message = [];
			
			// Retrieve rows.
			while ($sql->fetch() === true) { ?>
				<p>
					<?php echo $data['message']; ?>
				</p>

				<small><?php echo getDateFormated($data['chatDate']); ?></small>
			<?php }
				
			// Return the messages
		} else {
			$message = ['false'];

			// Return False
			return $message;
		}

		// Close statement.
		$sql->close();
		
		// Close connection.
		$conn->close();
	}

	/*
	 *	Get the Chat Date.
	 */
	public function getChatDate(): string{
		return $this->chatDate;
	}

	/*
	 *
	 */
	public function insert(): bool{
		// Include our configurations.
		require '../bank-include/conn.php';

		// Prepare a statement.
		$sql = $conn->prepare("INSERT INTO bank_chat(senderId, recId, message) VALUES(?, ?, ?)");

		// Bind parameters.
		$sql->bind_param('iis', $this->senderId, $this->recId, $this->message);

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
}
/*
$id = null;
$senderId = 63;
$recId = 3;
$message = 'Hi, Binson';
$chatDate = null;*/


