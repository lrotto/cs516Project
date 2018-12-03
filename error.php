<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Secure Login: Error</title>
		<link rel="stylesheet" type="text/css" href= "base.css">
    </head>
    <body>
		<div id="container">
		<div id="left"> 
		<div  class="formcol2" id="formtext">
         <h1>There was a problem</h1>
        <p class="error"><?php echo $error; ?></p>  
		</div>
		</div>
		</div>
    </body>
</html>