<!DOCTYPE html>
<html>
<?php 
require_once "header.php";
include_once "dao.php"; 
include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start(); // Our custom secure way of starting a PHP session.

if(!login_check($mysqli) == true) {
       header ('location: login2.php');
}
?>
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<script type="text/javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
            $("body").css("display", "none");
            $("body").fadeIn(3000);
    });
</script>

<title>Linda's Book Sharing</title>

<body>
	<div id="container">
		<div id="left"> 
			<div id="textleft">
				<span class = highlightme2>
					Welcome, <?php echo htmlentities($_SESSION['fname']); ?>!!</br></br>
				</span>
				<a href="categorychoice.php" id="button" id="buttonleft">Browse Book Categories</a>
			</div>
		</div>
	</div>
		<div id="right">
			<img src="images/bookcase2.jpg" alt="Otto Bookshelf" id="bookshelfimg">
		</div>
		<div class="clear"></div>

	
	<div class="ptext">
		<p>This site is dedicated to lovers of 'REAL' books in the Boton, MA area. If you are interested in checking out books in the following categories, contact Linda for a username and password.</p>
		<p>Books can be checked out for a period of 2 weeks. Users must agree to return books in the same condition they checked them out. Only 3 books may be checked out at a time.</p>
	<div/>
    </body>
</html>
</body>
</html> 
