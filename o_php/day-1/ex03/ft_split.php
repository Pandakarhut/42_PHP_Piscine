<?php
function ft_split($str)
{
	$str = trim($str);
	$arr = explode(' ', $str);
	$arr = array_filter($arr);
	sort($arr);
	return ($arr);
}
?>