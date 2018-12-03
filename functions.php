<?php
include_once 'dao.php';
 
function sec_session_start() {
    $session_name = 'sec_session';    
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id();    // regenerated the session, delete the old one. 
}
function ids($username, $password) {
	$ublank = $pblank = false;
	if ($username == "" || $password == ""){		
		if ($username == ""){
			$ublank = true;}
		if ($password == ""){
			$pblank = true;}
			return array($pblank, $ublank); 
	}
}

function login($username, $password, $mysqli) {

    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("SELECT userid, username,  password, fname, salt FROM user WHERE username = ? LIMIT 1")) {
        $stmt->bind_param('s', $username);  // Bind "$username" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($userid, $username, $db_password, $fname, $salt);
        $stmt->fetch();
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
 
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($userid, $mysqli) == true) {
                // Account is locked 
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted, using
                // the password_verify function to avoid timing attacks.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $userid = preg_replace("/[^0-9]+/", "", $userid);
                    $_SESSION['userid'] = $userid;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/","",$username);
                    $_SESSION['username'] = $username;
                    // XSS protection as we might print this value
                    $fname = preg_replace("/[^a-zA-Z0-9_\-]+/","",$fname);
                    $_SESSION['fname'] = $fname;
                    $_SESSION['login_string'] = hash('sha512', $db_password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();
                    if (!$mysqli->query("INSERT INTO login_attempts(userid, time) VALUES ('$userid', '$now')")) {
                        header("Location: error.php?err=Could not update Database table login_attempts");
                        exit();
                    }
                    return false;
                }
            }
		}
    } else {
        // Could not create a prepared statement
        header("Location: error.php?err=Database error: Cannot access database using given credentials.");
        exit();
    }
}

function checkbrute($userid, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE userid = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $userid);
 
        // Execute the prepared query. 
        $stmt->execute();
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    } else {
        // Could not create a prepared statement
        header("Location: ../error.php?err=Database error: cannot check for brute force using given information.");
        exit();
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['userid'], $_SESSION['username'], $_SESSION['login_string'])) {
        $userid = $_SESSION['userid'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password FROM user WHERE userid = ? LIMIT 1")) {
            // Bind "$userid" to parameter. 
            $stmt->bind_param('i', $userid);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if (hash_equals($login_check, $login_string) ){
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
         } else {
            // Could not prepare statement
            header("Location: error.php?err=Database error: did not receive userid, username and login session parameters.");
            exit();
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function testcat($catid) {
  if ($catid == 1) {
	header( "Location: scifi.php" );
  }
  else if ($catid == 2) {
	header( "Location: fantasy.php" );
  }
  else if ($catid == 3) {
	header( "Location: non-fiction.php" );
  }
  else if ($catid == 4) {
	header( "Location: ed-cs.php" );
  }
  else if ($catid == 5) {
	header( "Location: religion.php" );
  }
}



?>

