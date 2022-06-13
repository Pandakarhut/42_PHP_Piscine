<?php
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] === "OK")
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/passwd"))
			file_put_contents("../private/passwd", null);
		$users = unserialize(file_get_contents("../private/passwd"));
		$user_exists = 0;
		if ($users)
		{
			foreach($users as $index => $values)
			{
				if ($values['login'] === $_POST['login'])
					$user_exists = 1;
			}
		}
		if ($user_exists)
			echo "ERROR\n";
		else
		{
			$new_user['login'] = $_POST['login'];
			$new_user['passwd'] = hash('whirlpool', $_POST['passwd']);

			$users[] = $new_user;
			file_put_contents("../private/passwd", serialize($users));
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";
?>
