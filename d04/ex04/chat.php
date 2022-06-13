<?php
    //Set correct timezone for messages
    date_default_timezone_set("Europe/Helsinki");
	session_start();

    //Verify user has logged in
	if (!($_SESSION['loggued_on_user']))
        echo "ERROR\n";
    else {
        //If the chat file exists, let's unserialize it and print the lines.
        if (file_exists('../private/chat')) {
            $chat = unserialize(file_get_contents('../private/chat'));
            foreach ($chat as $msg)
            {
                echo "[" . date('H:i', $msg['time']) . "] <b>" . 
				$msg['login'] . "</b>: " . 
				$msg['msg'] . "<br />" . "\n";
            }
        }
    }
?>
