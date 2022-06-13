<?php
session_start();
$pw = $_POST["passwd"];
$username = $_SESSION['loggued_on_user'];

if ($pw && $username)
{
	$accounts = unserialize(file_get_contents("../../private/passwd"));
	foreach ($accounts as $user => $data)
	{
		if ($data["login"] === $username && $data["passwd"] === hash("whirlpool", $pw))
		{
			unset($accounts[$user]);
			file_put_contents("../../private/passwd", serialize($accounts));
			header('Location: /store/logout.php');
			return;
		}
	}
}
header('Location: /store/index.php?page=error&message=invalidpw');
?>