<?php
function getValues($sid)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();

    $sql = "SELECT * FROM `product`where sellerID = '$sid'";
    return mysqli_query($connect->getdbconnect(), $sql);
}