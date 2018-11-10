<!DOCTYPE html>
<html>
<?php require_once "header2.php"; ?> 
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>Categories</title>

<body>

<?php
// define variables and set to empty values
$noselectionerr = $catid = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ((isset($_POST['submit'])) && (isset($_POST['genre']))){
		testcat($_POST['genre']);
	}
  else{
    $noselectionerr = "** Please choose a genre!";
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

	<h1>Choose your genre:</h1>
	
	<div id="container">
		<div id="left">  
			<div  class="formcol" id="formtext">
				<form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
					<span class="highlightme">
					<input type="radio" name="genre" value=1> Science&nbspFiction &nbsp<br>
					<input type="radio" name="genre" value=2> Fantasy&nbsp<br>
					<input type="radio" name="genre" value=3> Non-Fiction&nbsp<br>
					<input type="radio" name="genre" value=4> Education(CS)&nbsp<br>
					<input type="radio" name="genre" value=5> Religion&nbsp<br>
					<span class="error"><?php echo $noselectionerr;?></span>
					</span>
					<input type="submit" name="submit" id="button" id="buttonleft" value="Submit"/>
				</form>
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