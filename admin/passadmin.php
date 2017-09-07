<?php
session_start();
include "connect.php";
if(isset($_POST["save12"]))
{
    $a="SELECT `username` FROM `admin`";
    $q=mysqli_query($con, $a);
    $b=mysqli_fetch_array($q);
    $aw=$b["username"];
    $password=$_POST['password'];
    $sql = "UPDATE `admin` SET `Password`='$password'";
    if($_POST['username']==$aw) {
        if ($_POST['password'] =="") {
            ?>
            <script type='text/javascript'> alert("Enter a Password");</script>
            <?php
        }
        else{
            if ($_POST['password'] == $_POST['changepass']) {
                if (mysqli_query($con, $sql)) {
                    header("location:admin.php?data3=password_saved");
                } else {
                    header("location:admin.php?data3=pass_not_saved");
                }
            } else {
                ?>
                <script type='text/javascript'> alert("Check Your Password");</script>
                <?php
            }
        }
    }
    else{
        ?>
        <script type='text/javascript'> alert("Check your Username");</script>
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
        <link rel="stylesheet" href="../admin/css/reset.css" type="text/css" media="all">
        <link rel="stylesheet" href="../admin/css/layout.css" type="text/css" media="all">
        <link rel="stylesheet" href="../admin/css/style.css" type="text/css" media="all">
    </head>
    <body id="page1">
    <div class="body1">
        <div class="main">
            <!-- header -->
            <header>
                <h1><a href="../index.php" id="logo"></a></h1>

                <div class="wrapper">
                    <ul id="icons">
                        <li><a href="../userlogin.php" class="normaltip"><img src="../images/login1.jpg"></a></li>
                        &nbsp;&nbsp;&nbsp;
                        <li><a href="../contactus.php" style="font-size: 20px; text-decoration: none;"><img
                                        src="../images/message.png"></a></li>
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
<!--                <input type="hidden" name="Id" value="--><?php //echo $row["Id"];  ?><!--" />-->
<!--                <input type="hidden" name="ema" value="--><?php //echo $row["email"];  ?><!--" />-->
                <div><p style="padding: 50px 20px 5px 10px; font-size:25px;">Username :<input type="text" name="username"
                                                                                              id="username"
                                                                                              autocomplete="off"
                                                                                              placeholder="Username"
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


