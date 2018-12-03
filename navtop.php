<!DOCTYPE html>

<html>
	<head>
		<link href="base.css" type="text/css" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css?family=Cinzel|Gloria+Hallelujah|Pacifico" rel="stylesheet">
		<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script>
		$(function(){
			$('a').each(function(){
				if ($(this).prop('href') == window.location.href) {
					$(this).addClass('active'); $(this).parents('nav a').addClass('active');
				}
			});
		});
		</script>
	</head>
	
	<body>
		<div class="navaligntop">
		<div class="nav">				
			<a href="login2.php">Login</a>
			<a href="home.php">Home</a>
			<a href="shoppingcart.php" >Shopping Cart</a>
			<a href="logout2.php">Logout</a>
		</div>
		</div>
	</body>
</html>