<?php
	include 'auth.php';

	session_start();

	//If not logged in
	if (!($_POST['login'] && $_POST['passwd'] && auth($_POST['login'], $_POST['passwd']))) 
	{
		//Either username or password was not given, or the combination was wrong. Make loggued_on_user empty.
		$_SESSION['loggued_on_user'] = "";
        header('Location: index.html');
        echo "ERROR\n";
	} 
	else 
	{
        //Set the session variable "loggued_on_user" to given username.
		$_SESSION['loggued_on_user'] = $_POST['login'];
		?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>42chat</title>
        </head>
        <body>
            <iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
            <iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
        </body>
        </html>
        <?php
    }
?>
