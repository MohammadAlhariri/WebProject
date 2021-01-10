<?php
require_once("../dataSources/config/connectWithRemoteDB.php");

$orderID = addslashes(strip_tags($_GET['oid'])); // In post request Id must be Rename

removeProductFromOrder($orderID);

function removeProductFromOrder($orderID)
{
    $connect = new DbConnection();
    $sql1 = "DELETE FROM `order_content` WHERE `orderID` = '$orderID';";
    $result2 = mysqli_query($connect->getdbconnect(), $sql1);
    if ($result2) {
        $msg = 1;
    } else {
        $msg = -1;
    }
    $sql = "DELETE FROM `order` WHERE `orderID` = '$orderID';";
    $result = mysqli_query($connect->getdbconnect(), $sql);

    if ($result) {
        $msg = 1;
    } else {
        $msg = -1;
    }
    header("Location: ../Pages/admin-approve-orders.php?msg=$msg");
}