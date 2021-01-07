<?php
function getProductsByCategory($category)
{
    $connect = new DbConnection();
    $sql = "SELECT * FROM `product`where `product`.`productCategory`='$category';";
    return mysqli_query($connect->getdbconnect(), $sql);
}