<?php

class DbConnection
{
    function getdbconnect()
    {
        $dbhost = 'remotemysql.com:3306';
        $dbuser = 'QABvWPJfmS';
        $dbpass = 'yxiloXAIAH';
        $dbname = 'QABvWPJfmS';

        $connect=mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)or die("Couldn't connect");
        return $connect;
    }
}

