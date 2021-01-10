<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
function getOrdersNotShipped()
{
    $connect = new DbConnection();

    $sql = "SELECT * FROM `order` WHERE `order`.`orderState`='Not Shipped' AND adminApproved='Yes';";

  $result = mysqli_query($connect->getdbconnect(), $sql);
  return $result;



}