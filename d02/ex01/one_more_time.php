#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Helsinki');
	$days = array(
		1 => "lundi",
		2 => "mardi",
		3 => "mercredi",
		4 => "jeudi",
		5 => "vendredi",
		6 => "samedi",
		7 => "dimanche"
	);

	$months = array(
		"Jan" => "janvier",
		"Feb" => "février",
		"Mar" => "mars",
		"Apr" => "avril",
		"May" => "mai",
		"Jun" => "juin",
		"Jul" => "juillet",
		"Aug" => "aout",
		"Sep" => "septembre",
		"Oct" => "octobre",
		"Nov" => "novembre",
		"Dec" => "décembre"
	);

	if ($argc == 1)
		exit(0);
	$pieces = explode(" ", $argv[1]);
	if (count($pieces) != 5)
	{
		print("Wrong Format\n");
		exit(0);
	}

	//Regex pattern for date: 1-9, OR 10-19, OR 20-29, OR 30-31
	$datePattern = "/(^[1-9]$|^1[0-9]$|^2[0-9]$|^3[0-1])$/";
	//Regex pattern for time: (00-09 OR 10-19 OR 20-23):(anything between 00 and 59):(anything between 00 and 59)
	$timePattern = "/(^0[0-9]$|1[0-9]|2[0-3]):(0[0-9]|[0-5][0-9]):(0[0-9]|[0-5][0-9])$/";
	$checks = 0;
	$checks += preg_match($datePattern, $pieces[1], $date);
	$checks += preg_match($timePattern, $pieces[4], $time);

	//Get English day, month and year from $days array based on $pieces[0] (french day name). lcfirst will convert first letter to lowercase.
	$day = array_search(lcfirst($pieces[0]), $days);
	$month = array_search(lcfirst($pieces[2]), $months);
	$year = intval($pieces[3]);
	if ($checks === 2 && $day != NULL && $month != NULL && $year >= 1970 && $year <= time())
	{
		//Create a standardized English string of the info. It looks like: 'Jan 15 1989 12:33:54'
		$str = "$month $date[0] $year $time[0]";
		//Get the unix timestamp (seconds since 1.1.1970) based on given date.
		$timestamp = strtotime($str);
		if (date("N", $timestamp) == $day && date("d", $timestamp) == $date[0] && date("M", $timestamp) == $month && date("Y", $timestamp) == $year)
			echo $timestamp . "\n";
		else
			echo "Wrong Format\n";
	}
	else
		echo "Wrong Format\n";
?>
