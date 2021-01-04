<?php
require_once("../config/connectWithRemoteDB.php");
session_start();
function getSellerInfo($email)
{
    $connect = new DbConnection();
    $sql = "SELECT * FROM `seller` WHERE `sellerEmail`='$email';";
    $result = mysqli_query($connect->getdbconnect(), $sql);

    if ($result) {
        $rows = mysqli_fetch_array($result);
        $_SESSION["sellerID"] = $rows["sellerID"];
        $_SESSION["sellerName"] = $rows["sellerName"];
        $_SESSION["sellerPhone"] = $rows["sellerPhone"];
        $_SESSION["sellerEmail"] = $rows["sellerEmail"];
        $_SESSION["sellerImage"] = $rows["sellerImage"];
        $_SESSION["sellerAddress"] = $rows["sellerAddress"];
        $_SESSION["parent"] = "seller";
        $_SESSION["login_time_stamp"] = time();
    }
}
// done