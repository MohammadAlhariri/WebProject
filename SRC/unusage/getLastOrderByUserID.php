<?php

require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$userID = $_SESSION['userID'];
$connect = new DbConnection();
$sql = "SELECT * FROM `order` where `userID` = '$userID' AND `orderState` = 'Not Shipped' ORDER BY `OrderID` DESC LIMIT 1;";

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

function getLastOrderByUserIDfn()
{
    require_once("../dataSources/config/connectWithRemoteDB.php");
    session_start();
    $userID = $_SESSION['userID'];
    $connect = new DbConnection();
    $sql = "SELECT * FROM `order` where `userID` = '$userID' AND `orderState` = 'Not Shipped' ORDER BY `OrderID` DESC LIMIT 1;";
    return mysqli_query($connect->getdbconnect(), $sql);
}

