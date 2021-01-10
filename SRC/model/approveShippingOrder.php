<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
$orderID = addslashes(strip_tags($_GET['oid']));

approveShippingOrder($orderID);

function approveShippingOrder($orderID)
{
    $connect = new DbConnection();
    $sql = "UPDATE `order` SET `orderState` = 'Shipped' WHERE `order`.`orderID` = '$orderID';";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = "Order Shipped";
    $intMsg = 1;
    if ($result) {
        echo $msg;
        header("Location: ../Pages/#.php?msg=$intMsg");
    } else {
        $msg = mysqli_error($connect->getdbconnect());
        $intMsg = -1;
        header("Location: ../Pages/#.php?msg=$intMsg");
    }
    mysqli_close($connect->getdbconnect());
}