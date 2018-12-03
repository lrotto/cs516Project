<?php 
include_once "dao.php"; 
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Start a secure PHP session.

if(isset($_SESSION['mysqli'])) {
	$mysqli = $_SESSION['mysqli'];
}
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}


	$sql2 = "UPDATE booklist SET available=1 WHERE chkdusr='$username'"; 
	$sql3 = "UPDATE booklist SET chkdusr=NULL WHERE chkdusr='$username'"; 
	$sql4 = "DELETE FROM shoppingcart WHERE username='$username'"; 
	(mysqli_query($mysqli, $sql2)); 
	(mysqli_query($mysqli, $sql3)); 
	(mysqli_query($mysqli, $sql4)); 
	header("location: shoppingcart.php");

?>
