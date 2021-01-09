<?php

require_once("../dataSources/config/connectWithRemoteDB.php");
$ContactNumber = $_SESSION['userID'];
$ContactName = $_SESSION['userName'];
$Parent = $_SESSION['Parent'];
$Subject = addslashes(strip_tags($_POST['subject']));
$Message = addslashes(strip_tags($_POST['message']));
$customerPhone = addslashes(strip_tags($_POST['phone']));
if ($Parent == 'Users') {
    sendFeedBackMsg($ContactNumber, $Subject, $Message, $ContactName);
}

header("Location: ../Pages/feedback.php?JustForUsers");

function sendFeedBackMsg($ContactNumber, $Subject, $Message, $ContactName)
{
    $connect = new DbConnection();
    $sql = "INSERT INTO `feedback` 
        SET `Contact_number` = '$ContactNumber',
            `Subject` = '$Subject',
            `Message` = '$Message',
            `Contact_name` = '$ContactName';";
    mysqli_query($connect->getdbconnect(), $sql);
    header("Location: ../Pages/contact.php?MSGSanded");
}