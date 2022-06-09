<?php
	function ft_is_sort($arr)
	{
		$arr_sorted = $arr;
		sort($arr_sorted, SORT_STRING);
		if (array_diff_assoc($arr_sorted, $arr) == null)
			return true;
		return false;
	}
?>
