<?php

$intUserID = isset($_SESSION['intUserID'])? $_SESSION['intUserID'] : "";
$nvUserRole = isset($_SESSION['nvUserRole'])? $_SESSION['nvUserRole'] : "";
$nvUsername = isset($_SESSION['nvUsername'])? $_SESSION['nvUsername'] : "";

if(empty($intUserID))
{
    $_SESSION['MSG'] = "You need to log in first";
    header("Location:./login.php");
    exit;
}
?>