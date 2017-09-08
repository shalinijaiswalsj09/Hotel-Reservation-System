function full(form)
{
    var r7 = document.forms["fullinfo"]["name"].value;
    if (r7 == "") {
        alert("Please Enter Your Name");
        return false;
    }
    var r8 = document.forms["fullinfo"]["mobile"].value;
    if (r8== "") {
        alert("Please Enter Your Mobile No.");
        return false;
    }
    var j;
    for(j=0;j<r8.length;j++){
        var v=r8.charCodeAt(j);
        if(v < 48 || v > 57){
            alert("Please Enter a Valid Mobile No.");
            return false;
        }
    }
    if ((r8 < 1000000000) || (r8 > 10000000000)) {
        alert("Please Enter a Valid Mobile No.");
        return false;
    }
    var s1 = document.forms["fullinfo"]["email"].value;
    if (s1 == "") {
        alert("Please Enter Your Email Address");
        return false;
    }
    var s2 = document.forms["fullinfo"]["password"].value;
    if (s2 == "") {
        alert("Enter a Password");
        return false;
    }
    var s3 = document.forms["fullinfo"]["street"].value;
    if (s3 == "") {
        alert("Please enter your Address");
        return false;
    }
    var s6 = document.forms["fullinfo"]["pin"].value;
    if (s6== "") {
        alert("Please Enter Your Pin Code");
        return false;
    }
    var k;
    for(k=0;k<s6.length;k++){
        var w=s6.charCodeAt(k);
        if(w < 48 || w > 57){
            alert("Please Enter a Valid Pin Code");
            return false;
        }
    }
    if ((s6 < 100000) || (s6 > 1000000)) {
        alert("Please Enter a Valid Pin Code");
        return false;
    }
    var s4 = document.forms["fullinfo"]["city"].value;
    if (s4 == "") {
        alert("Please Enter your City name");
        return false;
    }
    var s5 = document.forms["fullinfo"]["country"].value;
    if (s5 == "") {
        alert("Please Enter your Country name");
        return false;
    }
}
