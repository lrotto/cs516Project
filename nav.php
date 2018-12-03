<!DOCTYPE html>

<html class="bg">
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
		<div class="navalign">
		<div class="nav">
		<a href="about.php" >About Linda</a>
		<a href="contact.php" >Contact</a>
		<a href="copyright.php" >&copyCopyright</a>
		</div>
		</div>
		<div class="navalign2">
		<img src="images/logo.jpg" alt="Otto Logo" class="right-header"> <br><br>
		</div>
	</body>
</html>
