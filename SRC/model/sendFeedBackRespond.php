<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
$feedBackID = addslashes(strip_tags($_POST['feedbackID']));
$adminRespond = addslashes(strip_tags($_POST['respond']));
sendFeedBackRespond($feedBackID, $adminRespond);
header("Location: ../Pages/feedback.php");

function sendFeedBackRespond($feedBackID, $adminRespond)
{
    $connect = new DbConnection();
    $sql = "UPDATE `feedback`
            SET `AdminRespond` = '$adminRespond',
                `CaseState`    = 'closecase'
            WHERE `ID` = '$feedBackID';";
    mysqli_query($connect->getdbconnect(), $sql);
    header("Location: ../Pages/contact.php?respondDone");
}