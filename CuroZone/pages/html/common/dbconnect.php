<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>connecting...</title>
</head>

<body>
	<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$dbName = "curozone";

	$con = mysqli_connect("$host", "$username", "$password", "$dbName");
	if ($con === false) {
		die("Faild to connect database");
	} else {
		//echo "Connection Success!!";
	}
	?>
</body>

</html>