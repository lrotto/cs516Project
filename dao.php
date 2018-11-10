<?php
	ob_start();
	$host="localhost"; // Host name 
	$sqlusername="root"; // Mysql username 
	$sqlpassword="P@ssw0rd"; // Mysql password 
	$db_name="cs516projectdb"; // Database name 
	$tbl_name=""; // Table name

	// Connect to server and select databse.
	$conn=mysqli_connect($host, $sqlusername, $sqlpassword, $db_name);
	if ($conn->connect_error) {
		die("Connection failed with the following error:" . $conn->connect_error);
	}
	mysqli_select_db($conn, $db_name) or die(mysql_error());
?>	
