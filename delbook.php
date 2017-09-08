<?php
session_start();
//include "autologout.php";
if(isset($_GET["delid"]))
{   include "connection.php";
    $delid = $_GET["delid"];
    $sql ="delete from booking where Id = $delid ";
    if(mysqli_query($c,$sql))
    {
        header("location:userlogin.php?data2=deleted");
    }
    else
    {
        header("location:userlogin.php?data2=not deleted");
    }
}



?>