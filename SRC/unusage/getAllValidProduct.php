<?php
function getAllValidProducts()
{
    require_once("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT * FROM `product`where `productState` = 'Validate'";
    return mysqli_query($connect->getdbconnect(), $sql);
}