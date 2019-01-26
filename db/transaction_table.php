<?php
// Include connection file.
require 'conn.php';

// Store the Table Name.
$tableName = "bank_transaction";

// sql to create table
$sql = $conn->prepare("CREATE TABLE ? (
	transactionId INTEGER NOT NULL AUTO_INCREMENT UNIQUE,

	id INTEGER NOT NULL,

	accName VARCHAR(25) NOT NULL,

	accNum int(10) NOT NULL,

	recBank VARCHAR(25) NOT NULL,

	recAccName VARCHAR(25) NOT NULL,

	recAccNum int(10) NOT NULL,

	transactionDate TIMESTAMP NOT NULL DEFAULT  CURRENT_TIMESTAMP
	)

	ENGINE = MyISAM DEFAULT CHARACTER SET latin1     

	COLLATE latin1_general_cs
");

// Bind parameter.
$sql->bind_param('s', $tableName);

// Ececute the query.
if ($sql->execute() == flase) {
	// Print an error message if connection wasn't successful.
	echo "Error creating table:<br/> " . $conn->error;
} else {
	// Print an error message if connection wasn't successful.
	echo "<strong>" . $tableName . "</strong> table created successfully";
}


/* if ($conn->query($sql) === TRUE) {
	// Print an error message if connection wasn't successful.
	echo "<strong>". $tableName ."</strong> table created successfully" ;
} else {
	// Print an error message if connection wasn't successful.
	echo "Error creating table:<br/> " . $conn->error;
} */

// Close statement.
$sql->close();

// Close connection.
$conn->close();
?>