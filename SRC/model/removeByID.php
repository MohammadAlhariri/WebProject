<?php
require_once("../dataSources/config/connectWithRemoteDB.php");

$productID = addslashes(strip_tags($_POST['id']));
$date = getdate();
$connect = new DbConnection();
$sql = "DELETE FROM `product` WHERE `product`.`productID` = '$productID';";
mysqli_query($connect->getdbconnect(), $sql);
$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "";
if ($result) {
    // echo "Product Deleted";
    $msg = 1;
} else {
    // echo mysqli_error($connect->getdbconnect());
    $msg = 2;
}
header("Location: ../Pages/seller-products.php?msg=$msg");
mysqli_close($connect->getdbconnect());