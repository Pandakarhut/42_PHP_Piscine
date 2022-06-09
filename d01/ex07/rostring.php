#!/usr/bin/php
<?php
if (count($argv) > 1)
{
	$arr = preg_split("/\s+/", trim($argv[1]));
	//Push the first word of the array to the end of the array
	array_push($arr, $arr[0]);
	//Remove the first word of the array (because now it's at the back)
	unset($arr[0]);
	//Make a string of the array elements joined together with spaces
	$str = implode(" ", $arr);
	print($str."\n");
}
?>
