<?php
// 
//Establish a connection to the database server
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);

// Check connection
if ($conn == false)
	die("<strong>Error</strong>: Couldn't establish a connection. " . $conn->error );