<?php
$pageTitle="Login Page";
$state="Login";
include("inc/header.php");
include("inc/connection.php");
include("inc/functions.php");

$err = LoginHandler($db);
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	$err = LoginHandler($db);
	if ($err["username"]=="" && $err["password"]==""){
		set_cookie($db, $_POST["username"], $_POST["category"]);
		header("location:index.php");
	}
}
?>
	<div class="form">
		<form method="post">
			<table>
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
						<label for="cat">Blood Group</label>
					</th>
					<td>
						<select name="category" id="cat">
							<option>Hospital</option>
							<option>Receiver</option>
						</select>
					</td>
				</tr>
			</table>
			<input type="submit" value="Log In">
		</form>
		<div>Not a user yet? <a href="/blood_bank/signup.php">Sign Up</a></div>
	</div>
	</div>
</div>
