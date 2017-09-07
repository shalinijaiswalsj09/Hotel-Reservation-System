<?php
session_start();
include "autologout.php";
include "connect.php";
if(isset($_GET["viewid"])) {

    $viewid = $_GET["viewid"];
    $result = mysqli_query($con, "SELECT * FROM mail where Id=$viewid");
    $row = mysqli_fetch_array($result);
    ?>
        <html>
        <?php
        include "header1.php";
        ?><td>
            <form name="view" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post">
                      <fieldset style="margin: 70px 50px 100px 80px;font-family: 'Lucida Bright';background-color:aliceblue; font-size: 20px; height: 500px;">
                          <legend  style=" font-size: 30px; color: darkblue;">Message</legend>
                          <input type="hidden" name="Id" value="<?php echo $row["Id"];  ?>" />
                          <!--                <div style="font-family: 'Lucida Bright';background-color:#e0f0d5; font-size: 20px; height: 500px;">-->
                          <div style=" padding: 20px 20px 20px 30px; ">
                              <div>  <?php echo $row["Name"];  ?></div></br>
                              <div><?php echo $row["Email"];  ?></div></br>
                              <div><?php echo $row["Mobile"];  ?></div></br>
                              <div><textarea style="background-color: aliceblue;  height: 275px;max-height: 275px; width:738px;max-width: 738px; border: none;
                               font-size: 20px;font-family: 'Lucida Bright'; "><?php echo $row["Message"];  ?></textarea></div></br>
                              <!--                    <div > <a href="www.gmail.com" style="margin-bottom: 5px; margin-right:10px;"> <input type="submit" name="reply" value="REPLY"/></a></div>-->

                          </div>
                          <!--                </div>-->
                      </fieldset>
    </form>
        </td>
        </html>
    <?php

}
mysqli_close($con);
?>

