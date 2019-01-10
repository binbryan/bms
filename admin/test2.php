<?php
// Create connection to the db.
$conn = new mysqli('binemmanuel', 'FASTlogin89');

// Check if page number is set.
if (isset($_GET['pageNo']) && is_numeric($_GET['pageNo'])) {
	$pageNo = htmlspecialchars(stripcslashes(trim($_GET['pageNo'])));


	$pageNo++;
	echo 'Page '. $pageNo;
	echo '<br>';
	echo '<br>';
} else {
	$pageNo = 1;

	echo 'Page '. $pageNo;
	echo '<br>';
	echo '<br>';
}

$numberOfRecordsPerPage = 10;

$offset = ($pageNo - 1) * $numberOfRecordsPerPage;

echo $offset;
echo '<br>';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="?pageNo=<?php echo $pageNo; ?>">Next Page >></a>
</body>
</html>