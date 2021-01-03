<?php
require("../config/connectWithRemoteDB.php");
include("../../model/getSellerInformationByEmail.php");
$email = addslashes(strip_tags($_POST['form-email']));
$password = addslashes(strip_tags($_POST['form-password']));
// $parent = addslashes(strip_tags($_POST['parent']));
$connect = new DbConnection();
$sql = "SELECT * FROM `seller` WHERE  `sellerEmail`='$email';";
if ($result = mysqli_query($connect->getdbconnect(), $sql)) {
    $row = mysqli_fetch_array($result);
    if (!empty($row)) {
        if ($row["sellerPassword"] == $password) {
            getSellerInfo($email);
            header("Location: ../../Pages/index.php");
        } else {

            header("Location: ../../Pages/welcome-page-seller.php?msg=1");
            // password Wrong
        }
    } else {
        header("Location: ../../Pages/welcome-page-seller.php?msg=2");
//            user not found
    }
}