<?php
    date_default_timezone_set("Europe/Helsinki");
	session_start();
	if (!($_SESSION['loggued_on_user']))
        echo "ERROR\n";
    else {
        if (file_exists('../private') && file_exists('../private/chat')) {
            $chat = unserialize(file_get_contents('../private/chat'));
            foreach ($chat as $log)
                echo "[" . date('H:i', $log['time']) . "] <b>" . 
				$log['login'] . "</b>: " . 
				$log['msg'] . "<br />" . "\n";
        }
    }
?>