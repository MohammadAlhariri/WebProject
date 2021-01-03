<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$name = addslashes(strip_tags($_POST['name']));
$des = addslashes(strip_tags($_POST['description']));
$price = addslashes(strip_tags($_POST['price']));
$category = addslashes(strip_tags($_POST['category']));
$sid = $_SESSION['sellerID'];
$productID = addslashes(strip_tags($_POST['productID']));
// Connect
$date = getdate();
$connect = new DbConnection();
$sql = "";
//Check for new Image
$fileTmpPath = $_FILES['fileInput']['tmp_name'];

if (!file_exists($_FILES['fileInput']['tmp_name']) || !is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
    echo "else without update image";

    $sql = "UPDATE `product` SET `productName` = '$name', `productDescription` = '$des', `productPrice` = $price, `productCategory` = '$category'  WHERE `product`.`productID` = '$productID'";

} else
    {

        echo "if image";


        if (isset($_POST["submit"])) {

            echo "if image post";
            $image_no = date("Y&m&d&h&i&s");
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
            $newFileName = $image_no . '.' . $imageFileType;
            $uploadFileDir = '../uploads/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;}

            $image_no = date("Y&m&d&h&i&s");//or Anything You Need
            $path = "uploads/" . $image_no . ".jpg";

            $sql = "UPDATE `product` SET `productName` = '$name', `productDescription` = '$des', `productPrice` = $price, `productCategory` = '$category', `productImage` = '$path'   WHERE `product`.`productID` = '$productID'";


        }

    }

$result = mysqli_query($connect->getdbconnect(), $sql);
$msg = mysqli_error($connect->getdbconnect());
if ($result) {
    //echo "Record Added";
    $msg = 1;
} else {
    $msg = mysqli_error($connect->getdbconnect());

}

mysqli_close($connect->getdbconnect());
header("Location: ../Pages/seller-products.php?msg=$msg");