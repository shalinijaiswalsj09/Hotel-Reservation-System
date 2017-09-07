<?php
session_start();
include "autologout.php";
if(isset($_GET["delid"]))
{   include "connect.php";
    $delid = $_GET["delid"];
    $sql ="delete from booking where Id = $delid ";
    if(mysqli_query($con,$sql))
    {
        header("location:conform.php?del=ok");
    }
    else{
        header("location:conform.php?del=notok");
    }
}
if(isset($_GET["deloc"]))
{   include "connect.php";
    $deloc = $_GET["deloc"];
    $sql ="delete from occupancy where Id = $deloc ";
    if(mysqli_query($con,$sql))
    {
        header("location:login_success.php?del=ok");
    }
    else{
        header("location:login_success.php?del=notok");
    }
}

if(isset($_GET["delcat"]))
{   include "connect.php";
    $delcat = $_GET["delcat"];
    $sql ="delete from category where Id = $delcat ";
    if(mysqli_query($con,$sql))
    {
        header("location:login_success.php?del1=ok");
    }
    else{
        header("location:login_success.php?del1=notok");
    }
}


?>