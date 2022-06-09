#!/usr/bin/php
<?php
	function ft_compare($s1, $s2)
	{
		$i = 0;
		$map = "abcdefghijklmnopqrstuvwxyz0123456789!\"
					#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		while ($s1[$i] ||$s2[$i])
		{
			$sorted1 = stripos($map, $s1[$i]);
			$sorted2 = stripos($map, $s2[$i]);
			if ($sorted1 > $sorted2)
				return (1);
			if ($sorted1 < $sorted2)
				return (-1);
			$i++;
		}
	}
	$argc = 1;
	$word = array();
	foreach ($argv as $elem)
	{
		if ($argc++ > 1)
		{
			$tmp = preg_split("/\s+/", trim($elem));
			if ($tmp[0] != "")
				$word = array_merge($word, $tmp);
		}
	}
	usort($word, "ft_compare");
	foreach ($word as $elem)
		echo "$elem" . "\n";
?>
