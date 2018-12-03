<!DOCTYPE html>
<html>
<?php 
require_once "header2.php";
include_once "dao.php"; 
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start(); // Start a secure PHP session.

if(!login_check($mysqli) == true) {
       header ('location: login2.php');
} 
if(isset($_SESSION['mysqli'])) {
	$mysqli = $_SESSION['mysqli'];
}
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
if(isset($_SESSION['bookname'])) {
	$bookname = $_SESSION['bookname'];
}
?>

<head> <link rel="stylesheet" type="text/css" href= "base.css">
<script type="text/JavaScript" src="forms.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<title>ShoppingCart</title>

<body>

<script type="text/javascript">
function clearcart(){
   var clear = <?php echo clearcartphp($username)?>; // call function to execute php mysql queries
   return false;
 }
</script>

<?php			
	$sql="SELECT  * FROM shoppingcart where username='$username'";
	$result=mysqli_query($mysqli, $sql);
	$row = mysqli_fetch_assoc ($result);
	$numrows = mysqli_num_rows($result);
	
	function clearcartphp($username) {
		$sql2 = "UPDATE booklist SET available=1 WHERE chkdusr='$username'"; 
		$sql3 = "UPDATE booklist SET chkdusr=NULL WHERE chkdusr='$username'"; 
		$sql4 = "DELETE FROM shoppingcart WHERE username='$username'"; 
		(mysqli_query($mysqli, $sql2)); 
		(mysqli_query($mysqli, $sql3)); 
		(mysqli_query($mysqli, $sql4)); 
//		header("Location: shoppingcart.php");
	}

?>

	<h1>Books in Cart:</h1>
	
		<div  class="cartalign" id="formtext">
				<?php 				
				$i = 1;
				foreach ($result as $row){
					echo $i.". ".$row['bookname']."<br>";
					$i++;
				}?>

		</div>
		<div  class="cattextalign" id="formtext">
				<a href="categorychoice.php" id="button" id="buttonleft">Return to Categories</a>
				<a href="shoppingcart.php" type="submit" onclick=
				<?php 
				$sql2 = "UPDATE booklist SET available=1 WHERE chkdusr='$username'"; 
				$sql3 = "UPDATE booklist SET chkdusr=NULL WHERE chkdusr='$username'"; 
				$sql4 = "DELETE FROM shoppingcart WHERE username='$username'"; 
				(mysqli_query($mysqli, $sql2)); 
				(mysqli_query($mysqli, $sql3)); 
				(mysqli_query($mysqli, $sql4)); 
				?>
				type=submit id="button" id="buttonleft">Clear <br>Cart</a>
				<br><br>
				<span class="highlightme">
					Books will be ready on the day requested.  Please call to confirm pick-up date and time.
				</span>
				<br><br>
				<a href="thankyou.php" type=submit id="button" id="buttonleft">Complete Request</a>
		</div>

</body>
</html>
