<?php
session_start();
require_once("../config/connectWithRemoteDB.php");
$connect = new DbConnection();
$uid = addslashes(strip_tags($_POST['uid']));
$pid = addslashes(strip_tags($_POST['pid']));
$price = addslashes(strip_tags($_POST['price']));
$quantity = addslashes(strip_tags($_POST['quantity']));
//----------------------
$sql="SELECT * FROM `order` WHERE userID=$uid ORDER BY orderID DESC LIMIT 1;";
$result = mysqli_query($connect->getdbconnect(), $sql);
//----------------------

$row=mysqli_fetch_array($result);

if(empty($row)||$row["orderState"]=="Shipped"){
    $addoder = "INSERT INTO `order`(`orderDate`, `userID`, `orderTotal`, `orderState`) VALUES (NOW(),$uid,500,'Not Shipped');";
    mysqli_query($connect->getdbconnect(),$addoder);
    $orderid=getOrderId($uid);
    insertToOrderContent($orderid,$pid,$quantity,$price);
    echo mysqli_error($connect->getdbconnect());
    header("Location: ../Pages/index.php");

}
else if($row["orderState"]=="Not Shipped"){
    $userid=getOrderId($uid);
    insertToOrderContent($userid,$pid,$quantity,$price);
    header("Location: ../Pages/index.php");
}

function getOrderId($uid){
    $connect = new DbConnection();
    $sql1="SELECT * FROM `order` WHERE userID=$uid  AND orderState='Not Shipped';";
    $res=mysqli_query($connect->getdbconnect(),$sql1);
    $r=mysqli_fetch_array($res);
    return $r["orderID"];
}

function insertToOrderContent($uid,$pid,$quantity,$price){
    $connect = new DbConnection();
    $sql2 = "INSERT INTO `order_content`(`orderID`, `productID`, `quantity`, `price`)
     VALUES ('$uid','$pid','$quantity','$price');";
    mysqli_query($connect->getdbconnect(),$sql2);
    echo mysqli_error($connect->getdbconnect());
    echo "Record Added";

}
