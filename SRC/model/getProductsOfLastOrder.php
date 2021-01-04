<?php
include("../dataSources/config/connectWithRemoteDB.php");
function getProductsByOrder()
{

    $oid = getLastOrderByUserIDfn();
    $connect = new DbConnection();
    $sql = "SELECT `product`.*,`order`.`orderTotal`,`order_content`.`quantity`,`order_content`.`price` ,`order`.orderID 
    FROM `product`,`order`,`order_content` 
    WHERE `product`.`productID`=`order_content`.`productID`
    AND `order_content`.orderID=`order`.orderID 
    AND `order`.`orderID`=$oid
    AND `order_content`.`orderID`=$oid;";
    $result= mysqli_query($connect->getdbconnect(), $sql);
    return $result;
}

function getLastOrderByUserIDfn()
{
    $userID = $_SESSION["userID"];
    $connect = new DbConnection();
    $sql = "SELECT `orderID` FROM `order` where `userID` = '$userID' AND `orderState` = 'Not Shipped' AND `adminApproved` = 'No' ORDER BY `orderID` DESC LIMIT 1;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);

    return $row["orderID"];
}