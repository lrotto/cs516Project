<?php
include_once 'register.inc.php';
include_once 'functions.php';
require_once "header3.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Registration Form</title>
        <script type="text/JavaScript" src="sha512.js"></script> 
        <script type="text/JavaScript" src="forms.js"></script>
		<link rel="stylesheet" type="text/css" href= "base.css">
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not set or if the registration script caused an error. -->
        <h1>Register With Us</h1>
 		<div id="container">
		<div id="textleft2"> 
		<div  class="formcol2" id="formtext">
		   <p><div class="error2"></div></p>
		   <?php
			if (!empty($error_msg)) {
				echo $error_msg;
			}?>
       <ul class="highlightme">
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
        <form form method="post" name="registration_form" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>">
				<span class="highlightme">
				<label for="username">Username: <input type='text' name='username' id='username' /><br>
            <label for="email">Email: <input type="text" name="email" id="email" /><br>
            
			<label for="fname">First Name: <input type="fname" name="fname" id="fname"/><br>

			<label for="password">Password: <input type="password" name="password" id="password"/><br>
            
			<label for="confirmpwd">Confirm password: <input type="password" name="confirmpwd" id="confirmpwd" /><br>
            
			<input type="submit" id = "button" id="buttonleft" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" /> 
								   
        </form>
        <p>Return to the <a href="login2.php" class="lnkcolor" >Login Page</a>.</p>
		</div>
		</div>
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