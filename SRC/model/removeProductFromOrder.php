<?php
require_once("../dataSources/config/connectWithRemoteDB.php");

$productID = addslashes(strip_tags($_GET['productID'])); // In post request Id must be Rename
$orderID = addslashes(strip_tags($_GET['orderID'])); // In post request Id must be Rename
$connect = new DbConnection();
$sql = "DELETE FROM `order_content` WHERE `order_content`.`productID` = '$productID'AND`order_content`.`orderID` = '$orderID';";
$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "";
if ($result) {
    $msg = 1;

} else {

    $msg = 2;
}

header("Location: ../Pages/my-cart.php?msg=$msg");
