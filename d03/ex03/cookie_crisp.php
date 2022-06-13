<?php
//Basic syntax: setcookie(cookie_name, cookie_value, [expiry_time], [cookie_path], [domain], [secure], [httponly]);
if ($_GET['action'] == 'set' && $_GET['name']);
	setcookie($_GET["name"], $_GET["value"]);
if ($_GET['action'] == 'get' && $_COOKIE[$_GET['name']] && !$_GET["value"])
	echo $_COOKIE[$_GET['name']] . "\n";
if ($_GET['action'] == 'del' && $_COOKIE[$_GET['name']] && !$_GET['value'])
	setcookie($_GET['name'], '', time() - 3600);
?>