<?php
function getValues($id)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();

    $sql = "SELECT * FROM `product`where `product`.`productID`=$id;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $row = mysqli_fetch_array($result);

return $row;
}