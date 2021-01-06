<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$Parent = $_SESSION['parent'];
$Name = addslashes(strip_tags($_POST['name']));
$Phone = addslashes(strip_tags($_POST['phone']));
$Email = addslashes(strip_tags($_POST['email']));
$Address = addslashes(strip_tags($_POST['address']));
$fileTmpPath = $_FILES['fileInput']['tmp_name'];

if ($Parent == 'Users' || $Parent == 'Admins') {

    updateUserProfile($Name, $Phone, $Email, $Address, $fileTmpPath);

} else if ($Parent == 'seller') {

    updateSellerProfile($Name, $Phone, $Email, $Address, $fileTmpPath);

}

function updateUserProfile($userName, $userPhone, $userEmail, $userAddress, $fileTmpPath)
{
    $connect = new DbConnection();
    $userID = $_SESSION['userID'];

    //Check for new Image
    if (!file_exists($_FILES['fileInput']['tmp_name']) || !is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
        // without update image;
        $sql = "UPDATE `user` SET `userName` = '$userName', `userPhone` = '$userPhone', `userEmail` = '$userEmail', `userAddress` = '$userAddress',   WHERE `user`.`userID` = '$userID'";
    } else {
        // with update image;
        if (isset($_POST["submit"])) {

            echo "if image post";
            $image_no = date("Y&m&d&h&i&s");
            $target_dir = "uploads/useImg/";
            $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $newFileName = $image_no . '.' . $imageFileType;
            $uploadFileDir = '../uploads/useImg';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            $image_no = date("Y&m&d&h&i&s");//or Anything You Need
            $path = "uploads/useImg/" . $image_no . ".jpg";
            $sql = "UPDATE `user` SET `userName` = '$userName', `userPhone` = '$userPhone', `userEmail` = '$userEmail', `userAddress` = '$userAddress', `UserImage` = '$path'   WHERE `user`.`userID` = '$userID'";

        }

    }

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = mysqli_error($connect->getdbconnect());
    if ($result) {
        $msg = "Profile setting updated successfully";
        $intMsg = 1;

        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        $msg = mysqli_error($connect->getdbconnect());

    }

    mysqli_close($connect->getdbconnect());

}


function updateSellerProfile($sellerName, $sellerPhone, $sellerEmail, $sellerAddress, $fileTmpPath)
{
    $connect = new DbConnection();
    $sellerID = $_SESSION['userID'];

    //Check for new Image
    if (!file_exists($_FILES['fileInput']['tmp_name']) || !is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
        // without update image;
        $sql = "UPDATE `seller` SET `sellerName` = '$sellerName', `sellerPhone` = '$sellerPhone', `sellerEmail` = '$sellerEmail', `sellerAddress` = '$sellerAddress',   WHERE `seller`.`sellerID` = '$sellerID'";
    } else {
        // with update image;
        if (isset($_POST["submit"])) {

            echo "if image post";
            $image_no = date("Y&m&d&h&i&s");
            $target_dir = "uploads/useImg/";
            $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $newFileName = $image_no . '.' . $imageFileType;
            $uploadFileDir = '../uploads/useImg';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            $image_no = date("Y&m&d&h&i&s");//or Anything You Need
            $path = "uploads/useImg/" . $image_no . ".jpg";
            $sql = "UPDATE `seller` SET `sellername` = '$sellerName', `sellerPhone` = '$sellerPhone', `sellerEmail` = '$sellerEmail', `sellerAddress` = '$sellerAddress', `sellerImage` = '$path'   WHERE `seller`.`sellerID` = '$sellerID'";

        }

    }

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = mysqli_error($connect->getdbconnect());
    if ($result) {
        $msg = "Profile setting updated successfully";
        $intMsg = 1;

        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        $msg = mysqli_error($connect->getdbconnect());

    }

    mysqli_close($connect->getdbconnect());

}
