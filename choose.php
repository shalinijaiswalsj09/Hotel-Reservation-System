
<?php
$cat=$_POST['category'];
$occu=$_POST['occupancy'];
if(isset($_POST['check'])){
    $ty=mysqli_query($c,"SELECT `Room No.`, `Category`, `Occupancy`, `Status` FROM `rooms` WHERE Category='$cat' AND Occupancy='$occu'");
    while($row = mysqli_fetch_array($ty)) {
        ?>
        <div style="height: 100px;width: 100px;background-color: yellow;float: left; border: solid;margin:1px 1px 1px 1px;">
            <?php
            echo $row['Room No.'] . $row['Status'] ;
            ?>
        </div>
        <?php
    }
}
?>