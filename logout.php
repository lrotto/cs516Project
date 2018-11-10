<!DOCTYPE html>
<html>
   <?php require_once "header4.php"; ?> 
   <?php session_start();
		$access = $_SESSION['access'];
		$username = $_SESSION['username'];?>
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>Logout</title>

<body>
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
	$sql="UPDATE user SET access=0 where username='$username'";
	mysqli_query($conn, $sql);
	(session_destroy()) // Destroying All Sessions
?>
	<h1>Thank you!!</h1>
	<div id="container">
		<div id="left"> 
			<div id="textleft">
				<span class="highlightme2">
					Thank you for visiting my site.  Have a great day!
				</span>
			</div>
		</div>
		<div id="right">
			<img src="images/bookcase2.jpg" alt="Otto Bookshelf" id="bookshelfimg">
		</div>
		<div class="clear">
		</div>
	</div>
	

</body>
</html> 
