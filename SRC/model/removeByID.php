<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$productID = addslashes(strip_tags($_POST['id']));

removeByIDfn($productID);

function removeByIDfn($productID)
{
    $date = getdate();
    $connect = new DbConnection();
    $sql = "DELETE FROM `product` WHERE `product`.`productID` = '$productID';";
    mysqli_query($connect->getdbconnect(), $sql);
    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = "";
    if ($result) {
        // echo "Product Deleted";
        $msg = 1;
    } else {
        // echo mysqli_error($connect->getdbconnect());
        $msg = 2;
    }
    if ($_SESSION["parent"] == "seller") {
        header("Location: ../Pages/seller-products.php?msg=$msg");
    } else {
        header("Location: ../Pages/admin-approve-products.php");
    }
    mysqli_close($connect->getdbconnect());

    /*
        $productID = addslashes(strip_tags($_POST['id'])); // In post request Id must be Rename
        $connect = new DbConnection();
        $sql = "DELETE FROM `product` WHERE `product`.`productID` = '$productID';";
        mysqli_query($connect->getdbconnect(), $sql);
        return mysqli_query($connect->getdbconnect(), $sql);*/

}