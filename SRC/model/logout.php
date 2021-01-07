<?php
// Make Sure That Session Has Been Started
logmeout();
function logmeout()
{
    session_start();
// Destroy Session and forwarding to Login page.
    session_destroy();
    header('Location: ../Pages/welcome-page-user.php');
}

