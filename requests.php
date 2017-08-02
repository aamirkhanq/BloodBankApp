<?php
if(isset($_COOKIE)) {
	//if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		if ($_COOKIE["user_id"] == "" && $_COOKIE["category"] == "") {
				$pageTitle = "Thanks";
				$state = "Logout";
				//include("inc/header.php");
				//include("inc/connection.php");
				//include("inc/functions.php");
				header("location:Login.php");
		} else {		
			header("location:thankyou.php");
		}
	//}
} else {
	header("location:Login.php");
}
?>
