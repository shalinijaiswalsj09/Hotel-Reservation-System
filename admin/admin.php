<?php

//ob_start();
session_start();
$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="hrs"; // Database name
$tbl_name="admin"; // Table name

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password")or die("cannot connect");
mysqli_select_db($con,"$db_name")or die("cannot select DB");
if(isset($_POST['login'])) {
// Define $myusername and $mypassword
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
//    $p=md5($mypassword);
// To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysqli_real_escape_string($con, $myusername);
    $mypassword = mysqli_real_escape_string($con, $mypassword);
    $sql = "SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";

    $result = mysqli_query($con, $sql);
//    if (isset($_POST['signin'])) {
//        setcookie('username', $myusername, time()+60*5);
//        setcookie('password',  $p , time()+60*5);
//    }
// Mysql_num_row is counting table row
    $count = mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
// Register $myusername, $mypassword and redirect to file "login_success.php"
        $_SESSION["admin"] = 'admin';
        //$_SESSION['myusername'] = 'admin';
        header("location:login_success.php");
    } else {
        ?>
<script type="text/javascript">alert("Wrong Username or Password")</script>
    <?php
    }
    ob_end_flush();
}
?>


<html>
<head>
    <title>
        admin
    </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
</head>
<!--<body style="background-image: url(slidea.jpg);width:100%;" >-->
<body id="page1">
<div class="body1">
    <div class="main">
        <!-- header -->
        <header>
            <h1><a href="../index.php" id="logo"></a></h1>
            <div class="wrapper" >
                <ul id="icons" >
                    <li><a href="Logout.php" class="normaltip"><img src="images/log1.jpg" alt=""></a></li>
                    <li><a href="Logout.php" style="font-size: 20px; text-decoration: none;">Logout</a></li>
                </ul>
            </div>
        </header>
    </div>
</div>
<div class="body2">
    <div class="main">
    </div>
</div>
<div style="height: 50px;"></div>
<div align="center" style="font-family: 'Lucida Bright';color: black;">
    <form action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" name="form">
    <fieldset style="display:inline-flex; height: 250px; width: 380px; font-size: 35px;"><legend>Administrator Login</legend>
       <div> <p style="padding: 50px 30px 5px 10px; font-size:25px;">Username :<input type="text" name="username" id="username"
                                                                              autocomplete="off"  placeholder="Admin Username" style="height: 25px"></p></div>
       <div> <p style="padding: 20px 30px 0 10px; font-size: 25px;">Password : <input type="password" name="password" id="password"
                                                                              placeholder="Admin Password" style="height: 25px"></p></div>
<!--        <div style="padding: 5px 0 5px 0px; font-size: 15px; color: white;"><input type="checkbox" name="signin" value="1"> Stay Login </div>-->
        <p style="padding: 15px 0 5px 15px"><input type="submit" value="Login" name="login">&nbsp;<input type="reset" value="Reset"></p>
    </fieldset>
    </form>
</div>
</body>
</html>