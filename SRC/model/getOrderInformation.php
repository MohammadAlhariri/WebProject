<?php
function getValues($orderID)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT * FROM `order`where `order`.`orderID`=$orderID;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);
    return $row;
}