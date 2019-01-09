<?php
/**
 * The class responsible to handle media files
 */
class library{
	// Class properties.
	/*
	 *	@var int The file's ID from the database.
	 */
	public $id;

	/*
	 *	@var string The link to the file.
	 */
	public $link;

	/*
	 *	@var string The type of file.
	 */
	public $type;	

	/*
	 *	@var int The date the file was uploaded.
	 */
	public $uploadedOn;
	function __construct(int $id = null, string $link = null, string $type = null, string $uploadedOn = null){
		/*
		 * Store the data if they are not empty.
		 */
		if (!empty($id)) {
			$this->id = (int) $id;
		}

		if (!empty($link)) {
			$this->link = (string) htmlspecialchars(trim($link));
		}

		if (!empty($type)) {
			$this->type = (string) htmlspecialchars(trim($type));
		}

		if (!empty($uploaded)) {
			$this->uploaded = (string) $uploaded;
		}
	}

	/*
	 * Return a Post object by ID.
	 * 
	 * @param int The media's ID.
	 * @return The Media file||error message if not found or there was a problem.
	 */
	public static function getMedia(int $id = null){
		/*
		 * Create a connection to the database.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'g4_zerabtech';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection.
		if ($conn === false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		/**/
		if (!empty($id)) {
			// Prepare a statement.
			$sql = "SELECT * FROM g4_library WHERE id = $id ORDER BY id DESC";
		} else {
			// Prepare a statement.
			$sql = "SELECT * FROM g4_library ORDER BY id DESC";
		}

		$result = $conn->query($sql);

		$mediaFile = array();

		if ($result == true && $result->num_rows > 0) {
			// Retrieve rows.
			while ($row = $result->fetch_assoc()) {
				// Store the retrieved rows.
				$rowId = $row['id'];
				$rowLink = $row['link'];
				$rowType = $row['type'];
				$rowUploadedOn = $row['uploadedOn'];

				// Create an Object.
				$mediaFiles = new Library($rowId, $rowLink, $rowType, $rowUploadedOn);



				// Bind array.
				array_push($mediaFile, $mediaFiles);
			}
		} else {
			return false;
		}

		return $mediaFile;
	}

	/*
	 *	Insert the current Media file object to the database.
	 */
	function insert(){
		/*
		 * Create a connection to the database.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'g4_zerabtech';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn === false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		// A query to Insert data
		$sql = $conn->prepare("INSERT INTO bank_user(link, type) VALUES(?, ?)");

		$sql->bind_param('ss', $this->link, $this->type);
		$result = $sql->execute();
		
		return true;

		$sql->close();
		$conn->close();
	}

	/*
	 *	Delete the current Media file object in the database.
	 */
	function delete(){
		// Check if the Media's ID is given.
		if (empty($this->id))
			trigger_error("<strong>Library::delete()</strong>: Attempt to delete a Media file that doesn't have it's ID set", E_USER_ERROR);

		/*
		 * Create a connection to the database.
		 */
		//Store credentials in variables.
		$servername = 'localhost';
		$username = 'root';
		$password = 'FASTlogin89';
		$dbname = 'g4_zerabtech';

		//Establish a connection to the database server.
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn === false) {
			die("<span style='border-left: 5px solid #f00;'><strong>Error</strong>: Couldn't establish a connection." . $conn->error ."</span>" );
		}

		/*
		 * Delete the Meida file
		 */
		$sql = $conn->prepare("DELETE FROM g4_library WHERE id = ? LIMIT 1");
		$sql->bind_param('i', $this->id);
		$result = $sql->execute();

		return true;

		$sql->close();
		$conn->close();
	}
} // end of file