<?php
$pageTitle = "Welcome Page";
$state = "Login";
include("inc/connection.php");

if (isset($_COOKIE)) {
	if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		if ($_COOKIE["user_id"] != "" && $_COOKIE["category"] != "") {
			$state = "Logout";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$hospital_id = $_COOKIE["user_id"];
				$name = $_POST["bloodgroup"];
				$db->query("insert into blood_groups (name, hospital_id) values ('$name', '$hospital_id')");
				header("location:index.php");
			}
		}
	} 
}

include("inc/header.php");
if (isset($_COOKIE)) {
	if (array_key_exists("user_id", $_COOKIE) && array_key_exists("category", $_COOKIE)) {
		if ($_COOKIE["category"] == "Hospital") {
?>
<div class="form">
	<form method="post">
		<table>
			<tr>
				<th>
					<label for="name">Select blood group</label>
				</th>
				<td>
					<select name="bloodgroup" id="name">
						<option>A1 -ve</option>
						<option>A1 +ve</option>
						<option>A1B -ve</option>
						<option>A1B +ve</option>
						<option>A2 -ve</option>
						<option>A2 +ve</option>
						<option>A2B -ve</option>
						<option>A2B +ve</option>
						<option>B -ve</option>
						<option>B +ve</option>
						<option>B1 +ve</option>
						<option>O -ve</option>
						<option>O +ve</option>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" value="Submit">
	</form>
</div>
<?php
		}
	} else {
		var_dump("Hello");
		header("location:index.php");
	}
}
?>
</div>
</div>