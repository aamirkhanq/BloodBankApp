<?php
include("inc/connection.php");
if(isset($_COOKIE)) {
	//if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		if ($_COOKIE["user_id"] == "" && $_COOKIE["category"] == "") {
				$pageTitle = "Thanks";
				$state = "Logout";
				//include("inc/header.php");
				//include("inc/connection.php");
				//include("inc/functions.php");
				header("location:Login.php");
		} elseif ($_COOKIE["category"] == "Hospital") {	
			$pageTitle = "Thanks";
			$state = "Logout";
			include("inc/header.php");	
			echo "<h2>Hospitals cannot request for blood! You must be a receiver.</h2>";
		} elseif ($_COOKIE["category"] == "Receiver") {
			$pageTitle = "Thanks";
			$state = "Logout";
			include("inc/header.php");
			$id = intval($_GET['r']);
			var_dump("delete from blood_groups where hospital_id=".$_GET['r']." and name='".$_GET['q']."';");
			$db->query("delete from blood_groups where hospital_id='".$_GET['r']."'' and name='".$_GET['q']."';");
			echo "<h2>Thank You for your request. The hospital will process your request shortly.</h2>";
			var_dump($_GET['p']);
			var_dump($_GET['q']);
			var_dump($_GET['r']);
		}
	//}
} else {
	header("location:Login.php");
}
?>
