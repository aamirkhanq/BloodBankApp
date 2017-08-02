<?php
include("inc/connection.php");
if (isset($_COOKIE)) {
	if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		if ($_COOKIE["category"] == "Receiver") {
				$pageTitle = "Thanks";
				$state = "Logout";
				include("inc/header.php");
				echo "<h2>Thank You! We have received your request. The bank will respond shortly.</h2>";
				$db->query("delete from available_groups where hospital_id=$r and hospital_name=$p and blood_group=$q;")
		}
		
	} else {
		header("location:index.php");
	}
}
?>
</div>
</div>
