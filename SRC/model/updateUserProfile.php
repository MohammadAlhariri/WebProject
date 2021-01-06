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

    updateUserProfile($Name, $Phone, $Email, $Address);

} else if ($Parent == 'seller') {

    updateSellerProfile($Name, $Phone, $Email, $Address);

}

function updateUserProfile($userName, $userPhone, $userEmail, $userAddress)
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
/*

            $target_dir = "uploads/userImage/";
            $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
//            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $image_no = date("Y&m&d&h&i&s");
            $newFileName = $image_no . '.' . $imageFileType;
            $uploadFileDir = '../uploads/userImage/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }*/
            $newPath=addPhoto();

            $sql = "UPDATE `user` SET `userName` = '$userName', `userPhone` = '$userPhone', `userEmail` = '$userEmail', `userAddress` = '$userAddress', `UserImage` = '$newPath'   WHERE `user`.`userID` = '$userID'";

        }

    }

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = mysqli_error($connect->getdbconnect());
    if ($result) {
        $msg = "Profile setting updated successfully";
        $intMsg = 1;
        getUserInfo($_SESSION["userPhone"]);
        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        $msg = mysqli_error($connect->getdbconnect());

    }

    mysqli_close($connect->getdbconnect());

}


function updateSellerProfile($sellerName, $sellerPhone, $sellerEmail, $sellerAddress)
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

            $target_dir = "uploads/useImg/";
            $target_file = $target_dir . basename($_FILES["fileInput"]["name"]);
//            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $image_no = date("Y&m&d&h&i&s");
            $newFileName = $image_no . '.' . $imageFileType;
            $uploadFileDir = '../uploads/userImage/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($dest_path, $dest_path)) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }

            $sql = "UPDATE `seller` SET `sellername` = '$sellerName', `sellerPhone` = '$sellerPhone', `sellerEmail` = '$sellerEmail', `sellerAddress` = '$sellerAddress', `sellerImage` = '$dest_path'   WHERE `seller`.`sellerID` = '$sellerID'";

        }


    }

    $result = mysqli_query($connect->getdbconnect(), $sql);
    $msg = mysqli_error($connect->getdbconnect());
    if ($result) {
        $msg = "Profile setting updated successfully";
        $intMsg = 1;
        getUserInfo($_SESSION["sellerEmail"]);
        header("Location: ../Pages/setting.php?msg=$intMsg");
    } else {
        $intMsg = -1;
        header("Location: ../Pages/setting.php?msg=$intMsg");
        $msg = mysqli_error($connect->getdbconnect());

    }

    mysqli_close($connect->getdbconnect());

}


function addPhoto(){

    if(isset($_FILES['fileInput'])){
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $array = explode('.', $_FILES['image']['name']);
        $file_ext=strtolower(end($array));
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

/*        if($file_size > 2097152){
            $errors[]='File size must be excately 2 MB';
        }*/

        if(empty($errors)==true){
            $path="uploads/userImage/".$file_name;
            move_uploaded_file($file_tmp,$path);
            return $path ;
        }else{
            return 3;
        }
    }

}function getUserInfo($phone)
{
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