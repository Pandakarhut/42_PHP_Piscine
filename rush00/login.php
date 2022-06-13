<?php
include "auth.php";
session_start();

$user = $_POST["login"];
$passwd = $_POST["passwd"];

//If clicked create new user:
if ($user && $passwd) {
	if ($_POST['newuser-btn']) {
		include "create.php";
	}
	else if ($_POST['login-btn']) {
		if (auth($user, $passwd))
		{
			$_SESSION["loggued_on_user"] = $user;
			$type = permission_type($user);
			if ($type)
				$_SESSION["permission_type"] = $type;
			if ($_POST['stayincart'])
				header("Location: /store/index.php?page=cart");
			else
				header("Location: /store/index.php?page=welcome&message=loggedin&name=" . $user);
			return;
		}
		else
			header("Location: /store/index.php?page=error&message=invalidauth");
	}
}
else
	header("Location: /store/index.php?page=error&message=invalidauth");
?>
