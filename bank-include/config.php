<?php
//Set to true if it's a production environment else false for development
define('IS_ENV_PRODUCTION', false);

//Configure error reporting options
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', !IS_ENV_PRODUCTION);
ini_set('error_log', 'log/phpError.txt');

//Set time zone to use date/time functions without warnings
date_default_timezone_set('Africa/Lagos'); //http://www.php.net/manual/en/timezones.php

//Store credentials in variables
$servername = '';
$siteurl = 'http://localhost/bank';
$username = 'binemmanuel';
$password = 'FASTlogin89';
$dbname = 'bank_';

//Database connection and SCHEMA constants
define('DB_HOST', $servername);
define('SITE_URL', $siteurl);
define('DB_USER', $username);
define('DB_PASSWORD', $password);
define('DB_SCHEMA', $dbname);
define('IMAGE_PATH', "bank-contents/uploads/");
define('IMAGE_FULLSIZE', "fullsize");
define('IMAGE_THUMBNAIL', "thumbnail");
define('THUMBNAIL_WIDTH', 120);
define('PNG_QUALITY', 85);
define('DEFUALTPROFILEPIC', 'http://localhost:8080/bank/admin/uploads/image/temp.jpg');

//Establish a connection to the database server
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);

// Check connection
if ($conn == false)
	die("<strong>Error</strong>: Couldn't establish a connection. " . $conn->error );