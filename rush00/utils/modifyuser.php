<?php
session_start();
include 'utils.php';
$action = $_POST["action"];
$login = $_POST["login"];

if (is_admin() && $login && $action) {
	$users = unserialize(file_get_contents("../../private/passwd"));
	foreach ($users as $user => $data)
	{
		if ($data['login'] === $login)
		{
			switch ($action)
			{
				case "delete":
					unset($users[$user]);
					break;
				case "admin":
					$users[$user]["type"] = $action;
					break;
				case "user": 
					$users[$user]["type"] = $action; 
					break;
				default: echo "wrong value\n";
			}
			file_put_contents("../../private/passwd", serialize($users));
			if ($login === $_SESSION["loggued_on_user"])
				$_SESSION["permission_type"] = $action;
			header('Location: /store/index.php?page=adminusers');
		}
	}
}
else
	header('Location: /store/index.php?page=error&message=unauthorized');
?>