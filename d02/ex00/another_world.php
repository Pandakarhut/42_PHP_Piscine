#!/usr/bin/php
<?php
	if (count($argv) == 1)
		exit(0);
	$str = preg_replace("/\s+/", " ", trim($argv[1]));
	if (ctype_space($str) || empty($str))
		exit(0);
	print($str."\n");
?>
