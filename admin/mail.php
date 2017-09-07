<?php
session_start();
include "autologout.php";
include "connect.php";
$result = mysqli_query($con,"SELECT * FROM mail");
include "header1.php";?>
<html>

<td valign="top">
<?php
echo "<table cellpadding='10px' align='center' border='1' style='border-color: black; color: black;width: 800px'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th> Message</th>
<th>Delete</th>
<th>View Full Message</th>

</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['Name'] . "</td>";
    echo "<td>". $row['Email'] . "</td>";
    echo "<td>" . $row['Mobile'] . "</td>";
    echo "<td>" . substr($row['Message'],0,30) . "</td>";
//    echo "<td>     <a href='del1.php?delid=". $row['regid'] . 'onclick=\"return confirm('Do you really want to delete this?')\"'>Delete</a></td>";


    echo "<td><a href='delmail.php?delid={$row['Id']}' onclick=\"return confirm('Do you really want to delete this?')\">DELETE</a></td>";

    echo "<td ><a href='viewmail.php?viewid={$row['Id']}'>VIEW</a></td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</td>
</html>