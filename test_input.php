<?php
// define variables and set to empty values
$username = $password  = "";
$usernameerr = $passworderr  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = test_input($_POST["username"]);
  $password = test_input ($_POST["password"]);
//  $email = test_input($_POST["email"]);
//  $website = test_input($_POST["website"]);
//  $comment = test_input($_POST["comment"]);
//  $gender = test_input($_POST["gender"]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "Name is required";
  } else {
    $username = test_input($_POST["username"]);
	// check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameerr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["password"])) {
    $emailErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>