#!/usr/bin/php
<?php
	$i = 0;
	$arr = array();
	if ($argc < 2)
		exit (0);
	while (++$i < $argc)
	{
		$str = preg_replace('/\s+/', ' ',  $argv[$i]);
		$trm = trim($str);
		if (strpos($trm, " "))
		{
			$arr2 = explode(' ', $trm);
			$arrtemp = $arr;
			$arr = array_merge($arrtemp, $arr2);
		}
		else
			array_push($arr, $trm);
	}
	sort($arr);
	for ($x = 0; $x < count($arr); $x++)
		echo "$arr[$x]\n";
?>