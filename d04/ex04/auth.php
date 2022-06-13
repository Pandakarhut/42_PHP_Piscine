<?php
	function auth($login, $passwd) 
	{
		//If login or password is empty, return false
		if (!$login || !$passwd) 
			return false;
		
		//Get users from passwd file and unserialize = turn them into an array.
		$users = unserialize(file_get_contents('../private/passwd'));

		//Loop through users to see if the given login passwd combination belongs to a user.
		foreach ($users as $index => $values) 
		{
			//If the login value is same as $login and the passwd value is same as $passwd after hashing, we have a correct combo.
			if ($values['login'] === $login && $values['passwd'] === hash('whirlpool', $passwd))
				return true;
		}
		return false;
	}
?>
