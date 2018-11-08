<?php
ob_start();
	$host="localhost"; // Host name 
	$sqlusername="root"; // Mysql username 
	$sqlpassword=""; // Mysql password 
	$db_name="cs516projectdb"; // Database name 
	$tbl_name=""; // Table name

	// Connect to server and select databse.
	$conn=mysqli_connect($host, $sqlusername, $sqlpassword, $db_name);
	if ($conn->connect_error) {
		die("Connection failed with the following error:" . $conn->connect_error);
	}
	mysqli_select_db($conn, $db_name) or die(mysql_error());
	
	$sql="SELECT  * FROM user WHERE username='$username'";
	$password = mysqli_real_escape_string($conn, $password);
	$result=mysqli_query($conn, $sql);

	if(!$result==null){
		$row = mysqli_fetch_assoc($result);
		if ($password == $row['password']){
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['userid'] = $userid;
			$_SESSION['fname'] = $row['fname'];
			$sql="UPDATE user SET access=1 where username='$username'";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			mysqli_free_result($result);
		}
		else {
			$loginerr = "Wrong Username or Password";
			return $loginerr;
			}
	}

?>