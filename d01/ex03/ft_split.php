#!/usr/bin/php
<?php
	function ft_split($str)
	{
		if (ctype_space($str) || empty($str))
			return NULL;
		$arr = preg_split("/\s+/", trim($str));
		sort($arr);
		if (!count($arr) || !$arr[0])
			return(NULL);
		return ($arr);
	}
?>
