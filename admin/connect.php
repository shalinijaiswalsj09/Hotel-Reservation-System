<?php
include "autologout.php";
error_reporting(1);
$con=mysqli_connect("localhost","root","");
if(!$con)
{
    die("incorrect Connection");
}
if(!mysqli_select_db($con,"hrs"))
{
    die("Incorrect Database Selection");
}
?>