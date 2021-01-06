<?php

require_once("../dataSources/config/connectWithRemoteDB.php");
//include("../model/insOFConnect.php");
session_start();

$Parent = $_SESSION['parent'];
$Name = addslashes(strip_tags($_POST['name']));
$Phone = addslashes(strip_tags($_POST['phone'])); // for seller
$Email = addslashes(strip_tags($_POST['email'])); // for user
$Address = addslashes(strip_tags($_POST['address']));
$fileTmpPath = $_FILES['fileInput']['tmp_name'];


if ($Parent == 'Users' || $Parent == 'Admins') {

    updateUserProfile($Name, $Email, $Address, $fileTmpPath);

} else if ($Parent == 'seller') {

    updateSellerProfile($Name, $Phone, $Address, $fileTmpPath);

}

function updateUserProfile($userName, $userEmail, $userAddress, $fileTmpPath)
{
    $connect = new DbConnection();
    $userID = $_SESSION['userID'];
    $userPhone = $_SESSION['userPhone'];

    //Check for new Image
    if (!file_exists($_FILES['fileInput']['tmp_name']) || !is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
        // without update image;
        $sql = "UPDATE `user`
                SET `userName`    = '$userName',
                    `userEmail`   = '$userEmail',
                    `userAddress` = '$userAddress'
                WHERE user.userPhone = '$userPhone'
                  AND user.userID = '$userID';";
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
            $uploadFileDir = '../uploads/useImg/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            //$image_no = date("Y&m&d&h&i&s");//or Anything You Need
            // $path = "uploads/useImg/" . $image_no . ".jpg";
            $sql = "UPDATE `user` 
                        SET `userName` = '$userName',
                            `userEmail` = '$userEmail',
                            `userAddress` = '$userAddress',
                            `UserImage` = '$dest_path'
                        WHERE user.userID = '$userID';";
        }
    }

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = mysqli_error($connect->getdbconnect());
    if ($result) {
        $msg = "Profile setting updated successfully";
        reloadUserInformation($_SESSION["userPhone"]);
        $intMsg = 1;

        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        $msg = mysqli_error($connect->getdbconnect());

    }

    mysqli_close($connect->getdbconnect());

}

function updateSellerProfile($sellerName, $sellerPhone, $sellerAddress, $fileTmpPath)
{
    $connect = new DbConnection();
    $sellerID = $_SESSION['sellerID'];
    $sellerEmail = $_SESSION['sellerEmail'];

    //Check for new Image
    if (!file_exists($_FILES['fileInput']['tmp_name']) || !is_uploaded_file($_FILES['fileInput']['tmp_name'])) {
        // without update image;
        $sql = "UPDATE `seller`
                SET `sellerName`    = '$sellerName',
                    `sellerPhone`   = '$sellerPhone',
                    `sellerAddress` = '$sellerAddress'
                WHERE seller.sellerID = '$sellerID' AND sellerEmail = '$sellerEmail';";
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
            $uploadFileDir = '../uploads/useImg/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            //$image_no = date("Y&m&d&h&i&s");//or Anything You Need
            // $path = "uploads/useImg/" . $image_no . ".jpg";
            $sql = "UPDATE `seller`
                SET `sellerName`    = '$sellerName',
                    `sellerPhone`   = '$sellerPhone',
                    `sellerAddress` = '$sellerAddress',
                    `sellerImage` = '$dest_path'
                WHERE seller.sellerID = '$sellerID';";
        }
    }

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = mysqli_error($connect->getdbconnect());
    if ($result) {
        $msg = "Profile setting updated successfully";
        $intMsg = 1;
        reloadSellerInformation($sellerEmail);
        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        $msg = mysqli_error($connect->getdbconnect());

    }

    mysqli_close($connect->getdbconnect());

}

function reloadUserInformation($phone)
{
    session_reset();
    $connect = new DbConnection();
    $sql = "SELECT * FROM `user` WHERE `userPhone`='$phone';";
    $result = mysqli_query($connect->getdbconnect(), $sql);
    if ($result) {
        $rows = mysqli_fetch_array($result);
        $_SESSION["userID"] = $rows["userID"];
        $_SESSION["userName"] = $rows["userName"];
        $_SESSION["userPhone"] = $rows["userPhone"];
        $_SESSION["userEmail"] = $rows["userEmail"];
        $_SESSION["userImage"] = $rows["userImage"];
        $_SESSION["userAddress"] = $rows["userAddress"];
        $_SESSION["parent"] = $rows["parent"];
        $_SESSION["login_time_stamp"] = time();
    }
}

function reloadSellerInformation($email)
{
    $connect = new DbConnection();
    $sql = "SELECT * FROM `seller` WHERE `sellerEmail`='$email';";
    $result = mysqli_query($connect->getdbconnect(), $sql);

    if ($result) {
        $rows = mysqli_fetch_array($result);
        $_SESSION["sellerID"] = $rows["sellerID"];
        $_SESSION["sellerName"] = $rows["sellerName"];
        $_SESSION["sellerPhone"] = $rows["sellerPhone"];
        $_SESSION["sellerEmail"] = $rows["sellerEmail"];
        $_SESSION["sellerImage"] = $rows["sellerImage"];
        $_SESSION["sellerAddress"] = $rows["sellerAddress"];
        $_SESSION["parent"] = "seller";
        $_SESSION["login_time_stamp"] = time();
    }
}