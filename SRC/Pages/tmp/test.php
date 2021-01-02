<?php
$url = "https://ecommerceliu.000webhostapp.com/eCommerceLIU/getOrders.php";
include("config/Connection.php");
$com = new Connection($url);
$res = $com->getJsonUsingPOST($url);

echo $res[0];

