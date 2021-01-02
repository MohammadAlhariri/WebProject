<?php
require("../config/connectWithRemoteDB.php");
session_start();
function getUserInfo($phone)
{
    $sql = "SELECT * FROM `users` WHERE  `userPhone`='$phone';";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $rows = mysqli_fetch_array($result);
        $_SESSION["userID"] = $rows["userID"];
        $_SESSION["userName"] = $rows["userName"];
        $_SESSION["userPhone"] = $rows["userPhone"];
        $_SESSION["userEmail"] = $rows["userEmail"];
        $_SESSION["userImage"] = $rows["userImage"];
        $_SESSION["userAddress"] = $rows["userAddress"];
        $_SESSION["parent"] = $rows["parent"];
        $_SESSION["login_time_stamp"] = time();
    }
}