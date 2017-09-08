<?php
error_reporting(1);
$c=mysqli_connect("localhost","root","");
if(!$c)
{
    die("incorrect connection");
}
if(!mysqli_select_db($c,"hrs"))
{
    die("incorrect database connection");
}
?>