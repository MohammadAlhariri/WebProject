<?php
    $name = addslashes(strip_tags($_POST['name']));
    $phone = addslashes(strip_tags($_POST['phone']));
    $city = addslashes(strip_tags($_POST['city']));
    $address = addslashes(strip_tags($_POST['address']));
    $uid=addslashes(strip_tags($_POST['uid']));



include "connection.php";

$sql = "UPDATE `order` SET `orderTotal` = '440', `customerName` = '$name', `customerAddress` = '$address', `customerPhone` = $phone , `customerCity` = '$city' ,`adminApproved`='Yes' WHERE `order`.`userID` = $uid;";
mysqli_query($con,$sql);
echo mysqli_error($con);

echo "your order will be send soon";
   
mysqli_close($con);
?> 					

