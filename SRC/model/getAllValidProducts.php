<?php
function getAllProducts()
{
    require_once("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT * FROM `product`where `product`.`productState` = 'Validate'";
    return mysqli_query($connect->getdbconnect(), $sql);
}