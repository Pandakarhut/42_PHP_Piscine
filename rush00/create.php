<?php
if (!file_exists("../private"))
	mkdir("../private");
if (!file_exists("../private/passwd"))
	file_put_contents("../private/passwd", null);
$account_list = unserialize(file_get_contents("../private/passwd"));
if ($account_list)
{
	foreach ($account_list as $key => $value)
	{
		if ($value['login'] === $user)
		{
			echo "ERROR\n";
			header('Location: /store/index.php?page=error&message=userexists&name=' . $user);
			return;
		}
	}
}
$account_list[] = array("login" => $user, "passwd" => hash('whirlpool', $passwd), "type" => "user");
file_put_contents("../private/passwd", serialize($account_list));
header('Location: /store/index.php?page=welcome&message=usercreated&name=' . $user);
return;
?>
