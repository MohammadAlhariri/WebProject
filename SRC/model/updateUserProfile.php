<?php
require_once("../dataSources/config/connectWithRemoteDB.php");
session_start();
$connect = new DbConnection();
$userID = $_SESSION['userID'];
$userParent = $_SESSION['parent'];
$userName = addslashes(strip_tags($_POST['name']));
$userPhone = addslashes(strip_tags($_POST['phone']));
$userEmail = addslashes(strip_tags($_POST['email']));
$userAddress = addslashes(strip_tags($_POST['address']));
$sql = "";
//Check for new Image
$fileTmpPath = $_FILES['fileInput']['tmp_name'];

if (!file_exists($_FILES['fileInput']['tmp_name']) || !is_uploaded_file($_FILES['fileInput']['tmp_name'])) {

    // without update image;
    $sql = "UPDATE `user` SET `userName` = '$userName', `userPhone` = '$userPhone', `userEmail` = '$userEmail', `userAddress` = '$userAddress',   WHERE `user`.`userID` = '$userID'";

} else {

    // with update image;

    if (isset($_POST["submit"])) {

        echo "if image post";
        $image_no = date("Y&m&d&h&i&s");
        $target_dir = "uploads/useImg";
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
    $msg = 1;
    header("Location: ../Pages/profile-setting.php?msg=$msg");
} else {
    $msg = 1;
    header("Location: ../Pages/profile-setting.php?msg=$msg");
    $msg = mysqli_error($connect->getdbconnect());

}

mysqli_close($connect->getdbconnect());

// header("Location: ../Pages/user-profile.php?msg=$msg");
// must forwarding to user Setting profile
