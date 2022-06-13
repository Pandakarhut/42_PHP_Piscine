<?php
session_start();
$username = $_SESSION["loggued_on_user"];
$oldpw = $_POST["oldpw"];
$newpw = $_POST["newpw"];
$submit = $_POST["submit"];

if ($username && $oldpw && $newpw && $submit == "OK")
{
	$accounts = unserialize(file_get_contents("../../private/passwd"));
	foreach ($accounts as $user => $data)
	{
		if ($data["login"] === $username)
		{
			$hash = hash("whirlpool", $oldpw);
			if ($hash === $data["passwd"])
			{
				$accounts[$user]["passwd"] = hash("whirlpool", $newpw);
				file_put_contents("../../private/passwd", serialize($accounts));
				header('Location: /store/index.php?page=welcome&message=pwchanged');
				return;
			}
		}
	}
	header('Location: /store/index.php?page=error&message=invalidpw');
}

?>
<style>
	input {
		margin: 10px;
	}
</style>
<h1>Change password</h1>
<form action="pages/modif.php" method="post">
	<input type="password" name="oldpw" value="" placeholder="Old password" />
	<br />
	<input type="password" name="newpw" value="" placeholder="New password" />
	<input type="submit" name="submit" value="OK" />
</form>