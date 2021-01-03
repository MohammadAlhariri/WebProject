<?php

require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$connect = new DbConnection();
$sql = "SELECT * FROM `order` where `orderState` = 'Not Shipped'";
$isParent = $_SESSION['parent'];
if ($isParent == 'Admins') {
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = "";
    if ($result) {
        // echo "Order Shipped";
        $msg = 1;
    } else {
        echo mysqli_error($connect->getdbconnect());
        $msg = 2;
    }
}
// header("Location: ../Pages/seller-product.php?msg=$msg");
// must forwarding to unshipped Orders page
mysqli_close($connect->getdbconnect());
