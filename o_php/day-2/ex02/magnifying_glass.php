#!/usr/bin/php
<?php
function ft_up($match)
{
	return strtoupper($match[0]);
}

function ft_filter($match)
{	
	$pattern = "/(\"([^\"]*))|>.*?</mis";
	$result = preg_replace_callback($pattern, 'ft_up', $match[0]);
	return ($result);
}

function ft_catch($match)
{
	$pattern = "/(title=\"([^\"]*))|>.*?</mis";
	$result = preg_replace_callback($pattern, 'ft_filter', $match[0]);
	return ($result);
}
	
if ($argc < 2 || !file_exists($argv[1]))
		exit ();
	$file = fopen($argv[1], 'r');
	$page = "";
	$pattern = "/<a.*?<\/a>/mis";
	while (!feof($file))
		$page .= fgets($file);
	$result = preg_replace_callback($pattern, 'ft_catch', $page);
	echo $result;
?>