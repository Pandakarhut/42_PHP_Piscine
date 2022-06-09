#!/usr/bin/php
<?php
if (count($argv) > 1)
{
	unset($argv[0]);
	$str = implode(" ", $argv);
	$arr = preg_split("/\s+/", trim($str));
	sort($arr, SORT_STRING);
	foreach ($arr as $word)
		print($word . "\n");
}
?>
