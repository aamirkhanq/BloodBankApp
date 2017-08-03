<?php
$pageTitle = "Requests for you";

include("inc/connection.php");
$results = $db->query("select * from requests");
$results = $results->fetchAll();
//var_dump($results);
$state = "Login";
//var_dump($_COOKIE);
if (isset($_COOKIE)) {
	if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		if ($_COOKIE["user_id"] != "" && $_COOKIE["category"] != "") {
			$state = "Logout";
		}
	} 
} 
include("inc/header.php");
?>
<div class="table">
	<table>
	<?php
		$count = 0;
		foreach($results as $item) {
			if ($item['hospital_id'] == $_COOKIE['user_id']) {
				$name = $item["name"];
				
				$sample = $item["sample"];
				
				$username = $item["username"];

				$hospital_id = $item["hospital_id"];

				if ($hospital_id == $_COOKIE["user_id"]) {
					$count = $count + 1;
					echo "<tr><td>" 
					     . $name 
					     . "</td>"
					     . "<td>"
					     . $username
					     . "</td><td>"
					     . $sample
					     . "</td></tr>";
				}
			}
		}
		if ($count == 0) {
			echo "<h2>Sorry, you do not have any requests!</h2>";
		}
		
	?>
	</table>
<div>
</div>
</div>
