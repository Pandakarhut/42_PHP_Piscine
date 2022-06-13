<?php
function auth($login, $passwd)
{
	$accounts = unserialize(file_get_contents("../private/passwd"));
	foreach ($accounts as $key => $value)
	{
		if ($value["login"] === $login)
		{
			$hash = hash("whirlpool", $passwd);
			if ($hash === $value["passwd"])
				return true;
			return false;
		}
	}
	return false;
}

function permission_type($login)
{
	$accounts = unserialize(file_get_contents("../private/passwd"));
	foreach ($accounts as $users => $data)
	{
		if ($data['login'] === $login)
			return $data['type'];
	}
	return false;
}
?>
