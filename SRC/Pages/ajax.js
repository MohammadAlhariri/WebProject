//change password
document.getElementById("updatePassword").addEventListener("submit",
    function (e) {
        e.preventDefault();
        var data = new FormData(this);
        password = data.get('password').length;
        if (password == 0) {
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
        /*
        data.append('password', pass1);
        data.append('repassword', pass2);*/
        var url = "../model/updatePassword.php";
        xmlhttp.open("POST", url, true);
        xmlhttp.send(data);
        document.getElementById("pass1").value = "";
        document.getElementById("pass2").value = "";
    }
);

document.getElementById("changeSecurityAnswers").addEventListener("submit",
    function (e) {
        e.preventDefault();
        var data = new FormData(this);
        check = data.get('answer1').length;
        if (check == 0) {
            document.getElementById("answerResponse").innerHTML = "you have to put answers";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("answerResponse").innerHTML = this.responseText;
                }
            };
        }
        var url = "../model/updateSecurityAnswers.php";
        xmlhttp.open("POST", url, true);
        xmlhttp.send(data);
        document.getElementById("answer1").value = "";
        document.getElementById("answer2").value = "";
    }
);
