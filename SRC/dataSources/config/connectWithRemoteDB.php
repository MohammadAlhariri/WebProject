<?php
$dbhost = 'remotemysql.com:3306';
$dbuser = 'QABvWPJfmS';
$dbpass = 'yxiloXAIAH';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($conn);
?>