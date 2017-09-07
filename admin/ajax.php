<?php
//include 'connection.php';
//$output='';
//$sql="SELECT * FROM `rooms` WHERE category_id='".$_POST["Id"]."' ORDER BY occupancy";
//$result=mysqli_query($c,$sql);
//$output='<option value="">Select occupancy</option>';
//while($row=mysqli_fetch_array($result));
//{
//    $output .="<option value='".$row['Occupancy']."'>".$row['Occupancy']."</option>";
//}
//echo $output;
//?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>
<script type="text/javascript">//alert("sdfsd");</script>
<body>
<?php
require_once("../connection.php");
//$db_handle = new DBController();


$query ="SELECT * FROM rooms WHERE category_id = '" . $_POST["cat"] . "'";
$results = $c->query($query);
?>
<option value="">Select Occupancy</option>
<?php
while($rs=$results->fetch_assoc()) {
    ?>
    <option value="<?php echo $rs["Occupancy"]; ?>"><?php echo $rs["Occupancy"]; ?></option>
<?php

}
?>
</body>
</html>