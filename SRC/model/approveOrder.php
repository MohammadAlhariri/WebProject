<?php

require_once("../dataSources/config/connectWithRemoteDB.php");
$orderID = addslashes(strip_tags($_POST['orderID']));
$connect = new DbConnection();

$sql = "UPDATE `order` SET `adminApproved` = 'Yes' WHERE `order`.`$orderID` = $orderID;";

$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "";
if ($result) {
    // echo "Order Approved";
    $msg = 1;
} else {
    echo mysqli_error($connect->getdbconnect());
    $msg = 2;
}
// header("Location: ../Pages/seller-product.php?msg=$msg");
// must forwarding to invalidate Orders page
mysqli_close($connect->getdbconnect());
