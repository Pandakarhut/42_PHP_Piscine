<?php
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == "OK" && file_exists('../private/passwd')) 
	{
		$usrPw = unserialize(file_get_contents('../private/passwd'));
		$flag = 0;
		foreach ($usrPw as $key => $value) 
		{
			if ($value['login'] === $_POST['login'] && $value['passwd'] === hash('whirlpool', $_POST['oldpw'])) 
			{
				$flag = true;
				$usrPw[$key]['passwd'] = hash('whirlpool', $_POST['newpw']);
			}
		}
		if ($flag) 
		{
			file_put_contents('../private/passwd', serialize($usrPw));
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