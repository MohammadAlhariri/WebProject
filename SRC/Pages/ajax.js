function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}


function changePassword() {
   var pass1= document.getElementById("pass1").value;
   var pass2= document.getElementById("pass2").value;

    if (pass1.length == 0) {
        document.getElementById("response").innerHTML = "you have to put password";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("response").innerHTML = this.responseText;
            }
        };
    }
    var data = new FormData();
    data.append('password', pass1);
    data.append('repassword', pass2);
    xmlhttp.open("POST", "../model/updatePassword.php", true);
    xmlhttp.send(data);

   document.getElementById("pass1").value="";
    document.getElementById("pass2").value="";


}
