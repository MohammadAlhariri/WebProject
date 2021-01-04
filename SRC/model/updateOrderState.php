<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
require_once("getOrderTotalPrice.php");

$connect = new DbConnection();
$orderID = addslashes(strip_tags($_POST['orderID']));
$costumerName = addslashes(strip_tags($_POST['name']));
$customerPhone = addslashes(strip_tags($_POST['phone']));
$city = addslashes(strip_tags($_POST['city']));
$Address = addslashes(strip_tags($_POST['address']));
$totalPrice = getOrderTotalPricefn($orderID);
$sql = "UPDATE `order` 
        SET `orderTotal` = '$totalPrice',
            `customerName` = '$costumerName',
            `customerAddress` = '$Address',
            `customerPhone` = '$customerPhone' ,
            `customerCity` = '$city' ,
            `adminApproved`='Yes' 
        WHERE `order`.`orderID` = $orderID;";
$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "";
if ($result) {
    echo $msg = "1";
    header("Location: ../Pages/index.php");
} else {

    mysqli_query_error($connect->getdbconnect);
    echo $msg = "2";
}
mysqli_close($connect->getdbconnect());


