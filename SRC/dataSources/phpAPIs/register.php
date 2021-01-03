<?php

require("../config/connectWithRemoteDB.php");
include("../../model/getUserInformationByPhone.php");
$connect = new DbConnection();
$cid = addslashes(strip_tags($_POST['form-phone']));
$fname = addslashes(strip_tags($_POST['form-first-name']));
$lname = addslashes(strip_tags($_POST['form-last-name']));
$key = addslashes(strip_tags($_POST['form-password']));
$fullName = $fname . " " . $lname;
$sql = "INSERT INTO `user` (`userName`, `userPhone`,`userPassword`, `parent`) VALUES ( '$fullName', $cid, '$key','Users')";

$result = mysqli_query($connect->getdbconnect(), $sql);

if ($result) {

    session_start();
    // Session Variables are created
    getUserInfo($cid);
    header("Location: ../../Pages/index.php");

} else {
    header("Location: ../../Pages/welcome-page-seller.php");
}