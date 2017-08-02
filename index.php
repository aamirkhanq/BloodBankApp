<?php
$pageTitle = "Welcome Page";

include("inc/connection.php");
$results = $db->query("select * from available_groups");
$results = $results->fetchAll();
$state = "Login";
var_dump($_COOKIE);
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
		foreach($results as $item) {
			$hospital_name = $item["hospital_name"];
			//Replace any occurence of white space by an underscore
			$hospital_name = preg_replace('/\s+/', '_', $hospital_name);

			$blood_group = $item["blood_group"];
			//Replace any occurence of white space by an underscore
			$blood_group = preg_replace('/\s+/', '_', $blood_group);

			$link = "<a href=requests.php?p=$hospital_name&q=$blood_group>Request Sample</a>";
			echo "<tr><td>" 
			     . $item["hospital_name"] 
			     . "</td>"
			     . "<td>"
			     . $item["blood_group"]
			     . "</td><td>"
			     . $link;
		}
	?>
	</table>
<div>
</div>
</div>

