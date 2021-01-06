<?php
function getValues($productID)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT * 
            FROM `product`
            WHERE `product`.`productID`='$productID';";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    return mysqli_fetch_array($result);
}