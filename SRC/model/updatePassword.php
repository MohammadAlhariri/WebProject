<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$password = addslashes(strip_tags($_POST['password']));
$repassword = addslashes(strip_tags($_POST['repassword']));
$Parent = $_SESSION['parent'];


if ($password == $repassword) {

    if ($Parent == 'Users' || $Parent == 'Admins') {

        updateUserPassword($password);

    } else if ($Parent == 'seller') {
        updateSellerPassword($password);
    }

} else {
   echo "password is not the same";

}

function updateUserPassword($password)
{
    $connect = new DbConnection();
    $userID = $_SESSION['userID'];
    $sql = "UPDATE `user` 
        SET `userPassword` = '$password' 
        WHERE  `user`.`userID` = '$userID';";

    $result = mysqli_query($connect->getdbconnect(), $sql);

    if ($result) {
        echo "password updated successfully";
    } else {
        echo  "Something wrong!";
    }
    mysqli_close($connect->getdbconnect());

}

function updateSellerPassword($password)
{
    $connect = new DbConnection();
    $userID = $_SESSION['sellerID'];
    $sql = "UPDATE `seller` 
        SET `sellerPassword` = '$password' 
        WHERE  `seller`.`sellerID` = '$userID';";
    $result = mysqli_query($connect->getdbconnect(), $sql);

    if ($result) {
        echo"password updated successfully";

    } else {
        echo  "Something wrong!";

    }
    mysqli_close($connect->getdbconnect());
}