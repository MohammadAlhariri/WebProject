<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$password = addslashes(strip_tags($_POST['password']));
$repassword = addslashes(strip_tags($_POST['repassword']));
$Parent = $_SESSION['parent'];

header("Location: ../Pages/setting.php?msg=$password . $repassword");

if ($password == $repassword) {

    if ($Parent == 'Users' || $Parent == 'Admins') {

        updateUserPassword($password);

    } else if ($Parent == 'seller') {
        updateSellerPassword($password);
    }

} else {
    header("Location: ../Pages/setting.php?msg=NotSamePassword");

}

function updateUserPassword($password)
{
    $connect = new DbConnection();
    $userID = $_SESSION['userID'];
    $sql = "UPDATE `user` 
        SET `userPassword` = '$password' 
        WHERE  `user`.`userID` = '$userID';";

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = "Empty msg";
    $intMsg = "";
    if ($result) {
        $msg = "password updated successfully";
        $intMsg = 1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        echo $msg = "Something wrong!";
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        mysqli_query_error($connect->getdbconnect);
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
    $msg = "Empty msg";
    $intMsg = "";
    if ($result) {
        $msg = "password updated successfully";
        $intMsg = 1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        echo $msg = "Something wrong!";
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        mysqli_query_error($connect->getdbconnect);
    }
    mysqli_close($connect->getdbconnect());
}