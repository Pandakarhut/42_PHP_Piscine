<?php
    //Start the session. This is a logout page so most likely
    //Whoever called this website (with a cookie) already has a session with their username.
    //Let's remove the username from the session variable and then they are logged out.
	session_start();
	$_SESSION['loggued_on_user'] = "";
?>
