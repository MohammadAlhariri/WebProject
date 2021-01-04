<?php
require_once("../dataSources/config/connectWithRemoteDB.php");

function getOrderTotalPricefn($orderID)
{
    $connect = new DbConnection();
    /*$sql = "SELECT *,
           (
               SELECT SUM(order_content.quantity * order_content.price)
               FROM order_content
               WHERE orderID = $orderID
                 AND productID = productID
           ) AS totalAmount
    FROM order_content
    WHERE orderID = $orderID;";*/ // first SQL
    $sql = "SELECT SUM(order_content.quantity * order_content.price) as 'total'
               FROM order_content
               WHERE orderID = $orderID;";

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    return $row['total'];
}