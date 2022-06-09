#!/usr/bin/php
<?php
	if (count($argv) == 2)
	{
		$arr = preg_split("/\s+/", trim($argv[1]));
		$res = "";
		foreach ($arr as $entry)
			$res = $res. " " . $entry;
		print($res."\n");
	}
?>
