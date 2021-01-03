<?php

require("../config/connectWithRemoteDB.php");
include("../../model/getSellerInformationByEmail.php");
$connect = new DbConnection();
$phone = addslashes(strip_tags($_POST['form-phone']));
$name = addslashes(strip_tags($_POST['form-full-name']));
$pass = addslashes(strip_tags($_POST['form-password']));
$email = addslashes(strip_tags($_POST['form-email']));
$address = addslashes(strip_tags($_POST['form-address']));
$sql = "INSERT INTO `seller`(`sellerName`, `sellerPhone`, `sellerEmail`, `sellerAddress`, `sellerPassword`)  VALUES ('$name',$phone,'$email','$address','$pass')";
$result = mysqli_query($connect->getdbconnect(), $sql);

if ($result) {
    session_start();
    // Session Variables are created
    getSellerInfo($email);
    header("Location: ../../Pages/index.php");
    // forward to Seller index here
} else {
    header("Location: ../../Pages/welcome-page-seller.php");
}
// done