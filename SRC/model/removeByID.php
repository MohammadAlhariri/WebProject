<?php
$productID = addslashes(strip_tags($_POST['productID']));
$date = getdate();
$connect = new DbConnection();
$sql = "DELETE FROM `product` WHERE `product`.`productID` = productID";
mysqli_query($connect->getdbconnect(), $sql);
echo mysqli_error($connect->getdbconnect());

echo "Record Deleted";

header("Location: ../Pages/seller-product.php?msg=$msg");
mysqli_close($connect->getdbconnect());
