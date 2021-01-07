<?php

function getValues()
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT * FROM `product`where `productState` = 'Not Validate'";
    mysqli_close($connect->getdbconnect());
    return mysqli_query($connect->getdbconnect(), $sql);
}

