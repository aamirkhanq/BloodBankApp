<?php
$pageTitle = "Welcome Page";
$state = "Login";

include("inc/functions.php");
LogoutHandler();
header("location:index.php");
?>
