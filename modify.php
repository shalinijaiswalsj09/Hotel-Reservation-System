<?php
session_start();
if(isset($_POST["save1"]))
{
    include 'connection.php';
//    $Id="";
//    $Id=$_SESSION['Id'];
//    echo $Id;
//    die();
//    $s = mysqli_query($c, "SELECT * FROM booking where Id=$Id");
//    $rwe = mysqli_fetch_array($s);
//    include "connection.php";
    $m=mysqli_query($c,"SELECT category FROM `category` WHERE Id='" . $_POST["roomtype"] . "'");
    $df=mysqli_fetch_array($m);
    $rt =$df['category'];
    $nr = $_POST['rooms'];
//    $rt = $_POST['roomtype'];
    $o = $_POST['occupancy'];
    $d=$_POST['adult'];
    $z=$_POST['child1'];
    $v=$_POST['child2'];
    $as=mysqli_query($c,"SELECT Rate FROM `rooms` WHERE Category='$rt' and Occupancy='$o'");
    $x = mysqli_fetch_array($as);
    $tp=(($nr*$x['Rate'])+(1000*$d)+(500*$v)+(250*$z)+(0.10*$x['Rate']));

    include "connection.php";
//    $file=$_FILES["file"]["name"];
    extract($_POST);
    $sl = "UPDATE `booking` SET `Checkin`='$Checkin',`Checkout`='$Checkout',`roomtype`='$rt',`occupancy`='$occupancy',`Adults`='$adult',`Child1`='$child1',
`Child2`='$child2',`Charge`='$tp' 
    WHERE Id=$Id";
    if(mysqli_query($c,$sl))
    {
        header("location:finalmodify.php?data109=$Id");
    }
}
if(isset($_GET["qp"]))
{
    include "connection.php";
    $w = $_GET["qp"];
    $su = mysqli_query($c, "SELECT * FROM booking where Id=$w");
    $rw = mysqli_fetch_array($su);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>admin</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
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
    </head>
    <body id="page1">
    <div class="body1">
        <div class="main">
            <!-- header -->
            <header>
                <h1><a href="../index.php" id="logo"></a></h1>
                <div class="wrapper">
                    <ul id="icons">
                        <li><a href="userlogin.php" class="normaltip"><img src="images/login1.jpg"></a></li>
                        <li><a href="contactus.php" style="font-size: 20px; text-decoration: none;"><img
                                        src="images/message.png"></a></li>
                        <li><a href="userlogout.php" class="normaltip"><img src="images/log1.jpg" alt=""></a></li>
                        <li><a href="userlogout.php" style="font-size: 20px; text-decoration: none;">Logout</a></li>
                    </ul>
                </div>
                <nav>
                    <ul id="menu">
<!--                        <li><a href="delbook.php?delid={$row['Id']}"-->
<!--                               onclick="return confirm('Do you really want to delete this?')">DELETE</a></li>-->
                        <?php echo "<li><a href='delbook.php?delid={$rw['Id']}' onclick=\"return confirm('Do you really want to delete this?')\">Cancel Booking</a></li>";?>
                        <?php echo "<li><a href='changepass.php?chpass={$rw['Id']}'>Change Password</a></li>";?>
<!--                        <li class="end"><a href="changepass.php?chpass={$rw['Id']}'">Change Password</a></li>-->
                    </ul>
                </nav>
            </header>
        </div>
    </div>
<!--    --><?php
//    if(isset($_POST['save1'])) {
//        $n = $_POST['name'];
//        $mob = $_POST['mobile'];
//        $em = $_POST['email'];
//        $str = $_POST['street'];
//        $cit = $_POST['city'];
//        $cou = $_POST['country'];
////    $sc = ($_FILES['file']['name']);
//        $ci = $_POST['Checkin'];
//        $co = $_POST['Checkout'];
//        $rt = $_POST['roomtype'];
//        $o = $_POST['occupancy'];
//        $na = $_POST['adult'];
//        $nc = $_POST['child1'];
//        $zc = $_POST['child2'];
//        $query = "INSERT INTO `booking` (`Checkin`, `Checkout`, `roomtype`, `occupancy`,`Adults`, `Child1`, `Child2`) values  ('$ci','$co','$rt','$o','$na','$nc','$zc')";
////                    echo $query;
////                    die();
//        if (mysqli_query($c, $query)) {
//
//
//            echo "<center><h3 style='color:green'>Details Saved!</h1></center>";
//        }
//    }
//    ?>
    <div style="border-style: double;font-family: 'Lucida Bright';font-size: 20px;color: black;margin-top: 15px; margin-left: 200px; float: left;">
        <form name="for" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" >
            <input type="hidden" name="Id" value="<?php echo $rw["Id"];  ?>" />
            <div>Arrival:</div>
            <div>
                <?php
                include "my_calender.php";
                ?>

                <input type="text" name="Checkin" onclick="ds_sh(this);" id="txtBirthDate" autocomplete="off" value="<?php echo $rw["Checkin"];  ?>"
                       style="width: 500px;height: 25px;"/>
            </div>
            </br>
            <div>Departure:</div>
            <div>
                <input type="text" name="Checkout" onclick="ds_sh(this);" id="txtBirthDate" autocomplete="off" value="<?php echo $rw["Checkout"];  ?>"
                       style="width: 500px;height: 25px;"/>
            </div>
            </br>
            <div>Types of Room:</div>
            <div>
                <select name="roomtype" id="category"  style="width: 500px;height: 28px;" onchange="getState(this.value)">
                    <?php
                    echo "<option >".$rw['roomtype']."</option>";
                    include "connection.php";
                    $r = mysqli_query($c, "SELECT `Id`, `category` FROM `category`");
                    while ($row = mysqli_fetch_array($r)) {
                        echo "<option value='" . $row['Id'] . "'>" . $row['category'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            </br>
            <div>Occupancy:</div>
            <div>
                <select name="occupancy" id="occupancy" style="width: 500px;height: 28px;">

<!--                    <option value="">Select occupancy</option>-->
                    <?php
                    echo "<option >".$rw['occupancy']."</option>";
//                    include "connection.php";
//                    $r = mysqli_query($c, "SELECT `Id`, `occupancy` FROM `occupancy`");
//                    while ($row = mysqli_fetch_array($r)) {
//                        echo "<option value='" . $row['occupancy'] . "'>" . $row['occupancy'] . "</option>";
//                    }
                   ?>
                </select>
            </div>
            </br>
            <div>No. of Rooms :</div>
            <div>
                <input type="text" name="rooms" autocomplete="off" value="<?php echo $rw["Rooms"];  ?>"
                       style="width: 500px;height: 25px;"/>
            </div>
            </br>
            <div>Adults:</div>
            <div>
                <input type="text" name="adult" autocomplete="off" placeholder="Age(15+)" value="<?php echo $rw["Adults"];  ?>"
                       style="width: 500px;height: 25px;"/>
            </div>
            </br>
            <div>Child (upto Age 5) :</div>
            <div>
                <input type="text" name="child1" autocomplete="off" placeholder="Age(0-5)" value="<?php echo $rw["Child1"];  ?>" style="width: 500px;height: 25px;"/>
            </div>
            </br>
            <div>Child (5 to 15 Age) :</div>
            <div>
                <input type="text" name="child2" autocomplete="off" placeholder="Age(6-15)" value="<?php echo $rw["Child2"];  ?>" style="width: 500px;height: 25px;"/>
            </div>
            </br>
            <div>
                <input type="submit" name="save1" value="SAVE" style="margin-left: 200px;border: inset;margin-bottom: 50px; height: 30px;width: 150px"/>
            </div>
        </form>
    </div>
    <div style="margin-left: 150px; border: double;float: left;margin-top: 20px; font-family: 'Lucida Bright';">
        <?php
        echo "<table style='color: black;font-size: 15px;margin: 20px 0px 10px 20px;width: 325px;'>";
            echo "<tr>";
        echo "<caption style='font-size: 20px;color: black;padding-bottom: 20px;'>" ."BOOKIE DETAILS"."</caption>";
        echo "</tr>";
//        echo "<td style='font-size: 20px;color: black;padding-bottom: 20px;'>" . $row['Id'] . "</td>";
        echo "<tr>";
        echo "<td>" . "NAME: " . "</td>";
        echo "<td>" . $rw['name'] . "</td>";
    echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Mobile: " . "</td>";
        echo "<td>" . $rw['mobile'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Email: " . "</td>";
        echo "<td>" . $rw['email'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Address" . "</td>";
        echo "<td>" . $rw['Street']." ".$rw['city']." ".$rw['country'] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>" . "Zip Code: " . "</td>";
        echo "<td>" . $rw['pin'] . "</td>";
        echo "</tr>";
        echo "</table>";
        mysqli_close($c);
        ?>
    </div>

    </body>
    </html>
    <?php
}
?>
