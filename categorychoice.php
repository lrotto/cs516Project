<!DOCTYPE html>
<html>
<?php require_once "header2.php";  
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start();
if(!login_check($mysqli) == true) {
       header ('location: login2.php');
} 


?>
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


?>

	<h1>Choose your genre:</h1>
	
	<div id="container">
		<div id="left">  
			<div  class="formcol" id="formtext">
				<form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
					<span class="highlightme">
					<input type="radio" name="genre" id="Science Fiction" value=1> <label for="Science Fiction">Science Fiction&nbsp<br></label> 
					<input type="radio" name="genre" id="Fantasy" value=2> <label for="Fantasy">Fantasy&nbsp<br></label>
					<input type="radio" name="genre" id="Non-Fiction" value=3> <label for="Non-Fiction">Non-Fiction&nbsp<br></label>
					<input type="radio" name="genre" id="Education(CS)" value=4> <label for="Education(CS)">Education(CS)&nbsp<br></label>
					<input type="radio" name="genre" id="Religion"value=5> <label for="Religion">Religion&nbsp<br></label><br>
					<span class="usrmsgs"><?php echo $noselectionerr;?></span>
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