<?php
if (isset($_COOKIE)) {
	//if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		/*if ($_COOKIE["user_id"] == "" && $_COOKIE["category"] == "") {

			

		}	*/		
		if ($_COOKIE["category"] == "Hospital") {
				$pageTitle = "Thanks";
				$state = "Logout";
				include("inc/header.php");
				echo "<h2>Thank You! We have received your request. The bank will respond shortly.</h2>";
		}
		
	/*}*/ else {
		header("location:index.php");
	}
}
?>
</div>
</div>
