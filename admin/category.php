<?php
session_start();
include "autologout.php";
include "connect.php";
if(isset($_POST['save'])) {
    $category=$_POST['category'];
    $q="INSERT INTO `category`(`Category`) VALUES ('$category')";
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
include "header1.php";
?>
    <html>
    <head>
        <style type="text/css">
            input{
                margin-left: 20px;
                height: 25px;
            }

        </style>
    </head>
    <body>
    <form name="fi" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post">
        <div align="center" style="margin: 60px 250px 0px 400px;  border:double; width: 550px; height: 200px; color: black;font-family: 'Lucida Bright';">
            <div align="center" style="font-size: 26px;height: 50px;margin: 20px 10px 20px 20px;">
                CATEGORY-SETTING FORM
            </div>
            <div style="height: 50px;
                font-size: 20px;
                margin: 20px 10px 20px 20px;"  >
                CATEGORY:
                <input type="text" name="category"/>
            </div>
            <div align="center" style="height: 50px;
                font-size: 20px;
                margin: 20px 10px 20px 20px;">
                <input type="submit" name="save" value="SAVE"/>
            </div>
        </div>
    </form>
<?php
session_start();
include "autologout.php";
include "connect.php";
$result = mysqli_query($con,"SELECT * FROM category");
echo "<table cellpadding='10px' align='center'  border='1' width='500px'>
<tr>
<th>ID</th>
<th>Room Type</th>
<th>Delete</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['Id'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td><a href='del1.php?delcat={$row['Id']}' onclick=\"return confirm('Do you really want to delete this?')\">DELETE</a></td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
    </body>
    </html>
