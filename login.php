<!DOCTYPE html>
<html>
   <?php require_once "header3.php"; ?> 
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>Login here!</title>

<body>

<?php
// define variables and set to empty values
$username = $password  = $usernameerr = $passworderr  = $loginerr = $fname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameerr = "** Name is required";
  } else {
    $username = test_input($_POST["username"]);
	// check if name only contains letters
    if (!preg_match("/^[a-zA-Z]*$/",$username)) {
      $usernameerr = "Only letters allowed";
    }
  }

  if (empty($_POST["password"])) {
    $passworderr = "** Password is required";
  } else {
	$password = check_user_pass($_POST["username"], $_POST["password"]);
	if ($password == "Wrong Username or Password") {
		$loginerr = "**Wrong Username or Password**";
	}
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function check_user_pass($username, $password) {

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
			$_SESSION['access'] = $access;
			$_SESSION['fname'] = $row['fname'];
			$sql="UPDATE user SET access=1 where username='$username'";
			mysqli_query($conn, $sql);
			mysqli_close($conn);
			mysqli_free_result($result);
			header("location:home.php");
		}
		else {
			$loginerr = "Wrong Username or Password";
			return $loginerr;
			}
	}
}
?>	


	<h1>Login Here!</h1>
	
		<div id="container">
		<div id="left"> 
			<div  class="formcol" id="formtext">
				<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<p><div class="error2"><?php echo $loginerr;?></div></p>
					<span class="highlightme">
					<label for="username">Username: <input type="text" id="username" name="username" value = "<?php echo $username;?>" autofocus<br>
					<span class="error3">*&nbsp<br> <?php echo $usernameerr;?></span>
					<br><br>
					<label for="password">Password: <input type="password" id="password" name="password" value = "<?php echo $password;?>" autofocus<br>
					<span class="error3">*&nbsp<br> <?php echo $passworderr;?></span>
					<br><br>
					</span>
					<input type="submit" value="Submit" autofocus> 
				</form>
				<p><div class="error">* required field</div></p>			
					
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
