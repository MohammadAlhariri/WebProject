<?php
require_once("../dataSources/config/connectWithRemoteDB.php");

//$Parent = $_SESSION['Parent'];
//if ($_SESSION['parent'] == 'Admins') {
    getFeedBacks();
//}

function getFeedBacks()
{
    $connect = new DbConnection();
    $sql = "SELECT * FROM `feedback`;";
    return mysqli_query($connect->getdbconnect(), $sql);
}