<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
$productID = addslashes(strip_tags($_POST['productID']));
$connect = new DbConnection();

$sql = "UPDATE `product` SET `productState` = 'Validate' WHERE `product`.`productID` = $productID;";
echo mysqli_error($connect->getdbconnect());
echo "Record Approved";

$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = "";
if ($result) {
    // echo "Product Approved";
    $msg = 1;
} else {
    echo mysqli_error($connect->getdbconnect());
    $msg = 2;
}
header("Location: ../Pages/seller-product.php?msg=$msg");
mysqli_close($connect->getdbconnect());
