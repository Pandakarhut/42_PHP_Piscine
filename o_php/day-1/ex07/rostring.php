#!/usr/bin/php
<?php
	if ($argc > 1)
	{
		$tmp = trim($argv[1]);
		if (strpos($tmp, ' '))
		{
			$str = preg_replace('/\s+/', " ", $tmp);
			$arr = explode(" ", $str);
			$str = array_shift($arr);
			array_push($arr, $str);
			echo implode(" ",$arr) . "\n";
		}
		else
			echo $argv[1] . "\n";
	}
?>