<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Start secure PHP session.

	$blanks = ids($_POST['username'], $_POST['f']);
	$ublank = $blanks[1];
	$pblank = $blanks[0];


if (isset($_POST['username'], $_POST['p'])) {
	if ($ublank || $pblank){
		if ($ublank && !$pblank){
				header('Location: login2.php?error1=1');
		}
		if ($pblank && !$ublank){
				header('Location: login2.php?error2=1');
		}
		if ($ublank && $pblank){
				header('Location: login2.php?error3=1');
		}	exit(); 
	}

    $username = filter_input(INPUT_POST, 'username');
    $password = $_POST['p']; // The hashed password.
 
    if (login($username, $password, $mysqli) == true) {
        // Login success
        header('Location: home.php');
		exit();
    } else {
        // Login failed 
        header('Location: login2.php?error=1');
		exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: error.php?err=Could not process login');
    exit();
}
?>