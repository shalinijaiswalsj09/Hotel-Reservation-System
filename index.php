<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Your trip</title>
		<?php
		include 'head.php';
		?>
        <link type="text/css" href="cal_style.css" rel="stylesheet" />
		<script src="js/bookingvalidation1.js"></script>
<!--        <script>-->
<!--            $('#signin').click(function(){-->
<!--                $('#InputUserName').focus(function(){-->
<!--                    $(this).css({'border': '2px solid #FF0000'});-->
<!--                });-->
<!--</script>-->
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
        <div class="content">
			<div class="container_12">
				<div class="grid_4">
					<div class="banner">
						<img src="images/big2.jpg" alt="" height="200px">
						<div class="label">
							<div class="title">ROOMS</div>
							<a href="room.php">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/ho5.jpg" alt="" height="200px">
						<div class="label">
							<div class="title">BOOKING</div>
							<a href="#signin">BOOK NOW</a>
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="banner">
						<img src="images/r1.jpg" alt="" height="200px">
						<div class="label">
							<div class="title">RESTAURANT</div>
							<a href="restaurant.php">READ MORE</a>
						</div>
					</div>
				</div>
				<div class="clear"></div>
				<div class="grid_6">
					<h3>Booking Form</h3>
					<form id="bookingForm" action="booking1.php" name="fi" method="post" onsubmit="return aws(this);">
						<div class="clear"></div>
						<div  style= "float:left;" id="InputUserName">Check-in</div>
				        <div style="float:left; margin-left:42px;">
                         <?php
                         include "my_calender.php";
                         ?>
                         <input type="text" name="Checkin" placeholder="yyyy/mm/dd" onclick="ds_sh(this);" id="txtBirthDate"  style="height:30px; width:333px;"/>
                        </div>
						<div class="clear"></div>
                        </br>
						<div style="float:left;" >Check-out</div>
                        <div style= "float:left; margin-left:33px;">
							<input type="text" name="Checkout" placeholder="yyyy/mm/dd" onclick="ds_sh(this);" id="txtBirthDate" style="height:30px; width:333px;"  />
						</div></br>
                        <div style="float:left; margin-top: 15px;">No. of Rooms</div>
                        <div style= "float:left; margin-left:10px; margin-top: 15px;">
                            <input type="text" name="rooms" style="height:30px; width:333px;"  />
                        </div></br>
                        <div style="float:left; margin-top: 15px;">Adults</div>
                        <div style= "float:left; margin-left:58px; margin-top: 15px;">
                            <input type="text" name="Adults"  placeholder="Age 15+" style="height:30px; width:333px;"  />
                        </div></br>
                        <div style="float:left; margin-top: 15px;">Child</div>
                        <div style= "float:left; margin-left:64px;margin-top: 15px;">
                            <input type="text" name="Child1" placeholder="0 to 5 Age" style="height:30px; width:333px;"  />
                        </div></br>
                        <div style="margin-top: 15px;float:left;">Child </div>
                        <div style= "margin-top: 15px;float:left; margin-left:65px;">
                            <input type="text" name="Child2" placeholder="6 to 15 Age" style="height:30px; width:333px;"  />
                        </div></br>
						<div class="clear"></div>
						<div class="tmTextarea">
							<textarea name="Message" placeHolder="Message" data-constraints='@NotEmpty @Required @Length(min=20,max=999999)'></textarea>
						</div>
						<input type="submit" name="submit" value="NEXT" style="width:100px; border-color:#000" /><br>
						<a href="userlogin.php" data-type="submit"><b>Modify&nbsp;/Cancel Booking</b></a>
					</form>
				</div>
				<div class="grid_5 prefix_1">
					<h3>Welcome</h3>
					<img src="images/ho8.jpg" alt="" class="img_inner fleft" height="110px">
					<div class="extra_wrapper">
						<p>Come alone or bring your family with you, stay here for a night or for weeks, stay here while on business trip or at some kind of conference - either way our hotel is the best possible variant.</p>
					</div>
					<div class="clear cl1"></div>
					<p>Feel free to contact us anytime in case you have any questions or concerns.</p>
					<h4>Clients’ Quotes</h4>
					<blockquote class="bq1">
						<img src="images/photo-2.jpg" alt="" height="100px" class="img_inner noresize fleft">
						<div class="extra_wrapper">
							<p>
								Food & service was good.
								we went to this hotel for our business visit to baroda unit....

								food was good specially for UK team members, who like less spicy and oily food.
								it was kind of according to international standard.....and the location of the hotel is good...
							</p>
							<div class="alright">
								<div class="col1">Dishan Bansal</div>
							</div>
						</div>
					</blockquote>
				</div>
				<div class="grid_12">
					<h3 class="head1">Latest News</h3>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01">10<span>Jan</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Aliquam nibh</a></div>
							Proin pharetra luctus diam, any scelerisque eros convallisumsan. Maecenas vehicula egestas
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01">21<span>Jan</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">Etiam dui eros</a></div>
							Any scelerisque eros vallisumsan. Maecenas vehicula egestas natis. Duis massa elit, auctor non
						</div>
					</div>
				</div>
				<div class="grid_4">
					<div class="block1">
						<time datetime="2014-01-01">15<span>Feb</span></time>
						<div class="extra_wrapper">
							<div class="text1 col1"><a href="#">uamnibh Edeto</a></div>
							Ros convallisumsan. Maecenas vehicula egestas venenatis. Duis massa elit, auctor non
						</div>
					</div>
				</div>
			</div>
        </div>
<!--==============================footer=================================-->
<?php
include 'footer.php';
?>
	</body>
</html>

