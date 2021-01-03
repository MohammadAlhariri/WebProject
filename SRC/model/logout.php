<?php
session_start();

session_destroy();
header('Location: ../Pages/welcome-page-user.php');