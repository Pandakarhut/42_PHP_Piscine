#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$str = trim($argv[1]);
		$result = preg_replace('/\t+/', ' ',  preg_replace('/\s+/', ' ',  $str));
		echo "$result\n";
	}
?>