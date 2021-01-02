<?php
require("../config/connectWithRemoteDB.php");
include("../../model/getUserInformationByPhone.php");
$phone = addslashes(strip_tags($_POST['form-phone']));
$password = addslashes(strip_tags($_POST['form-password']));
// $parent = addslashes(strip_tags($_POST['parent']));
$connect =new DbConnection();
$sql = "SELECT `userID`, `userName`, `userPhone`, `userEmail`, `userAddress`, `userPassword`, `userImage`, `userAnswer1`, `userAnswer2`,`parent`  
    FROM `user` WHERE `userPhone`= $phone AND `parent` ='Users';";
if ($result = mysqli_query($connect->getdbconnect(), $sql)) {
    $emparray = array();
    $row = mysqli_fetch_array($result);
    if (!empty($row)) {
        if ($row["userPassword"] == $password) {
            getUserInfo($phone);
            header("Location: ../../Pages/index.php");
        } else {
            header("Location: ../../Pages/welcome-page-user.php?msg=1");
            // password Wrong
        }

    } else {
        header("Location: ../../Pages/welcome-page-user.php?msg=2");
//            user not found
    }
}