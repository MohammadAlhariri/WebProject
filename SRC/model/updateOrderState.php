<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
require_once("getOrderTotalPrice.php");

$connect = new DbConnection();
$userID = _SESSION['userID'];
$orderID = addslashes(strip_tags($_POST['orderID']));
$costumerName = addslashes(strip_tags($_POST['name']));
$customerPhone = addslashes(strip_tags($_POST['phone']));
$city = addslashes(strip_tags($_POST['city']));
$Address = addslashes(strip_tags($_POST['address']));
$totalPrice = getOrderTotalPricefn($orderID);
$NewOrder = getUserOrdres($userID);
if ($NewOrder == null || empty($NewOrder)) {

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

} else {
    header("Location: ../Pages/my-cart.php?ThereIsOldOrder=True");
}


function getUserOrdres($userID)
{
    $connect = new DbConnection();
    $sql = "SELECT orderID, adminApproved, orderState
            FROM `order`
            WHERE userID = 9
            AND adminApproved = 'Yes'
            AND orderState = 'Not Shipped'
";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}