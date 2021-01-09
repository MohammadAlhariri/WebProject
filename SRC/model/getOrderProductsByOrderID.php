<?php

function getProductsByOrder($oid)
{

    $connect = new DbConnection();

    $sql = "SELECT `product`.*,`order`.`orderTotal`,`order_content`.`quantity`,`order_content`.`price` 
    FROM `product`,`order`,`order_content` 
    WHERE `product`.`productID`=`order_content`.`productID`
    AND `order`.`orderID`='$oid'
    AND `order_content`.`orderID`=$oid;";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    return $result;





}