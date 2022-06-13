<?php
    session_start();
    if (!($_SESSION['loggued_on_user']))
        echo "ERROR\n";
    else 
	{
        if ($_POST['msg']) 
		{
            if (!file_exists('../private'))
                mkdir("../private");
            if (!file_exists('../private/chat'))
                file_put_contents('../private/chat', null);

            $chat = unserialize(file_get_contents('../private/chat'));
            $file = fopen('../private/chat', "w");
            flock($file, LOCK_EX);
            $entry['login'] = $_SESSION['loggued_on_user'];
            $entry['time'] = time();
            $entry['msg'] = $_POST['msg'];
            $chat[] = $entry;
            file_put_contents('../private/chat', serialize($chat));
            fclose($file);
        }
        ?>
        <html>
			<head>
				<script language="javascript">top.frames['chat'].location = 'chat.php';</script>
			</head>
			<body>
				<form action="speak.php" method="POST">
					<input type="text" name="msg" value=""/>
                    <input type="submit" name="submit" value="Send"/>
				</form>
			</body>
		</html>
        <?php
    }
?>
