<?php
$feedBackID = addslashes(strip_tags($_POST['feedbackID']));
$Parent = $_SESSION['Parent'];
if ($_SESSION['parent'] == 'Users') {
    getFeedBackResponse();
}
header("Location: ../Pages/feedback.php?JustForAdmins");

function getFeedBackResponse($feedBackID)
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT AdminRespond 
            FROM `feedback`
            WHERE `ID` = '$feedBackID';";
    return mysqli_query($connect->getdbconnect(), $sql);
}