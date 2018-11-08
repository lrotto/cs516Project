<!DOCTYPE html>
<html>
<?php require_once "header2.php"; ?> 
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>ShoppingCart</title>

<body>
	<h1>Books in Cart:</h1>
	
		<div  class="cartalign" id="formtext">
			<form>
				<span class="highlightme">
				1.&nbsp<input type="text" name="cart" value=""><input type="submit" name="Submit" value="Remove"/><br>
				2.&nbsp<input type="text" name="cart" value=""><input type="submit" name="Submit" value="Remove"/><br>
				3.&nbsp<input type="text" name="cart" value=""><input type="submit" name="Submit" value="Remove"/><br><br><br>
				</span>
			</form>
		</div>
		<div  class="sctextalign" id="formtext">
				<span class="highlightme">
				Choose the date you will pick up the book(s): 
				</span>
				<?php require_once "datedd.php"; ?> <br>
				<a href="categorychoice.php" id="button" id="buttonleft">Return to Categories</a>
				<a href="thankyou.php" id="button" id="buttonleft">Complete Request</a><br><br>
				<span class="highlightme">
					Books will be ready on the day they are needed.  Please call to confirm pick-up time.
				</span>
		</div>

</body>
</html>