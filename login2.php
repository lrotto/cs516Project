
<?php
include_once 'db_connect.php';
include_once 'functions.php';
require_once "header3.php";   
sec_session_start();
	if (login_check($mysqli) == true) {
		$logged = 'in';
	} else {
		$logged = 'out';
	}
?>

<!DOCTYPE html>
<html>
	<head> 
		<title>Login here!</title>
		<link rel="stylesheet" type="text/css" href= "base.css">
        <script type="text/JavaScript" src="sha512.js"></script> 
        <script type="text/JavaScript" src="forms.js"></script> 
	</head>
	<body>
		<?php
		$usernameerr = $passworderr  = $loginerr = "";		
        if (isset($_GET['error'])) {
            $loginerr = "Wrong Username or Password.";
			$usernameerr = "";
			$passworderr = "";
        }
     
		if (isset($_GET['error1'])) {
            $usernameerr = "<br>Username must have a value!<br>";
			$passworderr = "";
            $loginerr = "";
        }
      
		if (isset($_GET['error2'])) {
            $passworderr = "<br>Password must have a value!<br>";
 			$usernameerr = "";
            $loginerr = "";
       }

		if (isset($_GET['error3'])) {
            $usernameerr = "<br>Username must have a value!<br>";
            $passworderr = "<br>Password must have a value!<br>";
            $loginerr = "";
        }
        ?> 
		<h1>Login Here!</h1>
	
	<div id="container">
		<div id="left"> 
			<div  class="formcol" id="formtext">
				<form action="do_logins.php" method="POST" name="login_form">
					<p><div class="error2"><?php echo $loginerr;?></div></p>
					<label for="Username">Username: <input type="text" id="username" name="username" autofocus /> <span class="star">*&nbsp</span><br> 
					<span class="error3"><?php echo $usernameerr;?></span>
					<br>
					<label for="Password">Password: <input type="password" id="password" name="password" autofocus /> <span class="star">*&nbsp</span><br> 
					<span class="error3"><?php echo $passworderr;?></span>
					<br>
					<input type=submit id = "button" id="buttonleft" value="Login" onclick="formhash(this.form, this.form.password)" autofocus/> 
				</form>
				<p><div class="error">* required field</div></p>
				
					<?php
					if (login_check($mysqli) == true) {
						echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
			 
						echo '<p>Do you want to change user? <a href="logout1.php" class="lnkcolor">Log out</a> or <a href="home.php" 
							class="lnkcolor">Return to Home Screen</a>.</p>';
					} else {
						echo '<p>Currently logged ' . $logged . '.</p>';
						echo "<p>If you don't have a login, please <a href='register.php' class='lnkcolor'>register</a>.</p>";
					  }
					?>	
				
			</div>
		</div>
			<div id="right">
				<img src="images/bookcase2.jpg" alt="Otto Bookshelf" id="bookshelfimglog">
			</div>
			<div class="clear"></div>
	</div>

	<script>
	document.querySelector("#addLinks").addEventListener("keyup", event => {
    if(event.key !== "Enter") return; // Use `.key` instead.
    document.querySelector("#linkadd").click(); // Things you want to do.
    event.preventDefault(); // No need to `return false;`.
	});
	</script>
</body>
</html>
