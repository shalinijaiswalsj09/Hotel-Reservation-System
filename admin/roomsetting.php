<?php
include "connect.php";
if(isset($_POST['save'])) {
    $trooms=$_POST['trooms'];
    $category=$_POST['category'];
    $occupancy=$_POST['occupancy'];
    $rate=$_POST['rate'];
$q="INSERT INTO `rooms`(`total rooms`, `Category`, `Occupancy`, `Rate`) VALUES ('$trooms','$category','$occupancy','$rate')";
//    echo $q;
//    die();
if(mysqli_query($con,$q)){
    ?>
    <script type="text/javascript">alert("Detail Saved");</script>
    <?php
}
    else{
        ?>
        <script type="text/javascript">alert("Detail Not Saved");</script>
        <?php
    }
}
?>
<html>
<head>
<style type="text/css">
    input{
        margin-left: 20px;
        height: 25px;
    }
    select{
        height: 25px; width: 170px;
    }
</style>
</head>
<body>
<form name="fi" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post">
<div align="center" style="margin: 100px 250px 50px 400px;  border:double; width:500px; height: 400px; color: black;font-family: 'Lucida Bright';">
    <div align="center" style=" font-size: 30px;height: 50px; margin: 20px 10px 20px 20px">
        ROOM-SETTING FORM
    </div>
<div style="height: 50px;
        font-size: 20px;
        margin: 20px 10px 20px 10px;" >
       No. of Room:
        <input type="text" name="trooms"/>
</div>
    <div style="height: 50px;
        font-size: 20px;
        margin: 20px 10px 20px 10px;">
            Category:
            <select name="category" style="margin-left: 25px">
                <?php
                include "../connection.php";
                $r= mysqli_query($c,"SELECT `Id`, `category` FROM `category`");
                while($row = mysqli_fetch_array($r)) {
                    echo "<option value='".$row['category']."'>".$row['category']."</option>";
                }
                ?>
            </select>
    </div>
    <div style="height: 50px;
        font-size: 20px;
        margin: 20px 10px 20px 10px;">
            Occupancy:
            <select name="occupancy" style="margin-left: 15px">

                <?php
                include "../connection.php";
                $r= mysqli_query($c,"SELECT `Id`, `occupancy` FROM `occupancy`");
                while($row = mysqli_fetch_array($r)) {
                    echo "<option value='".$row['occupancy']."'>".$row['occupancy']."</option>";
                }
                ?>
            </select>
    </div>
    <div style="height: 50px;
        font-size: 20px;
        margin: 20px 10px 20px 10px;" >
        Rate of Room(for 24 hours):
        <input type="text" name="rate"/>
    </div>
    <div align="center">
        <input type="submit" name="save" value="SAVE"/>
    </div>
</div>
    </form>
</body>
</html>
