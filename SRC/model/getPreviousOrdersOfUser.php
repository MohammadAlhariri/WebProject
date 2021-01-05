<?php
function getOrdersByUserID($uid)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT *  FROM `order` where  `order`.userID='$uid'";
    return mysqli_query($connect->getdbconnect(), $sql);
}