<?php
require_once("../dataSources/config/connectWithRemoteDB.php");

function getOrderTotalPrice($orderID)
{
    $connect = new DbConnection();

    $sql = "SELECT SUM(order_content.quantity * order_content.price) as 'total'
               FROM order_content
               WHERE orderID = $orderID;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    return $row['total'];
}