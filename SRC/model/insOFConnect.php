<?php
require("../dataSources/config/connectWithRemoteDB.php");
session_start();
$Connection = new connectWithRemoteDB();
$Connection->getdbconnect();