<?php
// DB Credentials.
$servername = "localhost" ;
$username = "root" ;
$password = "FASTlogin89" ;
$dbname = "Bank_" ;

// Create connection
$conn = mysqli_connect( $servername, $username,
$password, $dbname);
// Check connection
if ($conn->connect_error) {
  die( "Connection failed:" . $conn->connect_error() );
}

$tableName = "bank_transaction";

// sql to create table
$sql = "CREATE TABLE ". $tableName ." (
id INTEGER NOT NULL AUTO_INCREMENT UNIQUE,

userId INTEGER NOT NULL,

accName VARCHAR(25) NOT NULL,

accNum int(10) NOT NULL,

recBank VARCHAR(25) NOT NULL,

recAccName VARCHAR(25) NOT NULL,

recAccNum int(10) NOT NULL,

transactionDate TIMESTAMP NOT NULL DEFAULT  CURRENT_TIMESTAMP
)

 ENGINE=MyISAM DEFAULT CHARACTER SET latin1     

COLLATE latin1_general_cs";

if ($conn->query($sql) ===
TRUE) {
  echo "<strong>G4_Posts</strong> table created successfully" ;
} else {
  echo "Error creating table:<br/> " . $conn->error;
}
$conn->close();
?>