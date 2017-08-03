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
$cat = "";
if (isset($_GET)){
	if (array_key_exists("q", $_GET)) {
		//var_dump($_GET["q"]);
		//die();
		$cat = $_GET["q"];
	}
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	// var_dump("Inside post");
	if (array_key_exists("bloodgroup", $_POST)) {
		$err=create_account($db, $_POST["name"], $_POST["username"], $_POST["password"], $_POST["bloodgroup"], "Receiver");
		$cat = "receivers";
		//var_dump($cat);
		//var_dump($_POST);
		//var_dump($err);
		//die();
	} else {
		$err=create_account($db, $_POST["name"], $_POST["username"], $_POST["password"], "", "Hospital");
		$cat = "hospitals";
		//var_dump($err);
		//die();
	}
	if ($err["username"]=="" && $err["password"]=="" && $err["name"]==""){
		header("location:index.php");
	} /*else {
		//var_dump("location:create_account.php?q=" . $cat);
		//die();
		header("location:create_account.php?q=" . $cat);
	}*/
}

//var_dump($cat);
if (isset($_GET)) {
	if ($cat == "hospitals") { 
		//if ($_GET["q"]=="hospitals") {
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
	} elseif ($cat == "receivers") { 
		//if ($_GET["q"]=="receivers") {
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
