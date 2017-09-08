<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
	<title>Your trip</title>
	<?php
	include 'head.php';
	?>
	<link rel="stylesheet" href="css/touchTouch.css">
	<script src="js/touchTouch.jquery.js"></script>
	<script>
	$(function () {
	$('.gallery a.gal').touchTouch();
	});</script>
</head>
<body class="page1" id="top">

<!--==============================header=================================-->
		<header>
			<?php
			include 'header.php';
			?>
		</header>
<?php
include 'slider.php';
?>
<!--==============================Content=================================-->
<div class="main">
	<div class="content">
		<div class="container_12">
			<div class="grid_12">
				<h3>Our Gallery</h3>
			</div>
			<div class="clear"></div>
			<div class="gallery">
				<div class="grid_4"> <a href="images/big6.jpg" class="gal img_inner"><img src="images/small6.jpg" height="196" width="310" alt=""></a> </div>
				<div class="grid_4"> <a href="images/big2.jpg" class="gal img_inner"><img src="images/small2.jpg" height="196" width="310" alt=""></a> </div>
				<div class="grid_4"> <a href="images/rece.jpg" class="gal img_inner"><img src="images/small3.jpg" height="196" width="310" alt=""></a> </div>
				<div class="clear"></div>
				<div class="grid_4"> <a href="images/big4.jpg" class="gal img_inner"><img src="images/small4.jpg" height="196" width="310" alt=""></a> </div>
				<div class="grid_4"> <a href="images/cook.jpg" class="gal img_inner"><img src="images/small5.jpg" height="196" width="310" alt=""></a> </div>
				<div class="grid_4"> <a href="images/big1.jpg" class="gal img_inner"><img src="images/small1.jpg" height="196" width="310" alt=""></a> </div>
			<div class="clear"></div>
				<div class="grid_4"> <a href="images/ho8.jpg" class="gal img_inner"><img src="images/small7.jpg" height="196" width="310" alt=""></a> </div>
				<div class="grid_4"> <a href="images/big8.jpg" class="gal img_inner"><img src="images/small8.jpg" height="196" width="310" alt=""></a> </div>
				<div class="grid_4"> <a href="images/big9.jpeg" class="gal img_inner"><img src="images/small9.jpeg" height="196" width="310" alt=""></a> </div>

			</div>
			<div class="clear"></div>
		</div>
	</div>

</div>
<!--==============================footer=================================-->
<?php
include 'footer.php';
?>
	</body>
</html>