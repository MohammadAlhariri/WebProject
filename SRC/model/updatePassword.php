<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
require_once("getOrderTotalPrice.php");

$connect = new DbConnection();
$userID = $_SESSION['userID'];
$userParent = $_SESSION['parent'];
$password = addslashes(strip_tags($_POST['password']));
$sql = "UPDATE `user` 
        SET `userPassword` = '$password' 
        WHERE  `user`.`userID` = '$userID' ;";
$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "Empty msg";
$intMsg = "";
if ($result) {
    $msg = "password updated successfully";
    $intMsg = "1";
    header("Location: ../Pages/profile-setting.php?msg=$intMsg");
} else {
    echo $msg = "Something wrong!";
    $intMsg = "-1";
    header("Location: ../Pages/profile-setting.php?msg=$intMsg");
    mysqli_query_error($connect->getdbconnect);
}
mysqli_close($connect->getdbconnect());
