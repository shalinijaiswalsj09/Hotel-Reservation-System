<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <title>admin</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
    <link rel="stylesheet" href="css/booking1.css" type="text/css" media="all">
    <script src="js/bookingval.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <!--    <script src="jquery.js"></script>-->
</head>
<body id="page1">
<div class="body1">
    <div class="main">
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            function getState(val) {
//                $(document).ready(function () {
//                    $('#category').change(function () {
//                        var Category = $(this).val();
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data:'cat='+val,
                            success: function (data) {
                                $('#occupancy').html(data);
                            }

                        });
            }
        </script>
        <?php
        if(isset($_POST['submit'])) {

            $ci = $_POST['Checkin'];
            $co = $_POST['Checkout'];
            $date1 = date_create("$ci");
            $date2 = date_create("$co");
            $diff = date_diff($date1, $date2);
//    echo $diff->format("%R%a");
            $d = $diff->format("%R%a");
//    echo "$d";
            if ($d < 0) {
                echo("<script>alert('Enter Correct Date')</script>");

                echo("<script>window.location = 'index.php';</script>");

//                ?>
<!--                <script type="text/javascript">alert("Enter Correct Date");-->
<!--                </script>-->
<?php
            } else {
                $_SESSION['Checkin'] = $_POST['Checkin'];
                $_SESSION['Checkout'] = $_POST['Checkout'];
                $_SESSION['rooms'] = $_POST['rooms'];
                $_SESSION['Adults'] = $_POST['Adults'];
                $_SESSION['Child1'] = $_POST['Child1'];
                $_SESSION['Child2'] = $_POST['Child2'];
                $_SESSION['Message'] = $_POST['Message'];
            }
        }
        ?>
        <form action="fullinfo.php" method="post" name="book" onsubmit="return as(this);">
        <div style="float: left; border:inherit; width: 25%">
            <div align="center" class="merg" style="background-color: black;color: white; font-size: 20px;margin-top: 20px;"><strong>YOUR SELECTION</strong></div>
            <div class="merg">Arrival <sup>*</sup>:<?php echo $_SESSION['Checkin'];?></div></br>
            <div class="merg">Departure <sup>*</sup>:<?php echo $_SESSION['Checkout'];?> </div></br>
            <div class="merg">No. of Rooms:<?php echo $_SESSION['rooms'];?></div></br>
            <div class="merg">Adults:<?php echo $_SESSION['Adults'];?></div></br>
            <div class="merg">Child (upto 5 Age):<?php echo $_SESSION['Child1'];?></div></br>
            <div class="merg">Child (6 to 15 Age):<?php echo $_SESSION['Child2'];?></div></br></br><br>
        </div>
            <div style="color: black;font-size: 20px;float: left; width:65%;margin-left: 100px;">
                <center><div style="font-size: 22px;font-family: Lucida Bright"><b>Select Your Choice</b></div></center>
                    <div class="merg" style="margin:80px 20px 0 70px;">Types of Room :
                        <select name="roomtype" id="category" style="margin-left: 50px; width:300px; height: 25px;" onchange="getState(this.value)" >
<!--                        <option value="">Select Category</option>-->
                                <?php
                                include "connection.php";
                                $r= mysqli_query($c,"SELECT `Id`, `category` FROM `category`");
                                while($row = mysqli_fetch_array($r)) {
                                    echo "<option value='".$row['Id']."'>".$row['category']."</option>";
                                }
                                ?>
                        </select>
                    </div></br></br></br><br>
                    <div class="merg" style="margin:0 20px 20px 70px;" >Occupancy :
                        <select name="occupancy" id="occupancy" style="margin-left: 80px; width:300px; height: 25px;">
                            <option value="">Select occupancy</option>
<!--                            --><?php
//                            include "connection.php";
//                            $r= mysqli_query($c,"SELECT `Id`, `occupancy` FROM `occupancy`");
//                            while($row = mysqli_fetch_array($r)) {
//                                echo "<option value='".$row['occupancy']."'>".$row['occupancy']."</option>";
//                            }
//                            ?>
                        </select>
                    </div></br></br></br>
                    <input type="submit" name="next" value="NEXT" style="margin:0 20px 50px 200px; width: 200px;border: inset;height: 30px;" />
                </div>
                <?php
                    $con = mysqli_connect("localhost", "root", "");
                    if (!$con)
                    {
                        die('Could not connect: ' . mysqli_error());
                    }
                mysqli_select_db($con,"hrs");
                $result = mysqli_query($con,"SELECT * FROM category");
                ?>
           <marquee behavior="alternate">
               <div style="width:1660px;">
                   <?php
                   while ($row = mysqli_fetch_array($result)) {
                       echo '<div style="width: 260px;margin-left: 10px;float: left;">';
                       echo "<img style:'height:200px;width:280px;' alt='Unable to View' src='" . $row["Pic"] . "'>";
                       //echo $row['category'];
                       //echo "<a href=''><img  alt='Unable to View'height='24px' width='90px' style='margin: 10px 0 10px 0' src=' images/book.png '></a>";
                       echo '</div>';
                   }
                   mysqli_close($con);
                   ?></div>
           </marquee>
        </form>
    </div>
</body>
</html>
