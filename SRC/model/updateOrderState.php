<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
require_once("getOrderTotalPrice.php");

$orderID = addslashes(strip_tags($_POST['orderID']));
$costumerName = addslashes(strip_tags($_POST['name']));
$customerPhone = addslashes(strip_tags($_POST['phone']));
$city = addslashes(strip_tags($_POST['city']));
$Address = addslashes(strip_tags($_POST['address']));
$totalPrice = getOrderTotalPrice($orderID);
$NewOrder = getUserOrders();
updateOrderState($NewOrder, $costumerName, $customerPhone, $city, $Address, $totalPrice, $orderID);

function updateOrderState($NewOrder, $costumerName, $customerPhone, $city, $Address, $totalPrice, $orderID)
{
    $connect = new DbConnection();
    if ($NewOrder == null || empty($NewOrder)) {

        $sql = "UPDATE `order` 
        SET `orderTotal` = '$totalPrice',
            `customerName` = '$costumerName',
            `customerAddress` = '$Address',
            `customerPhone` = '$customerPhone' ,
            `customerCity` = '$city' ,
            `adminApproved`='Yes' 
        WHERE `order`.`orderID` = $orderID;";
        mysqli_query($connect->getdbconnect(), $sql);
        header("Location: ../Pages/index.php");

    } else {
        header("Location: ../Pages/my-cart.php?ThereIsOldOrder=True");
    }

}

function getUserOrders()
{
    session_start();
    $userID = $_SESSION['userID'];
    $connect = new DbConnection();
    $sql = "SELECT orderID, adminApproved, orderState
            FROM `order`
            WHERE userID = '$userID'
            AND adminApproved = 'Yes'
            AND orderState = 'Not Shipped';";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}


