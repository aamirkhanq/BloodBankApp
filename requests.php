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

			$h_id = $_GET['r'];
			$sample = $_GET['q'];
			$sql2 = "select * from receivers where id='" . $_COOKIE["user_id"] . "'";
			$result = $db->query($sql2);
			$result = $result->fetchAll();
			$n = $result[0]['name'];
			$un = $result[0]['username'];
			$bg = $result[0]['blood_group'];
			$requested_bg = $_GET['q'];

			$requested_bg = preg_replace('[_]', ' ', $requested_bg);
			$requested_bg = preg_replace('[%]', '+', $requested_bg);
			//var_dump($requested_bg);
			//var_dump($bg);
			//die();
			//var_dump($bg == $requested_bg);
			//die();
			if ($bg == $requested_bg) {
				$sql1 = "delete from blood_groups where hospital_id=".$_GET['r']." and name='".$requested_bg."';";
				//var_dump($sql1);
				$db->query($sql1);
						
				//var_dump($result);
				//var_dump($n);
				//var_dump($un);
				//var_dump($bg);
				//die();
				$sql3 = "insert into requests (name, username, sample, hospital_id) values ('$n', '$un', '$requested_bg', '$h_id');";
				//var_dump($sql3);
				$db->query($sql3);
				echo "<h2>Thank You for your request. The hospital will process your request shortly.</h2>";
				//var_dump($_GET['p']);
				//var_dump($_GET['q']);
				//var_dump($_GET['r']);
			} else {
				//var_dump($bg);
				//var_dump($_GET["q"]);
				echo "<h2>You are not eligible to request for this sample. You can only request for " . $bg . " samples.</h2>";
			}
		}
	//}
} else {
	header("location:Login.php");
}
?>
