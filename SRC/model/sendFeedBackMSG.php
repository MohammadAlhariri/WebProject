<?php

require_once("../dataSources/config/connectWithRemoteDB.php");
$Contact_name = addslashes(strip_tags($_POST['name']));
$Subject = addslashes(strip_tags($_POST['subject']));
$Message = addslashes(strip_tags($_POST['message']));
$customerPhone = addslashes(strip_tags($_POST['phone']));
sendFeedBackMsg($customerPhone, $Subject, $Message, $Contact_name);
function sendFeedBackMsg($ContactNumber, $Subject, $Message, $ContactName)
{
    $connect = new DbConnection();
    $sql = "INSERT INTO `feedback` 
        SET `Contact_number` = '$ContactNumber',
            `Subject` = '$Subject',
            `Message` = '$Message',
            `Contact_name` = '$ContactName';";
    mysqli_query($connect->getdbconnect(), $sql);
    header("Location: ../Pages/contact.php?MSGSanded".mysqli_error($connect));
}