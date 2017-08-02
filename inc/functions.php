<?php
include("connection.php");
function LoginHandler($db) {
	$error = array(
		"username" => "",
		"password" => ""
	);
	if ($_SERVER["REQUEST_METHOD"]=="POST"){
		$username = $_POST["username"];
		
		$password = $_POST["password"];
		
		$result = $db->query("select password from hospitals where username='".$username."'");
		$result = $result->fetchAll();
		if (sizeof($result) != 0) {
			$result = $result[0];
			if ($result["password"] != $password) {
				$error["password"] = "Incorrect Password";
			}
		} else {
			$error["username"]="Invalid username";		
		}
		if ($username==""){
			$error["username"]="This field is required";	
		}
		if ($password==""){
			$error["password"]="This field is required";
		}
		return $error;
	}
	return $error;
}

function check_availability($db, $username, $category) {
	// var_dump("Inside check_availability");
	// var_dump($username);
	// var_dump($category);
	$table_name = strtolower($category)."s";
	//var_dump($table_name);
	$result = $db->query("select username from ".$table_name." where username='$username';");
	//var_dump($result);
	$result = $result->fetchAll();
	// var_dump($result);
	//die();
	//var_dump(expression)
	if (sizeof($result) != 0) {
		return false;
	} else {
		return true;
	}
}

function LogoutHandler() {
	setcookie("user_id", "", time() - 3600, "/");
	setcookie("category", "", time() - 3600, "/");
}

function set_cookie($db, $username, $category) {
	$user_id = $db->query("select id from hospitals where username='".$username."';");
	$user_id = $user_id->fetchAll()[0]["id"];
	setcookie("user_id", $user_id, time() + (86400 * 30), "/");
	setcookie("category", $category, time() + (86400 * 30), "/");
}

function create_account($db, $name, $username, $password, $blood_group, $category) {
	$error = array(
			"username" => "",
			"password" => "",
			"name" => ""
	);
	$table_name = strtolower($category)."s";
	if ($name == "") {
		$error["name"] = "This field cannot be empty";
	} elseif ($username == "") {
		$error["username"] = "This field cannot be empty";
	} elseif ($password == "") {
		$error["password"] = "This field cannot be empty";
	} else {
		var_dump($category);
		if ($category == "Hospital") {
			// var_dump("check_availability:");
			// var_dump(check_availability($db, $username, $category));
			if (check_availability($db, $username, $category)) {
				// var_dump("insert into ".$table_name." (name, username, password, category) values ('$name', '$username', '$password', '$category');");/*
				$db->query("insert into ".$table_name." (name, username, password, category) values ('$name', '$username', '$password', '$category');");
				set_cookie($db, $username, $category);
				header("location:index.php");
			} else {
				$error["username"] = "This username is not available";
			}
		} elseif ($category == "Receiver") {
			if (check_availability($db, $username, $category)) {
				$db->query("insert into ".$table_name."(name, username, password, blood_group, category) values ($name, $username, $password, $blood_group, $category);");
				set_cookie($db, $username, $category);
				header("location:index.php");
			} else {
				$error["username"] = "This username is not available";
			}
		}
	}
	return $error;
}
?>
