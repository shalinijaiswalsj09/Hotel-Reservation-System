<?php
session_start();
include "autologout.php";
if(isset($_GET["delid"]))
{   include "connect.php";
    $delid = $_GET["delid"];
    $sql ="delete from mail where Id = $delid ";
    if(mysqli_query($con,$sql))
    {
        header("location:mail.php");
    }
    else{
        header("location:mail.php");
    }
}



?>