<?php
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="cs516projectdb"; // Database name 
$tbl_name=""; // Table name

// Connect to server and select databse.
$con=mysqli_connect("$host", "$username", "$password", $db_name);
echo "Connected to MySQL<br />";
mysqli_select_db($con, $db_name) or die(mysql_error());
echo "Connected to Database<br />";

$sql="SELECT * FROM user WHERE username='$username'";
$result=mysqli_query($con, $username);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
if($count==1){
    $row = mysql_fetch_assoc($result);
    if (SHA1($password, $row['password']) == $row['password']){
        session_register("username");
        session_register("password"); 
        echo "Login Successful";
        return true;
    }
    else {
        echo "Wrong Username or Password";
        return false;
    }
}
else{
    echo "Wrong Username or Password";
    return false;
}
?>