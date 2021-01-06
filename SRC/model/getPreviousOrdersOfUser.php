<?php
function getOrdersByUserID($userID)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT *  
            FROM `order` 
            WHERE  `order`.userID='$userID'";
    return mysqli_query($connect->getdbconnect(), $sql);
}