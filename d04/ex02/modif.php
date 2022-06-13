<?php
	//Verify login, oldpw, newpw and submit fields are given. And that submit value is OK.
	if ($_POST['login'] && $_POST['oldpw'] && $_POST['newpw'] && $_POST['submit'] && $_POST['submit'] == "OK")
	{
		//Get all users from passwd file
		$users = unserialize(file_get_contents('../private/passwd'));

		//Initialize password_changed variable
		$password_changed = 0;

		//Loop through all users in the $users array
		foreach ($users as $index => $values)
		{
			//If we find an array entry where login is the same as the posted login,
			//and the password hash there is the same we get from hashing the given old password variable
			if ($values['login'] === $_POST['login'] && $values['passwd'] === hash('whirlpool', $_POST['oldpw']))
			{
				//Change the array so that the given new password is put to the given user.
				$users[$index]['passwd'] = hash('whirlpool', $_POST['newpw']);
				$password_changed = 1;
			}
		}
		// If we changed a password, let's update the passwd file.
		if ($password_changed)
		{
			//Serialize the array of users and store it in the passwd file.
			file_put_contents('../private/passwd', serialize($users));
			echo "OK\n";
		}
		else
			echo "ERROR\n";
	}
	else
		echo "ERROR\n";
?>
