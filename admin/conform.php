<?php
session_start();
include "autologout.php";
include "connect.php";
if(isset($_GET["data"]))
{
    if($_GET["data"]=="update")
    {   ?>
        <script type='text/javascript'> alert("Data Updated");</script>
<?php
    }
    else{
        ?>
<script type='text/javascript'> alert("Data Not Updated");</script>
<?php
}
}
$result = mysqli_query($con,"SELECT * FROM booking");
//include "header1.php";
echo "<table cellpadding='10px' valign='top'  border='1'  style='background-image: url(wall4.jpg)'>
<tr >
<caption style='color: green; font-size: 50px;'>BOOKIE DETAILS</caption>
<tr>
<th>ID</th>
<th>Name</th>
<th>Mobile No.</th>
<th>Email</th>
<th>Password</th>
<th>Address</th>
<th>Zip Code</th>
<th>Country</th>
<th>CheckIn Date</th>
<th>Checkout Date</th>
<th>No. Of Rooms</th>
<th>Room Type</th>
<th>Occupancy</th>
<th>No. Of Adults</th>
<th>Children Age(0-5)</th>
<th>Children Age(6-15)</th>
<th>Total Charge</th>
<th> Message</th>
<th>Delete</th>
<th>Edit</th>

</tr>";
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['mobile'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['Street'] . "." . $row['city'] . ".</td>";
    echo "<td>" . $row['pin'] . "</td>";
    echo "<td>" . $row['country'] . "</td>";
//    echo "<td>" . $row['ScanCopy'] ."<a style='margin-left:20px;' href=" . "upload/". ($row['ScanCopy']) . ">View</a>". "</td>";
    echo "<td>" . $row['Checkin'] . "</td>";
    echo "<td>" . $row['Checkout'] . "</td>";
    echo "<td>" . $row['Rooms'] . "</td>";
    echo "<td>" . $row['roomtype'] . "</td>";
    echo "<td>" . $row['occupancy'] . "</td>";
    echo "<td>" . $row['Adults'] . "</td>";
    echo "<td>" . $row['Child1'] . "</td>";
    echo "<td>" . $row['Child2'] . "</td>";
    echo "<td>" . $row['Charge'] . "</td>";
    echo "<td>" . $row['Message'] . "</td>";
//    echo "<td>     <a href='del1.php?delid=". $row['regid'] . 'onclick=\"return confirm('Do you really want to delete this?')\"'>Delete</a></td>";
    echo "<td><a href='del1.php?delid={$row['Id']}' onclick=\"return confirm('Do you really want to delete this?')\">DELETE</a></td>";
    echo "<td><a href='edit.php?editid={$row['Id']}'>Edit</a></td>";
    echo "</tr>";
}
echo "</table>";
//include "header2.php";
mysqli_close($con);
?>
