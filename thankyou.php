<!DOCTYPE html>
<html>
<?php require "header2.php";
include_once "dao.php"; 
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();
?>
<head> 
<link rel="stylesheet" type="text/css" href= "base.css">
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
            $("body").css("display", "none");
            $("body").fadeIn(1000);
    });
</script>
<title>Thank you!</title>

<body>
	<h1>Thank you!!</h1>
	<div id="container">
		<div id="left"> 
			<div id="textleft">
				<span class="highlightme2">
					Thank you for your request. <br><br>Don't forget to call for a pick-up date and time!
				</span>
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