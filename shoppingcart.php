<!DOCTYPE html>
<html>
<?php require_once "header2.php"; ?> 
<?php require_once "dao.php"; ?> 
<?php session_start();
	if(isset($_SESSION['conn'])) {
		$conn = $_SESSION['conn'];
	}
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	
?>

<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>ShoppingCart</title>

<body>
<?php			
				$sql="SELECT  * FROM shoppingcart where username='$username'";
				$result=mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc ($result);
				$numrows = mysqli_num_rows($result);
				
function clearcart(){
				$sql2="DELETE FROM shoppingcart where username='$username'";
				mysqli_query($conn, $sql);
				header("location:shoppingcart.php");
}

?>



	<h1>Books in Cart:</h1>
	
		<div  class="cartalign" id="formtext">
				<span class="highlightme">
				<?php 				
				$i = 1;
				foreach ($result as $row){
					echo $i.". ".$row['bookname']."<br>";
					$i++;
				}?>
<!--				<button "name='del' onclick="clearcart()" >Clear Cart</button><br />-->
				</span>

		</div>
		<div  class="sctextalign" id="formtext">
				<a href="categorychoice.php" id="button" id="buttonleft">Return to Categories</a>
				<a href="thankyou.php" id="button" id="buttonleft">Complete Request</a><br><br>
				<span class="highlightme">
					Books will be ready on the day they are needed.  Please call to confirm pick-up time.
				</span>
		</div>

</body>
</html>