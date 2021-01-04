<?php


require_once("../dataSources/config/connectWithRemoteDB.php");
$orderID = addslashes(strip_tags($_POST['productID']));
$connect = new DbConnection();

$sql = "UPDATE `order` SET `orderState` = 'Shipped' WHERE `order`.`orderID` = $orderID;";

$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "";
if ($result) {
    // echo "Order Shipped";
    $msg = 1;
} else {
    echo mysqli_error($connect->getdbconnect());
    $msg = 2;
}
// header("Location: ../Pages/seller-product.php?msg=$msg");
// must forwarding to unshipped Orders page
mysqli_close($connect->getdbconnect());

function approveShippingOrder()
{
    require_once("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $orderID = addslashes(strip_tags($_POST['productID']));
    $sql = "UPDATE `order` SET `orderState` = 'Shipped' WHERE `order`.`orderID` = $orderID;";
    return mysqli_query($connect->getdbconnect(), $sql);
}