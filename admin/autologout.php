<?php
if(!isset($_SESSION['admin']))
{
header("location:admin.php");
}
$inactive = 60*5; // Set timeout period in seconds

if (isset($_SESSION['timeout'])) {
$session_life = time() - $_SESSION['timeout'];
if ($session_life > $inactive) {
session_destroy();
header("Location: admin.php");
}
}
$_SESSION['timeout'] = time();
?>