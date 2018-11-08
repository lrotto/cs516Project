<!DOCTYPE html>
<html>
<?php require_once "header2.php"; ?> 
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>Religion</title>

<body>

<?php
	$bookid=$bookname=$bookcoverpic=$catid=$available=$noselectionerr=$selectiondir="";
	$datereq="";

	ob_start();
	// define variables and set to empty values
	$host="localhost"; // Host name 
	$sqlusername="root"; // Mysql username 
	$sqlpassword=""; // Mysql password 
	$db_name="cs516projectdb"; // Database name 
	$tbl_name=""; // Table name
	$results = "";
	$bookar[]= "";

	// Connect to server and select databse.
	$conn=mysqli_connect($host, $sqlusername, $sqlpassword, $db_name);
	if ($conn->connect_error) {
		die("Connection failed with the following error:" . $conn->connect_error);
	}
	mysqli_select_db($conn, $db_name) or die(mysql_error());
	

	$_SESSION['bookid'] = $bookid;
	$_SESSION['bookname'] = $bookname;
	$_SESSION['bookcoverpic'] = $bookcoverpic;
	$_SESSION['catid'] = $catid;
	$_SESSION['available'] = $available;
	$_SESSION['datereq'] = $datereq;
	$sql2="SELECT * FROM shoppingcart";
	$result2=mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ((isset($_POST['formsubmit'])) && (!empty($_POST['check_list']))){
			$bookar = $_POST['check_list'];
			$N = COUNT($bookar);
			if($N>0) {
				foreach($_POST['check_list'] as $selected){
					$ckval = $selected;
					for ($i=0; $i < $N; $i++){
						$sql="SELECT  * FROM booklist where bookid=($ckval)";
						$result=mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc ($result);
						if ($ckval == $row['bookid']){
							$sql3="UPDATE booklist SET available=0 where bookid=$ckval";
							mysqli_query($conn, $sql3);
							$noselectionerr = "";
							$selectiondir = "You have selected: '". $row['bookname']."'.  Please use the navigation bar at the top of the screen to return to the Categories menu or go to the Shopping Cart and check out.";
						}
					}
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
	<div  class="sctextalign" id="formtext">
		<span class="error"> <?php echo $noselectionerr.$selectiondir;?><br><br></span>
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
			  </tr>
			  <tr>
				<td><input type="checkbox" name = "check_list[0]" value = 3></td>
				<td>The World Without Us</td> 
				<td class="colpicalign"><img src="bookpics/world-w-out-us.jpg" alt="World Without Us"/></td>
			  </tr>

			  <tr>
				<td><input type="checkbox" name = "check_list[1]" value = 4></td>
			   <td>Make Today Matter</td> 
				<td class="colpicalign"><img src="bookpics/maketodaymatter.jpg" alt="Make Today Matter"/></td>
			  </tr>
		</table>
	</div>
	<div  class="sctextalign" id="formtext">
		<input type="submit" name="formsubmit" id="button" id="buttonleft" value="Submit"/>
	</div>
	</form>
	
</body>
</html>