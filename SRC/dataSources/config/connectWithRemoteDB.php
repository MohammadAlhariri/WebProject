<?php
$dbhost = 'remotemysql.com:3306';
$dbuser = 'QABvWPJfmS';
$dbpass = 'yxiloXAIAH';
$dbname = 'QABvWPJfmS';

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/*if (!$connect) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';*/