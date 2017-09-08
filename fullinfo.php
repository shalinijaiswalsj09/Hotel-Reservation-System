<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/booking1.css" type="text/css" media="all">
    <script src="js/bookingvalidation4.js"></script>
</head>
<body id="page1">
    <div class="body1">
        <div class="main">
        <!-- header -->
            <header>
                <h1><a href="../index.php" id="logo"></a></h1>
                <div class="wrapper" >
                <ul id="icons" >
                    <li><a href="userlogin.php" class="normaltip" title="Modify/Cancel"><img src="images/login1.jpg" ></a></li>
                    <li><a href="contactus.php" title="Contact Us" style="font-size: 20px; text-decoration: none;"><img src="images/message.png"></a></li>
                </ul>
                </div>
            </header>
        </div>
    </div>
        <div class="main">
<!--            --><?php
//            include 'connection.php';
//            $m=mysqli_query($c,"SELECT category FROM `category` WHERE Id='" . $_POST["roomtype"] . "'");
//            $df=mysqli_fetch_array($m);
//            $rt =$df['category'];
//            $nr = $_SESSION['rooms'];
////            $rt = $_SESSION['roomtype'];
//            $o = $_SESSION['occupancy'];
//            $d=$_SESSION['Adults'];
//            $z=$_SESSION['Child1'];
//            $v=$_SESSION['Child2'];
//            $as=mysqli_query($c,"SELECT Rate FROM `rooms` WHERE Category='$rt' and Occupancy='$o'");
//            $x = mysqli_fetch_array($as);
//            $c=$x['Rate'];
//            $tp=(($nr*$c)+(1000*$d)+(500*$v)+(250*$z)+(0.10*$c));
//            ?>
        <?php
        include "connection.php";
        $category="";
        $occupancy="";
        if($_POST['next'])
        {
            include "connection.php";
        $m=mysqli_query($c,"SELECT category FROM `category` WHERE Id='" . $_POST["roomtype"] . "'");
            $df=mysqli_fetch_array($m);
            $rt =$df['category'];
            $nr = $_SESSION['rooms'];
//            $rt = $_SESSION['roomtype'];
            $o = $_SESSION['occupancy'];
            $d=$_SESSION['Adults'];
            $z=$_SESSION['Child1'];
            $v=$_SESSION['Child2'];
            $as=mysqli_query($c,"SELECT Rate FROM `rooms` WHERE Category='$rt' and Occupancy='$o'");
            $x = mysqli_fetch_array($as);
            $c=$x['Rate'];
            $tp=(($nr*$c)+(1000*$d)+(500*$v)+(250*$z)+(0.10*$c));
           
        $_SESSION['category'] =$df['category'];
        $_SESSION['occupancy'] = $_POST['occupancy'];
        }
        if($_POST['save'])
        {
            $ci = $_SESSION['Checkin'];
            $co = $_SESSION['Checkout'];
            $nr = $_SESSION['rooms'];
            $na = $_SESSION['Adults'];
            $nc = $_SESSION['Child1'];
            $zc = $_SESSION['Child2'];
            $rt = $_SESSION['category'];
            $o = $_SESSION['occupancy'];
           $_SESSION['name']= $n = $_POST['name'];
            $mob = $_POST['mobile'];
            $em = $_POST['email'];
            $_SESSION['password']=$pass = $_POST['password'];
            $str = $_POST['street'];
            $pc=$_POST['pin'];
            $cit = $_POST['city'];
            $cou = $_POST['country'];
            $me = $_SESSION['Message'];
            $q="INSERT INTO `booking`( `Checkin`, `Checkout`,`Rooms`, `Adults`, `Child1`, `Child2`, `roomtype`, `occupancy`, `name`, `mobile`,`email`,`password`,`Street`, `pin`, `city`, `country`,
            `Charge`,`Message`) VALUES ('$ci','$co','$nr','$na','$nc','$zc','$rt','$o','$n',$mob,'$em','$pass','$str','$pc','$cit','$cou','$tp','$me')";
            if (mysqli_query($c, $q)) {
                header("location:final.php?data6=booked");
            }
        else {

            echo '<script>alert("Details Not Saved!")</script>';

        }
        }
        ?>
            <form name="fullinfo" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" onsubmit="return full(this)">
            <div style="float: left; font-size: 20px; border:inherit; width: 25%">
                <div align="center" class="merg" style="background-color: black;color: white; font-size: 22px;margin-top: 20px;">
                <strong>YOUR SELECTION</strong>
                </div></br>
                <div class="merg">Arrival<sup>*</sup>:<?php echo $_SESSION['Checkin'];?></div></br>
                <div class="merg">Departure<sup>*</sup>:<?php echo $_SESSION['Checkout'];?></div></br>
                <div class="merg">No. of Rooms:<?php echo $_SESSION['rooms'];?></div></br>
                <div class="merg">Adults:<?php echo $_SESSION['Adults'];?></div></br>
                <div class="merg">Child(upto 5 Age):<?php echo $_SESSION['Child1'];?></div></br>
                <div class="merg">Child(6 to 12 Age):<?php echo $_SESSION['Child2'];?></div></br>
                <div class="merg">Room Type:<?php echo $_SESSION['category'];?></div></br>
                <div class="merg">Occupancy:<?php echo $_SESSION['occupancy'];?></div></br>
                <div class="merg">Total Charges:<?php echo $tp;?></div></br><br>
            </div>
            <div style="color: black;font-size: 20px;float: left; width:65%;margin-left: 100px;"></br>
               <center> <p  style="font-size: 22px;font-family: 'Lucida Bright'"><strong>GUEST PERSONAL DETAIL :</strong></p></center>
                <div style="margin:7px 20px 8px 70px; font-family: 'Lucida Bright'">First Name :</div><input type="text" name="name" style="margin-left: 70px; width:550px; height: 22px;" />
                <div style="margin:7px 20px 8px 70px; font-family: 'Lucida Bright';">Mobile No. :</div><input style="margin-left: 70px;width:550px;height: 22px;" type="text" name="mobile"/>
                <div style="font-family: 'Lucida Bright';margin:7px 20px 8px 70px;  ">Email :</div><input style="margin-left: 70px;width:550px;height: 22px;" type="email" name="email"/>
                <div style="font-family: 'Lucida Bright';margin:7px 20px 8px 70px;  ">Password :</div><input style="margin-left: 70px;width:550px;height: 22px;" type="password" name="password"/>
                <div style="font-family: 'Lucida Bright';margin:7px 20px 8px 70px; ">Street :</div><input style="margin-left: 70px;width:550px;height: 22px;" type="text" name="street"/>
                <div style="margin:7px 20px 8px 70px;font-family: 'Lucida Bright' ">Pin Code :</div><input style="margin-left: 70px;width:550px;height: 22px;" type="text" name="pin"/>
                <div style="font-family: 'Lucida Bright';margin:7px 20px 8px 70px; ">City :</div><input style="margin-left: 70px;width:550px;height: 22px;" type="text" name="city"/>
                <div style="font-family: 'Lucida Bright';margin:7px 20px 8px 70px; ">Country :</div><input style="  margin-left: 70px;width:550px;height: 22px;" type="text" name="country"/>
                <center>   <div style="font-family: 'Lucida Bright';margin:50px 20px 8px 70px; "><input style="width:200px;height: 30px; font-size: 25px;border-style: inset;" type="submit" name="save" value="SAVE"/></div></center>
        </div>
            </form>
        </div>
</body>
</html>
