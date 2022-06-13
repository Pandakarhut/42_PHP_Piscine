<?php
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == "OK")
	{
		$users = unserialize(file_get_contents('../private/pasaswd'));

		$password_changed = 0;
		foreach ($users as $index => $values) 
		{
			if ($values['login'] === $_POST['login'] && $values['passwd'] === hash('whirlpool', $_POST['oldpw'])) 
			{
				$users[$index]['passwd'] = hash('whirlpool', $_POST['newpw']);
				$password_changed = 1;
			}
		}
		if ($password_changed) 
		{
			file_put_contents('../private/passwd', serialize($users));
			header('Location: index.html');
			echo "OK\n";
			exit();
		} 
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
