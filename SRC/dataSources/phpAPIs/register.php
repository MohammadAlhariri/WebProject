<?php
$cid = addslashes(strip_tags($_POST['phone']));
$name = addslashes(strip_tags($_POST['name']));
$key = addslashes(strip_tags($_POST['password']));



include "connection.php";
$sql="INSERT INTO `user` (`userName`, `userPhone`,`userPassword`, `parent`) VALUES ( '$name', $cid, '$key','Users')";
mysqli_query($con,$sql) or
    die ("can't add record");

echo "Your Account has been created you can login";
   
mysqli_close($con);
?> 