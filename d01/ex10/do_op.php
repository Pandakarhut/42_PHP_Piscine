#!/usr/bin/php
<?php
	if (count($argv) != 4)
		exit(0);
	$first = trim($argv[1]);
	$op = trim($argv[2]);
	$second = trim($argv[3]);
	switch ($op)
	{
		case "+":
			print($first + $second);
			break;
		case "-":
			print($first - $second);
			break;
		case "*":
			print($first * $second);
			break;
		case "/":
			print($first / $second);
			break;
		case "%":
			print($first % $second);
			break;
	}
	print("\n");
?>
