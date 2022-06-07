<?php
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] && $_POST['submit'] == "OK")
	{	
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_exists("../private/passwd"))
			file_put_contents("../private/passwd", null);
		$usrs = unserialize(file_get_contents("../private/passwd"));
		$flag = 0;
		if ($usrs)
		{
			foreach($usrs as $key => $value)
			{
				if ($value['login'] === $_POST['login'])
					$flag = 1;
			}
		}
		if ($flag)
			echo "ERROR\n";
		else
		{
			$new_usr['login'] = $_POST['login'];
			$new_usr['passwd'] = hash('whirlpool', $_POST['passwd']);
			$usrs[] = $new_usr;
			file_put_contents("../private/passwd", serialize($usrs));
			echo "OK\n";
		}
	}
	else
		echo "ERROR\n";
?>