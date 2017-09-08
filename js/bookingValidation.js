
function show()
{
    confirm("do you want to reset the form");
    return false;

}
function aws()
{

    var r = document.forms["fib"]["name"].value;
    if (r == ""||r==null) {
        alert("Please Enter Your Name");
        return false;

    }
    var r1 = document.forms["fib"]["mobile"].value;
    if (r1 == "") {
        alert("Please Enter Your Mobile No.");
        return false;
    }
    var j;
    for(j=0;j<r1.length;j++){
        var v=r1.charCodeAt(j);
        if(v < 48 || v > 57){
            alert("Please Enter a Valid Mobile No.");
            return false;
        }
    }
    if ((r1 < 1000000000) || (r1 > 9999999999)) {
        alert("check your mobile number");
        return false;
    }
    var r2 = document.forms["fib"]["email"].value;
    if (r2 == "") {
        alert("Please Enter Your Email Id");
        return false;
    }
    var r3 = document.forms["fi"]["category"].value;
    if (r3 == "") {
         alert("Please select room category");
         return false;
    }
    var r4 = document.forms["fi"]["occupancy"].value;
    if (r4 == "") {
         alert("Please select your room occupancy");
         return false;
    }
    // var r5 = document.forms["fi"]["state"].value;
    // if (r5 == "") {
    //     alert("Please Enter Your State Name");
    //     return false;
    // }
    // var p1=document.forms["fi"]["country"].value;
    // if(p1=="")
    // {
    //     alert("Please Enter Your Country Name");
    //     return false;
    // }
    // var r6 = document.forms["fi"]["addproof"].value;
    // if (r6 == "") {
    //     alert("Choose Your Address Proof Type");
    //     return false;
    // }
    var r7 = document.forms["fib"]["Checkin"].value;
    if (r7 == "") {
        alert("Please Enter Your Check In Date");
        return false;
    }
    var r8 = document.forms["fib"]["Checkout"].value;
    if (r8== "") {
        alert("Please Enter Your Check Out Date");
        return false;
    }
    var r9 = document.forms["fib"]["room"].value;
    if (r9 == "") {
        alert("Please Enter No. Of Room You Want");
        return false;
    }
    var s1 = document.forms["fib"]["adult"].value;
    if (s1 == "") {
        alert("Enter No. of Adult Staying In Hotel");
        return false;
    }
    if (s1 == 0) {
        alert("Enter Correct information");
        return false;
    }
    var s2 = document.forms["fib"]["child1"].value;
    if (s2 == "") {
        alert("Enter No. Of Child Stay With You Between Age Group (0-6) ");
        return false;
    }
    var s9 = document.forms["fib"]["child2"].value;
    if (s9 == "") {
        alert("Enter No. Of Child Stay With You Between Age Group (6-12)");
        return false;
    }
    //var s4 = document.forms["fi"]["c1"].value;
    var s3 = document.forms["fib"]["c2"].value;
    if (s3 == "") {
        alert("Enter Verification Code");
        return false;
    }
    //if (s3 != s4) {
    //    alert("Check Verification Code");
    //    return false;
    //}
    form.submit()
}