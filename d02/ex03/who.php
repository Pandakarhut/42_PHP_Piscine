#!/usr/bin/php
<?php
	$file = fopen("/var/run/utmpx", "r");
	date_default_timezone_set("Europe/Helsinki");

	//Login records are 628 bytes in size, so read that many bytes.
	while ($fd = fread($file, 628))
	{
		if (strlen($fd) == 628)
		{
			//Okay, so we got a full login record.
			//The file "/var/run/utmpx" is a binary string. Use php function unpack to make the binary string into an array.

			//When someone packed this information, they put 6 different variables into the binary string:
			//user (username), id (terminal suffix id), tty (terminal name), pid (process id of the tty), type (type of info, login, logout ,etc.) and time (timestamp in seconds since 1970).
			//We now need to unpack them back into an array.

			//a256user means we want to read the first 256 bytes of the binary string
			//and store it into field "user"
			//a4id means the second field is 4 bytes long string that contains a text id
			//i1pid, i1type and i1time all mean that we read one integer (no matter the bytes) from that spot.
			$fields = unpack("a256user/a4id/a32tty/i1pid/i1type/i1time", $fd);

			//We only want to print login info where type was 7, that means a normal user login
			//https://linux.die.net/man/5/utmpx
			if ($fields['type'] == 7)
			{
				$usr = trim($fields['user']);
				$dt = trim($fields['tty']);
				$month = date("M", $fields['time']);
				$day = date("j", $fields['time']);
				$time = date("H:i", $fields['time']);
				printf("%-8s %-8s %s %2s %s\n", $usr, $dt, $month, $day, $time);
			}
		}
	}
	fclose($file);
?>
