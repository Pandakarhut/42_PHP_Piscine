#!/usr/bin/php
<?php
	$file = fopen("/var/run/utmpx", "r");
	date_default_timezone_set("Europe/Helsinki");
	while (!feof($file))
	{
		$fd = fread($file, 628);
		if (strlen($fd) == 628)
		{
			$fd = unpack("a256user/a4id/a32line/ipid/itype/itime", $fd);
			if ($fd['type'] == 7)
			{
				$usr = trim($fd['user']);
				$dt = trim($fd['line']);
				$month = date("M", $fd['time']);
				$day = date("j", $fd['time']);
				$time = date("H:i", $fd['time']);
				printf("%-8s %-8s %s %2s %s\n", $usr, $dt, $month, $day, $time);
			}
		}
	}
?>