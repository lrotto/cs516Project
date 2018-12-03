<?php
include_once 'dao.php';   
$mysqli = new mysqli(HOST, SQLUSERNAME, PASSWORD, DB_NAME);
	if ($mysqli->connect_error) { 
	header("Location: error.php?err=Unable to connect to the Database Server.");   
	exit();
 }
?>