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
    $msg = "Empty msg";
    $intMsg = "";
    if ($result) {
        $msg = "Security Answer updated successfully";
        $intMsg = "1";
        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        echo $msg = "Something wrong!";
        $intMsg = "-1";
        header("Location: ../Pages/setting.php?msg=$intMsg");
    }
    mysqli_close($connect->getdbconnect());
}