<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
$userID = $_SESSION['userID'];
$connect = new DbConnection();

$sql = "SELECT * FROM `order` where `userID` = '$userID';";

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
