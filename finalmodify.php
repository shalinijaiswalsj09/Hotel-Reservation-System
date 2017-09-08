<?php
session_start();
include "connection.php";
if(isset($_GET["data109"]))
{
    $w=$_GET["data109"];
$su = mysqli_query($c, "SELECT * FROM booking where Id=$w");
$rw = mysqli_fetch_array($su);
    $nr = $rw['Rooms'];
    $rt = $rw['roomtype'];
    $o = $rw['occupancy'];
?>
<html>
<head>
    <title>
        User Login
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="admin/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="admin/css/style.css" type="text/css" media="all">
</head>
<!--<body style="background-image: url(slidea.jpg);width:100%;" >-->
<body id="page1">
<div class="body1">
    <div class="main">
        <!-- header -->
        <header>
            <h1><a href="index.php" id="logo"></a></h1>
            <div class="wrapper" >
                <ul id="icons" >
                    <li><a href="userlogin.php" class="normaltip"><img src="images/login1.jpg" ></a></li>&nbsp;&nbsp;&nbsp;
                    <li><a href="contactus.php" style="font-size: 20px; text-decoration: none;"><img src="images/message.png"></a></li>
                </ul>
            </div>
        </header>
    </div>
</div>

<div style="height: 50px;"></div>
<div align="center" style="font-family: 'Lucida Bright';color: black;">
    <form action="index.php" method="post" name="form">
        <center><div style="font-size: 40px; font-family: 'Lucida Bright';margin-top: 60px; ">Welcome to Lounge Hotel</div>
            <center><div style="font-size: 40px; font-family: 'Lucida Bright';margin-top: 60px; ">THANK YOU</div>
                <div style="font-size: 30px; font-family: 'Lucida Bright';margin-top:30px; color: blue;" ><?php echo $rw['name'];?></div>
                <div style="font-size: 15px; font-family: 'Lucida Bright';margin-top: 25px; ">For choosing our Hotel as your first choice</div>
                <div style="font-size: 20px; font-family: 'Lucida Bright';margin-top: 25px; color: red ">Password: <?php echo $rw['password'];   ?> </div>
                <div style="font-size: 15px; font-family: 'Lucida Bright';margin-top: 25px; color: red ">(Use to Modify your Choices)</div>

<?php
$s = mysqli_query($c, "SELECT * FROM booking where Id=$w");
$rwe = mysqli_fetch_array($s);
$nr = $rwe['Rooms'];
$rt = $rwe['roomtype'];
$o = $rwe['occupancy'];
$d=$rwe['Adults'];
$z=$rwe['Child1'];
$v=$rwe['Child2'];
$as=mysqli_query($c,"SELECT Rate FROM `rooms` WHERE Category='$rt' and Occupancy='$o'");
$x = mysqli_fetch_array($as);
$tp=(($nr*$x['Rate'])+(1000*$d)+(500*$v)+(250*$z)+(0.10*$x['Rate']));
             ?>
                <div style="font-size: 20px; font-family: 'Lucida Bright';margin-top: 25px; ">Total Price: <?php echo $tp;    ?></div>
                <div style="font-size: 20px; font-family: 'Lucida Bright';margin-top: 25px; "><input type="submit" name="more" value="Choose More Room" </div>
            </center>
    </form>
</div>
</body>
</html>
<?php
}
    ?>