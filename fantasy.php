<!DOCTYPE html>
<html>
<?php require_once "header2.php"; ?> 
<head> <link rel="stylesheet" type="text/css" href= "base.css">
<title>Fantasy</title>

<body>
	<h1>Fantasy</h1>
	
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
    <td><input type="checkbox"></td>
    <td>The best Book</td> 
    <td class="colpicalign"><img src="bookpics/book1.jpg" alt="Best Book Cover"/></td>
  </tr>
  <tr>
    <td><input type="checkbox"></td>
    <td>The second best Book</td> 
    <td class="colpicalign"><img src="bookpics/book2.jpg" alt="Second Best Book Cover"/></td>
  </tr>
</table>
</div>

	</div>
			<div  class="sctextalign" id="formtext">
				<a href="categorychoice.php" id="button" id="buttonleft">Return to Categories</a>  <a href="shoppingcart.php" id="button" id="buttonleft">Submit Choice(s)</a>
		</div>
		
</body>
</html>