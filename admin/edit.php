<?php
session_start();
include "autologout.php";
include "connect.php";
$num1 = range(9,0);
$num2 = range(9,0);
$rnum1 = array_rand($num1);
$rnum2 = array_rand($num2);
$n1 = $num1[$rnum1];
$n2 = $num2[$rnum2];
$sum = $n1 + $n2;
$res = $n1." + ".$n2;
if (isset($_POST["Update"]))
{
    if($_POST['c1']==$_POST['c2'])
    {
//        include '../connection.php';

        $m=mysqli_query($c,"SELECT category FROM `category` WHERE Id='" . $_POST["roomtype"] . "'");
        $df=mysqli_fetch_array($m);
        $rtt =$df['category'];

        $nr = $_POST['room'];
        $rt = $_POST['roomtype'];
//            $o = $_POST['occupancy'];
        $d=$_POST['adult'];
        $z=$_POST['child1'];
        $v=$_POST['child2'];
        $as=mysqli_query($con,"SELECT Rate FROM `rooms` WHERE Category='$rt' and Occupancy='" . $_POST["occupancy"] . "'");
        $x = mysqli_fetch_array($as);
//    echo $nr;
//    die();
//    $ss=$x['Rate'];

        $tp=(($nr * $x['Rate'])+(1000*$d)+(500*$v)+(250*$z)+(0.10*$x['Rate']));
//    $file=$_FILES["file"]["name"];
        extract($_POST);
        $sql = "UPDATE `booking` SET `name`='$name',`mobile`=$mobile,`Email`='$email',`Checkin`='$Checkin',`Checkout`='$Checkout',
        `Rooms`='$room',`roomtype`='$rtt',`occupancy`='$occupancy',`Adults`='$adult',`Child1`='$child1',`Child2`='$child2',`Charge`='$tp' WHERE Id=$Id";
//        echo $nr;
//        echo $d;
//        echo $z;
//        echo $v;
//        echo $x['Rate'];
//        echo $nr * $x['Rate'];
//        echo $tp;
//        echo $sql;
//        die();
        if (mysqli_query($con, $sql)) {
            //file update
            header("location:conform.php?data=update");

        } else {
            header("location:conform.php?data=notupdate");


        }
    }
}
if(isset($_GET["editid"]))
{
    $editid = $_GET["editid"];
    $result = mysqli_query($con, "SELECT * FROM booking where Id=$editid");
    $row = mysqli_fetch_array($result);
    ?>
    <!DOCTYPE html>
    <html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
    xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <head>
    <script src="../js/bookingValidation.js"></script>
    <title>Your trip</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
            function getState(val) {
                        $.ajax({
                            type: "POST",
                            url: "ajax.php",
                            data:'cat='+val,
                            success: function (data) {
                                $('#occupancy').html(data);
                            }

                        });
            }
    </script>
    <style type="text/css">
                input
                {
                    height: 25px;
                    width:500px;
                    margin-left: 100px;
                    font-family:"Trebuchet MS" , Arial, Helvetica, sans-serif;
                    font-size: small;
                }
                div.merg
                {
                    color: black;
                    font-size:17px;
                    font-family: lucida grande;
                    margin-left: 100px;
                }
                textarea
                {
                    width:200px;
                    height:50px;
                    margin-left: 100px;
                }
                select
                {
                    width: 497px;
                    height: 30px ;
                    margin-left: 100px;
                }
    </style>
    <link type="text/css" href="../cal_style.css" rel="stylesheet" />
    <script src="../js/bookingValidation.js"></script>
    </head>

        <!--==============================Content=================================-->
<!--        --><?php
//        include('connect.php');
//        $num1 = range(9,0);
//        $num2 = range(9,0);
//        $rnum1 = array_rand($num1);
//        $rnum2 = array_rand($num2);
//        $n1 = $num1[$rnum1];
//        $n2 = $num2[$rnum2];
//        $sum = $n1 + $n2;
//        $res = $n1." + ".$n2;
//        if(isset($_POST['Update']))
//        {
////            echo "hello";
////            die();
//            if($_POST['c1']==$_POST['c2'])
//            {
//                $n = $_POST['name'];
//                $mob = $_POST['mobile'];
//                $em = $_POST['email'];
//                $str = $_POST['Street'];
//                $cit = $_POST['city'];
//                $pin = $_POST['pin'];
//                $cou = $_POST['country'];
////                $sc = ($_FILES['file']['name']);
//                $ci = $_POST['Checkin'];
//                $co = $_POST['Checkout'];
//                $nr = $_POST['Rooms'];
//                $rt = $_POST['roomtype'];
//                $o = $_POST['occupancy'];
//                $na = $_POST['Adult'];
//                $nc = $_POST['Child1'];
//                $zc = $_POST['Child2'];
//                $me = $_POST['message'];
//                    $query = "INSERT INTO `booking` (`Name`, `Mobile`,`Email`, `Street`, `city`, `pin`,
//`country`, `Checkin`, `Checkout`, `rooms`, `roomtype`, `occupancy`,`Adults`, `Child1`, `Child2`, `Message`) values  ('$n',$mob,'$em','$str','$cit','$pin',$cou','$ci',
//'$co',$nr,'$rt','$o','$na','$nc','$zc','$me')";
////                    echo $query;
////                    die();
//                    if (mysqli_query($con,$query)) {
//
//
//                        echo "<center><h3 style='color:green'>Details Saved!</h1></center>";
//                    }
//                }
//            else
//            {
//
//                echo '<script>alert("Wrong Verification Code, try again!")</script>';
//
//            }
//        }
        include "header1.php";
        ?>
        <div class="content" style="margin-left: 50px;">
            <div class="container_12"><br/></br>
                <form  name="fib" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  method="post" onsubmit="return aws(this)">
                    <fieldset style="border-color: black; border-width: thin; border-style: ridge; width: 920px   ;">
                        <legend style="color: darkblue;font-size: x-large;font-family: 'Lucida Bright'; margin-left: 20px">
                            ONLINE HOTEL BOOKING FORM
                        </legend>
                        <div  style="background-color: lavender; width: 920px;"></br>
                            <p style="font-size:large; font-family: Cambria;color: darkblue ">
                                PERSONAL INFORMATION
                            </p>
                            <input type="hidden" name="Id" value="<?php echo $row["Id"];  ?>" />
                            <div class="merg">Name<sup>*</sup>:</div>
                            <div>
                                <input src="text" name="name" value="<?php echo $row["name"];  ?>"/>
                            </div></br>
                            <div class="merg">Mobile<sup>*</sup>:</div>
                            <div>
                                <input src="text" name="mobile" value="<?php echo $row["mobile"];  ?>"/>
                            </div></br>
                            <div class="merg">E-Mail Id<sup>*</sup>:</div>
                            <div>
                                <input src="text" name="email" value="<?php echo $row["email"];  ?>"/>
                            </div></br>
                            <p style="font-size:large; font-family: Cambria;color: darkblue ">
                                BOOKING REQUEST INFORMATION
                            </p>
<!--                            <div class="merg">Address<sup>*</sup>:</div></br>-->
<!--                            <div style="margin-left: 100px ;color: black; font-family: 'Lucida Bright';"><b>Street:</b><input type="text" name="street" value="--><?php //echo $row["Street"];  ?><!--" style= "margin-left: 2px ;width: 450px;"/></div></br>-->
<!--                            <div class="merg"> City:<input type="text" name="city" value="--><?php //echo $row["city"];  ?><!--" style="width:170px;margin-left: 11px  "/>-->
<!--                                Country:<select name="country" style="width: 205px ; margin-left: 2px">-->
<!--                                    <option></option>-->
<!--                                    <option  value="Albania">Albania</option><option value="Algeria">Algeria-->
<!--                                    </option><option value="Andorra">Andorra </option><option value="Angola"> Angola</option>-->
<!--                                    <option value="Anguilla">Anguilla</option><option value="Antigua and Barbuda">Antigua and Barbuda</option>-->
<!--                                    <option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">-->
<!--                                        Aruba</option><option value="Australia">Australia</option><option value="Austria">Austria</option>-->
<!--                                    <option value="Azerbaijan">Azerbaijan</option><option value="Azores">Azores</option><option value="Bahamas">-->
<!--                                        Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option>-->
<!--                                    <option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belize">-->
<!--                                        Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option>-->
<!--                                    <option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Borneo">Borneo-->
<!--                                    </option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">-->
<!--                                        Botswana</option><option value="Brazil">Brazil</option><option value="British Indian Ocean Territories">-->
<!--                                        British Indian Ocean Territories</option><option value="Brunei">Brunei</option><option value="Bulgaria">-->
<!--                                        Bulgaria</option><option value="Burkina Faso (Upper Volta)">Burkina Faso (Upper Volta)-->
<!--                                    </option><option value="Burundi">Burundi</option><option value="Camaroon">Camaroon</option>-->
<!--                                    <option value="Cambodia">Cambodia</option><option value="Canada">Canada</option>-->
<!--                                    <option value="Canary Islands">Canary Islands</option><option value="Cape Vere Islands">Cape Vere Islands-->
<!--                                    </option><option value="Cayman Island">Cayman Island</option><option value="Central African Rep">-->
<!--                                        Central African Rep</option><option value="Chad">Chad</option><option value="Chile">Chile-->
<!--                                    </option><option value="China">China</option><option value="Christmas Island">Christmas Island-->
<!--                                    </option><option value="Colombia">Colombia</option><option value="Comoros Islands">Comoros Islands-->
<!--                                    </option><option value="Congo, Democratic Republic of">Congo, Democratic Republic of</option>-->
<!--                                    <option value="Costa Rica">Costa Rica</option><option value="Croatia">Croatia</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritria">Eritria</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fed Rep Yugoslavia">Fed Rep Yugoslavia</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="Fyro Macedonia">Fyro Macedonia</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option><option value="Ghana">Ghana</option><option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Ivory Coast">Ivory Coast</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea">Korea</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Laos">Laos</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libya">Libya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mexico">Mexico</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar (Burma)">Myanmar (Burma)</option><option value="Namibia">Namibia</option><option value="Naura">Naura</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn Island">Pitcairn Island</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Qatar">Qatar</option><option value="Republic of Korea">Republic of Korea</option><option value="Reunion Island">Reunion Island</option><option value="Romania">Romania</option><option value="Russia">Russia</option><option value="Rwanda">Rwanda</option><option value="Saint Barthelemy">Saint Barthelemy</option><option value="Saint Croix">Saint Croix</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and Grenadi">Saint Vincent and Grenadi</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia Northern Region">Somalia Northern Region</option><option value="Somalia Southern Region">Somalia Southern Region</option><option value="South Africa">South Africa</option><option value="South Sandwich Islands">South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islnd">Turks and Caicos Islnd</option><option value="Tuvalu">Tuvalu</option><option value="USA">USA</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands (United Kingdom)">Virgin Islands (United Kingdom)</option><option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option><option value="Western Sahara">Western Sahara</option><option value="Western Samoa">Western Samoa</option><option value="Yemen">Yemen</option><option value="Zambia">Zambia</option><option value="Zimbabwe (Rhodesia)">Zimbabwe (Rhodesia)</option>-->
<!---->
<!---->
<!---->
<!--                                </select>-->
<!--                            </div></br>-->
<!--                            <div class="merg">Address Proof<sup>*</sup>:</div>-->
<!--                            <div>-->
<!--                                <select name="addproof" style="width: 495px"><option></option> <option --><?php // if($row["Addproof"]=="Voter Id"){ echo "selected='selected'"; } ?><!-- value="Voter Id">Voter Id-->
<!--                                    </option><option --><?php // if($row["Addproof"]=="Passport"){ echo "selected='selected'"; } ?><!-- value="Passport">Passport</option>-->
<!--                                    <option --><?php // if($row["Addproof"]=="Aadhar Card"){ echo "selected='selected'"; } ?><!-- value="Aadhar Card">Aadhar Card-->
<!--                                    </option><option --><?php // if($row["Addproof"]=="Driving License"){ echo "selected='selected'"; } ?><!-- value="Driving License">Driving License</option></select>-->
<!--<!--                                   <input type="file" name="file" value="--><?php ////echo $_FILES['file']['name'];  ?><!--<!--"  style="margin-left: 20px"  />-->
<!--<!--                                --><?php ////echo $_FILES['file']['name'];  ?>
<!---->
<!--                            </div></br>-->
<!--                            <div class="merg">Company Name:</div>-->
<!--                            <div style="color: black;">-->
<!--                                <input src="text" name="comname" value="--><?php //echo $row["Company name"];  ?><!--" />(if official trip)-->
<!--                            </div></br>-->
                            <div class="merg">Check-in Date<sup>*</sup>:</div>
                            <div>
                                <?php
                                include "my_calender.php";
                                ?>
                                <input type="text" name="Checkin" value="<?php echo $row["Checkin"];?>" onclick="ds_sh(this);" id="txtBirthDate" />

                            </div></br>
                            <div class="merg">Check-out Date<sup>*</sup>:</div>
                            <div>
                                <input type="text" name="Checkout" value="<?php echo $row["Checkout"];  ?>" onclick="ds_sh(this);" id="txtBirthDate"  />
                            </div></br>
                            <div class="merg">No. of Rooms <sup>*</sup>:</div>
                            <div>
                                <input type="text" name="room" value="<?php echo $row["Rooms"];  ?>"/>
                            </div></br>
                            <div class="merg">Types of Room<sup>*</sup>:</div>
                            <div>
<!--                                <option --><?php // if($row["Addproof"]=="Aadhar Card"){ echo "selected='selected'"; } ?><!-- value="Aadhar Card">Aadhar Card</option>-->
                                <select name="roomtype" id="category" onchange="getState(this.value)">
                                    <?php
                                    echo "<option >".$row['roomtype']."</option>";
                                    include "../connection.php";
                                    $r= mysqli_query($c,"SELECT `Id`, `category` FROM `category`");
                                    while($roqw = mysqli_fetch_array($r)) {
                                        echo "<option value='".$roqw['Id']."'>".$roqw['category']."</option>";
                                    }





                                    mysqli_close($c);

                                    ?>
                                </select>
                            </div></br>
                            <div class="merg">Occupancy<sup>*</sup>:</div>
                            <div>
                                <select name="occupancy" id="occupancy">
                                    <?php
                                    echo "<option >".$row['occupancy']."</option>";
//                                    include "../connection.php";
//                                    $r= mysqli_query($c,"SELECT `Id`, `occupancy` FROM `occupancy`");
//                                    while($roaw = mysqli_fetch_array($r)) {
//                                        echo "<option value='".$roaw['occupancy']."'>".$roaw['occupancy']."</option>";
//                                    }
//                                    mysqli_close($c);
                                    ?>
                                </select>
                            </div></br>
                            <?php
                            $editid = $_GET["editid"];
                            $result = mysqli_query($con, "SELECT * FROM booking where Id=$editid");
                            $row = mysqli_fetch_array($result);
                            ?>
                            <div class="merg">No. of Persons<sup>*</sup>:</div>
                            <div style="color: black;">
                                <input type="text" name="adult" value="<?php echo $row["Adults"];  ?>" autocomplete="off"  placeholder="Age(12+)" />(Adults)
                            </div></br>
                            <div style="color: black;">
                                <input type="text" name="child1" value="<?php echo $row["Child1"];  ?>" autocomplete="off" style="width:250px; " placeholder="Age(0-6)"/>
                                <input type="text" name="child2" value="<?php echo $row["Child2"];  ?>"  autocomplete="off" style="width:245px; margin-left: 0px" placeholder="Age(0-12)"/>(Children (Age))
                            </div></br>
                            <fieldset style= "margin-left: 100px;color: black; border-style: ridge;border-color: black; border-width: thin;width: 225px;   ;"><legend style="margin-left: 10px;font-family: 'Lucida Bright';color: black">Verification<sup>*</sup></legend><p><?php
                                    error_reporting(1);
                                    echo $res." = ";
                                    ?>
                                    <input type="hidden" name="c1" value="<?php echo $sum; ?>">
                                    <input type="text" name="c2"  placeholder="Enter Sum" style="margin-left:7px; width: 150px; margin-right: 10px; "/></p></fieldset><br>
                            </br>
                            <div>
                                <input type="RESET" name="reset" value="RESET" style="margin-bottom: 50px ;width: 50px;" onclick="show(this)"/>
                                <input type="submit" name="Update" value="UPDATE" style="margin-bottom: 50px;width: 65px;"/>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <!--==============================footer=================================-->
        <?php
        include "header2.php";
        ?>
        </html>
<?php

}
//mysqli_close($con);
?>

