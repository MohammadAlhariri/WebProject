<?php
$Parent = $_SESSION['Parent'];
if ($_SESSION['parent'] == 'Admins') {
    getFeedBacks();
}
header("Location: ../Pages/feedback.php?JustForAdmins");

function getFeedBacks()
{
    include("../dataSources/config/connectWithRemoteDB.php");
    $connect = new DbConnection();
    $sql = "SELECT * FROM `feedback`;";
    return mysqli_query($connect->getdbconnect(), $sql);
}