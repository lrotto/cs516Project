<!DOCTYPE html>
<html>
<?php 
require_once "header2.php";
include_once "dao.php"; 
include_once 'db_connect.php';
include_once 'functions.php';
sec_session_start(); // Our custom secure way of starting a PHP session.
if(!login_check($mysqli) == true) {
       header ('location: login2.php');
} 
	if(isset($_SESSION['mysqli'])) {
		$mysqli = $_SESSION['mysqli'];
	}
	if(isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
	}
	if(isset($_SESSION['bookid'])) {
	$bookid = $_SESSION['bookid'];}	
?>


<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>Religion</title>

<body>

<?php
	$bookid=$bookname=$bookcoverpic=$catid=$available=$noselectionerr=$selectiondir=$notavailable="";
	$datereq=$book1=$notavailable=$book2=$books=$available1=$available2="";


	$_SESSION['bookid'] = $bookid;
	$_SESSION['bookname'] = $bookname;
	$_SESSION['bookcoverpic'] = $bookcoverpic;
	$_SESSION['catid'] = $catid;
	$_SESSION['available'] = $available;
	$_SESSION['datereq'] = $datereq;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ((isset($_POST['formsubmit'])) && (!empty($_POST['check_list']))){
			$bookar = $_POST['check_list'];
			$N = COUNT($bookar);
			$book1 = null;
			if($N>0) {
				foreach($_POST['check_list'] as $selected){
					$ckval = $selected;
					$sql="SELECT  * FROM booklist where bookid=($ckval)";
					$result=mysqli_query($mysqli, $sql);
					$row = mysqli_fetch_assoc ($result);
					$scbook = $row['bookname'];
					if ($book1 == null  && $selected <> 4 && $row['available']==1){
						$book1 = $row['bookname'];
						$available1 = $row['available'];
						$books = $book1;
						$sql3="UPDATE booklist SET available=0 where bookid=$ckval";
						mysqli_query($mysqli, $sql3);
						$sql4="INSERT INTO shoppingcart (username, bookname) VALUES ('$username', '$scbook')";
						mysqli_query($mysqli, $sql4);
						$sql5="UPDATE booklist SET chkdusr='$username' where bookid=$ckval";
						mysqli_query($mysqli, $sql5);
					}
					if ($selected == 4 && $row['available']==1) {
						$book2 = $row['bookname'];
						$available2 = $row['available'];
						if ($book1==$book2){
							$books = $book2;}
						else {
							$books = $book1." and ".$book2;}
						$sql3="UPDATE booklist SET available=0 where bookid=$ckval";
						mysqli_query($mysqli, $sql3);
						$sql4="INSERT INTO shoppingcart (username, bookname) VALUES ('$username', '$book2')";
						mysqli_query($mysqli, $sql4);
						$sql5="UPDATE booklist SET chkdusr='$username' where bookid=$ckval";
						mysqli_query($mysqli, $sql5);
					}
					if ($available1 == null && $available2 == null) {
						$notavailable = "My apologies.  Your selection is not available. Please make another selection or feel free to check other categories.";
						$selectiondir = "";}
					else if ($available1 == null && $available2 == 1) {
						$selectiondir = "You have selected: '$scbook'.  Please use the navigation bar at the top of the screen to return to the Categories menu or go to the Shopping Cart and check out.";}
					else if ($available1 == 1 && $available2 == null) {
						$selectiondir = "You have selected: '$scbook'.  Please use the navigation bar at the top of the screen to return to the Categories menu or go to the Shopping Cart and check out.";}
					else if ($available1 == 1 || $available2 == 1) {
						$selectiondir = "You have selected: '$books'.  Please use the navigation bar at the top of the screen to return to the Categories menu or go to the Shopping Cart and check out.";
						$notavailable = "";}
				}
			}
		}
		else {
			$selectiondir = "";
			$noselectionerr = "You didn't select any Books. Choose Category Choices from the navigation bar to select a different category.";
		}
	}		
		

?>

	<h1>Religion</h1>
	<form method="POST" action="<?php echo ($_SERVER["PHP_SELF"]);?>">
	<div  class="cattextalign" id="formtext">
		<span class="usrmsgs"> <?php echo $noselectionerr.$selectiondir.$notavailable;?></span>
	</div>
	<div class="tablealign">	
		<table style="width:50%" id="t01">
			<col width="5%">
			<col width="85%">
			<col width="10%">
			  <tr>
				<th>Select</th>
				<th>Title</th> 
				<th>Cover</th>
				<th>Available?</th>
			  </tr>
			  <tr>
				<td><input type="checkbox" name = "check_list[0]" id="The World Without Us" value = 3></td>
				<td><label for="The World Without Us">The World Without Us</td> 
				<td class="colpicalign"><label for="The World Without Us"><img src="bookpics/world-w-out-us.jpg" alt="World Without Us"/></td>
				<td><label for="The World Without Us"><?php $av = "Available"; $sql2="SELECT * FROM booklist where bookid=3"; $result2=mysqli_query($mysqli, $sql2); $row2 = mysqli_fetch_assoc ($result2);
					$scbook2 = $row2['available']; if ($scbook2==1){echo "Available";} else{echo "Not available.";} ?> 
				</td>
			  </tr>

			  <tr>
				<td><input type="checkbox" name = "check_list[1]" id="Make Today Matter" value = 4></td>
			   <td><label for="Make Today Matter">Make Today Matter</td> 
				<td class="colpicalign"><label for="Make Today Matter"><img src="bookpics/maketodaymatter.jpg" alt="Make Today Matter"/></td>
				<td><label for="Make Today Matter"><?php $av = "Available"; $sql2="SELECT * FROM booklist where bookid=4"; $result2=mysqli_query($mysqli, $sql2); $row2 = mysqli_fetch_assoc ($result2);
					$scbook2 = $row2['available']; if ($scbook2==1){echo "Available";} else{echo "Not available.";} ?> 
				</td>
			  </tr>
		</table>
	</div>
	<div  class="sctextalign" id="formtext">
		<input type="submit" name="formsubmit" id="button" id="buttonleft" value="Submit"/><br><br>
	</div>
	</form>
	
</body>
</html>