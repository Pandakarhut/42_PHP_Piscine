<?php
    //include auth.php so we can use the auth function from there.
	include 'auth.php';

    //Start a session
	session_start();

    //If login and password was given AND the user+pass combo exists in the passwd file
	if ($_GET['login'] && $_GET['passwd'] && auth($_GET['login'], $_GET['passwd'])) 
	{
        //Set the session variable "loggued_on_user" to given username.
		$_SESSION['loggued_on_user'] = $_GET['login'];
		echo "OK\n";
	} 
	else 
	{
        //Either username or password was not given, or the combination was wrong. Make loggued_on_user empty.
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>
