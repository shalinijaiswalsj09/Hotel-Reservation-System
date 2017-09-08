function aws(form)
{
    var r7 = document.forms["fi"]["Checkin"].value;
    if (r7 == "") {
        alert("Please Enter Your Check In Date");
        return false;
    }
    var r8 = document.forms["fi"]["Checkout"].value;
    if (r8== "") {
        alert("Please Enter Your Check Out Date");
        return false;
    }
    var r5 = document.forms["fi"]["rooms"].value;
    if (r5 == "") {
        alert("Please Enter Number of Rooms You Want to Book ");
        return false;
    }
    if(r5<0)
    {
        alert("Please enter correct inputs......");
        return false;
    }
    if (r5 > 5) {
        alert("You can book only 4 rooms at a time");
        return false;
    }
    var s1 = document.forms["fi"]["Adults"].value;
    if (s1 == "") {
        alert("Enter No. of Adult Staying In Hotel");
        return false;
    }
    if ((s1 < 0) || (s1 > 10)) {
        alert("Adults amount is invalid");
        return false;
    }
    if (s1 == 0) {
        alert("Enter Correct information");
        return false;
    }
    var s2 = document.forms["fi"]["Child1"].value;
    if (s2 == "") {
        alert("Enter No. Of Child Stay With You of age group 0 to 5");
        return false;
    }
    if ((s2 < 0) || (s2 > 10)) {
        alert("Children amount is invalid");
        return false;
    }
    var s3 = document.forms["fi"]["Child2"].value;
    if (s3 == "") {
        alert("Enter No. Of Child Stay With You of age group 6 to 14");
        return false;
    }
    if ((s3 < 0) || (s3 > 10)) {
        alert("Children amount is invalid");
        return false;
    }

}
