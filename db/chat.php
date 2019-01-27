<?php
// Include connection file.
require 'conn.php';

// Store the Table Name.
$tableName = "bank_chat";

// sql to create table
$sql = "CREATE TABLE $tableName (
	chatId INTEGER NOT NULL AUTO_INCREMENT UNIQUE,

	id INTEGER NOT NULL, # The user's ID.

	recMessage VARCHAR(150) NOT NULL,  # The Reciever's Message.

	senMessage VARCHAR(150) NOT NULL, # The Sender's Message.

	chatDate TIMESTAMP NOT NULL DEFAULT  CURRENT_TIMESTAMP # The Current time stamp.
	)

	ENGINE = MyISAM DEFAULT CHARACTER SET latin1     

	COLLATE latin1_general_cs
";

/* // Bind parameter.
$sql->bind_param('s', $tableName);

// Ececute the query.
if ($sql->execute() == flase) {
	// Print an error message if connection wasn't successful.
	echo "Error creating table:<br/> " . $conn->error;
} else {
	// Print an error message if connection wasn't successful.
	echo "<strong>" . $tableName . "</strong> table created successfully";
} */

if ($conn->query($sql) === TRUE) {
	// Print an error message if connection wasn't successful.
	echo "<strong>". $tableName ."</strong> table created successfully" ;
} else {
	// Print an error message if connection wasn't successful.
	echo "Error creating table:<br/> " . $conn->error;
}

/* // Close statement.
$sql->close(); */

// Close connection.
$conn->close();