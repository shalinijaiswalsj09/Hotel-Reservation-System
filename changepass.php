<?php
session_start();
include "connection.php";
if(isset($_POST["save12"]))
{

    extract($_POST);
    $w=$_POST['Id'];
    $aw=$_POST['ema'];
    $sql = "UPDATE `booking` SET `Password`='$password' WHERE Id='$w'";
    if($_POST['email']==$aw) {
        if ($_POST['password'] == $_POST['changepass']) {
            if (mysqli_query($c, $sql)) {
                header("location:userlogin.php?data3=passwordsaved");
            } else {
                header("location:userlogin.php?data3=pass/not/saved");
            }
        } else {
            ?>
            <script type='text/javascript'> alert("Check Your Password");</script>
            <?php
        }
    }
    else{
        ?>
        <script type='text/javascript'> alert("Check your Username");</script>
        <?php
    }
}
if(isset($_GET["chpass"])) {
    $ed = $_GET["chpass"];
    $result = mysqli_query($c, "SELECT * FROM booking where Id='$ed'");
    $row = mysqli_fetch_array($result);
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
<!--    --><?php
//    include "connection.php";
//    if(isset($_POST["save12"]))
//    {
//        $cp = $_POST['password'];
//        $q = "INSERT INTO `booking` (`Password`) values  ('$cp')";
////                    echo $query;
////                    die();
//        if (mysqli_query($c,$q)) {
//
//
//            echo "<center><h3 style='color:green'>New password Saved!</h1></center>";
//        }
//        else
//        {
//            echo "<center><h3 style='color:green'>New password Not Saved!</h1></center>";
//        }
//    }
//    ?>
    <body id="page1">
    <div class="body1">
        <div class="main">
            <!-- header -->
            <header>
                <h1><a href="index.php" id="logo"></a></h1>

                <div class="wrapper">
                    <ul id="icons">
                        <li><a href="userlogin.php" class="normaltip"><img src="images/login1.jpg"></a></li>
                        &nbsp;&nbsp;&nbsp;
                        <li><a href="contactus.php" style="font-size: 20px; text-decoration: none;"><img
                                    src="images/message.png"></a></li>
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
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?> " method="post" name="form">
            <fieldset style="display:inline-flex; height: 250px; width: 380px; font-size: 35px;">
                <legend>Change Password</legend>
                <input type="hidden" name="Id" value="<?php echo $row["Id"];  ?>" />
                <input type="hidden" name="ema" value="<?php echo $row["email"];  ?>" />
                <div><p style="padding: 50px 20px 5px 10px; font-size:25px;">Username :<input type="email" name="email"
                                                                                              id="username"
                                                                                              autocomplete="off"
                                                                                              placeholder="Email"
                                                                                              style="height: 30px; width: 200px;">
                    </p></div>
                <div><p style="padding: 20px 20px 0 10px; font-size: 25px;">Password : <input type="password"
                                                                                              name="password"
                                                                                              placeholder="New Password"
                                                                                              style="height: 30px; width: 200px;">
                    </p></div>
                <div><p style="padding: 20px 10px 0 10px; font-size: 25px;">Conform Password : <input type="password"
                                                                                                      name="changepass"
                                                                                                      placeholder="Conform Password"
                                                                                                      style="height: 30px; width: 200px;">
                    </p></div>
                <p style="padding: 15px 0 5px 15px;width: 80px;"><input type="submit" value="Save" name="save12"></p>
            </fieldset>
        </form>
    </div>


    </body>
    </html>
    <?php
}
    ?>

