<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Contacts</title>
		<?php
		include 'head.php';
		?>
		<link rel="stylesheet" href="css/form.css">
	</head>
	<body class="page1" id="top" >
<!--==============================header=================================-->
		<header>
			<?php
			include 'header.php';
			?>
		</header>
<!--==============================Content=================================-->
<img src="images/slidec.jpg" >
<?php
include('connection.php');
if(isset($_POST['send']))
{
		$n = $_POST['name'];
		$em = $_POST['email'];
		$mob = $_POST['mobile'];
		$me = $_POST['message'];

		//check user if already exists
		$q = "SELECT Mobile FROM `mail` WHERE Mobile=$mob";
//		echo $q;
//		die();
		$cq = mysqli_query($c,$q);
		$ret = mysqli_num_rows($cq);

		if($ret > 0)
		{
			echo "<center><h3 style='color:red;'>You Already Send A Message!</h3></center>";
		}
//insert into database
		else {
			$query = "INSERT INTO `mail`( `Name`, `Email`, `Mobile`, `Message`) VALUES ('$n','$em',$mob,'$me')";
//			echo $query;
//			die();

			if (mysqli_query($c,$query)) {


				echo "<center><h3 style='color:green'>Message Send!</h1></center>";
			}
		}
	}
//	else
//	{
//
//		echo '<script>alert("Wrong Verification Code, try again!")</script>';
//
//	}
?>
		<div class="content">
			<div class="container_12">
				<div class="grid_5">
					<h3>CONTACT INFO</h3>
					<div class="map">
						<p>Our hotel is located in the most spectacular part of India - surrounded by boutiques, restaurants and luxurious shops.</p>
						<p>Please feel free to come visit us at the following address:</p>
						<div class="clear"></div>
						<figure class="">
							<iframe width="100%" height="600" src="http://www.maps.ie/create-google-map/map.php?width=100%&amp;height=310&amp;hl=en&amp;
						q=%20MG Road%2C%20Sampangi Rama Nagar%2C%20Bangalore%2C%20India+(Lounge%20Hotel)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=A&amp;output=embed" frameborder="0"
									scrolling="no" marginheight="0" marginwidth="0"><a href="http://www.mapsdirections.info/ru/Создать-Google-Карту/">
									Код для вставки Google Map</a> от <a href="http://www.mapsdirections.info/ru/">Рассчитать маршрут</a></iframe>
						</figure>
						<address>
							<dl>
								<dt>Lounge Hotel<br>
									37-39 M.G Road,Sampangi Rama Nagar<br>
									560001 Bangalore,Karnataka ,India.
								</dt>
								<dd><span>Freephone:</span>+1 800 559 6580</dd>
								<dd><span>Telephone:</span>+1 800 603 6035</dd>
								<dd><span>FAX:</span>+1 800 889 9898</dd>
								<dd>E-mail: <a href="#" class="col1">yourtrip@gmail.com</a></dd>
							</dl>
						</address>
					</div>
				</div>
				<div class="grid_6 prefix_1">
					<h3>GET IN TOUCH</h3>
					<form id="form" name="fi" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post">
<!--						<div class="success_wrapper">-->
<!--							<div class="success-message">Contact form submitted</div>-->
<!--						</div>-->
						<label class="name">
							<input type="text" name="name" autocomplete="off" placeholder="Name:" data-constraints="@Required @JustLetters" />
<!--							<span class="empty-message">*This field is required.</span>-->
<!--							<span class="error-message">*This is not a valid name.</span>-->
						</label>
						<label class="email">
							<input type="text" name="email" autocomplete="off" placeholder="Email:" data-constraints="@Required @Email" />
<!--							<span class="empty-message">*This field is required.</span>-->
<!--							<span class="error-message">*This is not a valid email.</span>-->
						</label>
						<label class="mobile">
							<input type="text" name="mobile" autocomplete="off" placeholder="Mobile:" data-constraints="@Required @JustLetters"/>
<!--							<span class="empty-message">*This field is required.</span>-->
<!--							<span class="error-message">*This is not a valid phone.</span>-->
						</label>
						<label class="message">
							<textarea name="message" placeholder="Message:" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
<!--							<span class="empty-message">*This field is required.</span>-->
<!--							<span class="error-message">*The message is too short.</span>-->
						</label>
						<div>
							<div class="clear"></div>
							<div class="btns">
<!--								<a type="reset" class="btn">Clear</a>-->
<!--						<a href="#" data-type="submit" class="btn" name="send">Submit</a>-->
								<input type="submit" name="send" value="SEND" style="width: 100px; margin-left:360px; color: blue; " />

							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
<!--==============================footer=================================-->
<?php
include 'footer.php';
?>
	</body>
</html>