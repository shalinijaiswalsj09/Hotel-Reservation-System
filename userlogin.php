<?php
session_start();
include 'connection.php';
if(isset($_POST['login']))
{
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
//    $p=md5($mypassword);
    if($myusername!="") {
        $l = "SELECT * FROM `booking`";
        $f = mysqli_query($c, $l);
        while ($d = mysqli_fetch_array($f)) {
            if ($d['email'] == $myusername) {
                $sql = "SELECT `Id`, `password` FROM `booking` WHERE email='$myusername'";
                $res = mysqli_query($c, $sql);
               while( $e = mysqli_fetch_array($res)) {
//    $count = mysqli_num_rows($result);
                   if ($e['password'] == $mypassword) {
                       header("location:modify.php?qp={$e['Id']}");
                   } else {
                       ?>
                       <script type='text/javascript'> alert("Enter Correct Password");</script>
                   <?php
                   }
               }
            }
            else {
                ?>
                <script type='text/javascript'> alert("Enter Correct Username");</script>
                <?php
            }











        }
    }
    else {
        ?>
        <script type='text/javascript'> alert("Enter your Username");</script>
        <?php
    }
}
?>


<html>
<head>
    <title>
        User Login
    </title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="admin/css/reset.css" type="text/css" media="all">
    <link rel="stylesheet" href="admin/css/layout.css" type="text/css" media="all">
    <link rel="stylesheet" href="admin/css/style.css" type="text/css" media="all">
</head>
<!--<body style="background-image: url(slidea.jpg);width:100%;" >-->
<body id="page1">
<div class="body1">
    <div class="main">
        <!-- header -->
        <header>
            <h1><a href="index.php" id="logo"></a></h1>
            <div class="wrapper" >
                <ul id="icons" >
                    <li><a href="userlogin.php" class="normaltip"><img src="images/login1.jpg" ></a></li>
                    <li><a href="contactus.php" style="font-size: 20px; text-decoration: none;"><img src="images/message.png"></a></li>
                </ul>
            </div>
        </header>
    </div>
</div>
<div class="body2">
    <div class="main">
    </div>
</div>
<script>Cufon.now();</script>
<div style="height: 50px;"></div>
<div align="center" style="font-family: 'Lucida Bright';color: black;">
    <form action="<?php echo $_SERVER["PHP_SELF"];?> " method="post" name="form">
        <fieldset style="display:inline-flex; height: 250px; width: 380px; font-size: 35px;"><legend>User Login</legend>
            <div> <p style="padding: 50px 20px 5px 10px; font-size:25px;">Email : <input type="email" name="username" id="username"  placeholder="Admin Username" style="height: 30px; width: 200px;"></p></div>
            <div> <p style="padding: 20px 20px 0 10px; font-size: 25px;">Password : <input type="password" name="password" id="password" placeholder="Admin Password" style="height: 30px; width: 200px;"></p></div>
            <!--        <div style="padding: 5px 0 5px 0px; font-size: 15px; color: white;"><input type="checkbox" name="signin" value="1"> Stay Login </div>-->
            <p style="padding: 15px 0 5px 15px"><input type="submit" value="Login" name="login"/>&nbsp;<input type="reset" value="Reset"></p>
        </fieldset>
    </form>
</div>
</body>
</html>