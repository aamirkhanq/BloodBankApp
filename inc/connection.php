<?php
try {
	$dsn = 'mysql:host=localhost;dbname=database';
	$username = 'root';
	$password = '';
	$options = array(
    		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	); 

	$db = new PDO($dsn, $username, $password, $options);
} catch (Exception $e) {
	echo "Unable to connect";
	exit;
}
?>
