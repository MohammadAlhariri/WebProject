<?php
session_start();
require_once("../dataSources/config/connectWithRemoteDB.php");
$connect = new DbConnection();
$userID = $_SESSION['userID'];
$productID = addslashes(strip_tags($_POST['productID']));
$price = addslashes(strip_tags($_POST['price']));
$quantity = addslashes(strip_tags($_POST['quantity']));

$totalPrice = $price * $quantity;

$sql = "SELECT * FROM `order` WHERE userID=$userID ORDER BY orderID DESC LIMIT 1;";
$result = mysqli_query($connect->getdbconnect(), $sql);
$row = mysqli_fetch_array($result);

if (empty($row) || $row["orderState"] == "Shipped") {
    $addOrder = "INSERT INTO `order`(`orderDate`, `userID`, `orderTotal`, `orderState`) VALUES (NOW(),$userID,$totalPrice,'Not Shipped');";
    mysqli_query($connect->getdbconnect(), $addOrder);
    $orderID = getOrderId($userID);
    insertToOrderContent($orderID, $productID, $quantity, $price);
    echo mysqli_error($connect->getdbconnect());
    header("Location: ../Pages/index.php");

} else if ($row["orderState"] == "Not Shipped") {
    $userID = getOrderId($userID);
    insertToOrderContent($userID, $productID, $quantity, $price);
    header("Location: ../Pages/index.php");
}

function getOrderId($userID)
{
    $connect = new DbConnection();
    $sql1 = "SELECT * FROM `order` WHERE userID=$userID  AND orderState='Not Shipped';";
    $result = mysqli_query($connect->getdbconnect(), $sql1);
    $row = mysqli_fetch_array($result);
    return $row["orderID"];
}

function insertToOrderContent($userID, $productID, $quantity, $price)
{
    $connect = new DbConnection();
    $sql2 = "INSERT INTO `order_content`(`orderID`, `productID`, `quantity`, `price`)
     VALUES ('$userID','$productID','$quantity','$price');";
    mysqli_query($connect->getdbconnect(), $sql2);
    echo mysqli_error($connect->getdbconnect());
    echo "Record Added";
}
