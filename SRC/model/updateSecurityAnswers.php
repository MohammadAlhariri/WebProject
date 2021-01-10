<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$answer1 = addslashes(strip_tags($_POST['answer1']));
$answer2 = addslashes(strip_tags($_POST['answer2']));

updateSecurityAnswers($answer1, $answer2);

function updateSecurityAnswers($answer1, $answer2)
{
    $connect = new DbConnection();
    $userID = $_SESSION['userID'];
    $sql = "UPDATE `user` 
        SET `userAnswer1` = '$answer1',
            `userAnswer2` = '$answer2' 
        WHERE  `user`.`userID` = '$userID' ;";

    $result = mysqli_query($connect->getdbconnect(), $sql);

    if ($result) {
        echo "Security Answer Updated Successfully";

    } else {
        echo "Something wrong!";

    }
    mysqli_close($connect->getdbconnect());
}