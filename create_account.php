<?php
$pageTitle = "Signup Page";
$state = "Login";
include("inc/header.php");
include("inc/connection.php");
include("inc/functions.php");


$err = array(
	"username" => "",
	"password" => "",
	"name" => ""
);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	if (array_key_exists("bloodgroup", $_POST)) {
		$err=create_account($db, $_POST["name"], $_POST["username"], $_POST["password"], $_POST["bloodgroup"], "Receiver");
	} else {
		$err=create_account($db, $_POST["name"], $_POST["username"], $_POST["password"], "", "Hospital");
	}
	if ($err["username"]=="" && $err["password"]=="" && $err["name"]==""){
		header("location:index.php");
	} else {
		header("location:create_account.php?q=".strtolower($_POST[category]));
	}
}

if (isset($_GET)) {
	if ($_GET["q"]=="hospitals") {
?>
	<div class="form">
		<form method="post" action="create_account.php">
			<table>
				<tr>
					<th>
						<label for="name">Name</label>
					</th>
					<td>
						<input type="text" id="name" name="name">
						<small class="errorText"><?php echo $err["name"]; ?></small>
					</td>
				</tr>
				<tr>
					<th>
						<label for="username">Username</label>
					</th>
					<td>
						<input type="text" id="username" name="username">
						<small class="errorText"><?php echo $err["username"]; ?></small>
					</td>
				</tr>
				<tr>
					<th>
						<label for="password">Password</label>
					</th>
					<td>
						<input type="password" id="password" name="password">
						<small class="errorText"><?php echo $err["password"]; ?></small>
					</td>
				</tr>
			</table>
			<input type="submit" value="Sign Up">
		</form>
	</div>
<?php 
	} elseif ($_GET["q"]=="receivers") {
?>
	<div class="form">
		<form method="post" action="create_account.php">
			<table>
				<tr>
					<th>
						<label for="name">Name</label>
					</th>
					<td>
						<input type="text" id="name" name="name">
					</td>
				</tr>
				<tr>
					<th>
						<label for="username">Username</label>
					</th>
					<td>
						<input type="text" id="username" name="username">
					</td>
				</tr>
				<tr>
					<th>
						<label for="password">Password</label>
					</th>
					<td>
						<input type="password" id="password" name="password">
					</td>
				</tr>
				<tr>
					<th>
						<label for="bg">Blood Group</label>
					</th>
					<td>
						<select name="bloodgroup" id="bg">
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
			<input type="submit" value="Sign Up">
		</form>
	</div>
<?php }} ?>

</div>
</div>
