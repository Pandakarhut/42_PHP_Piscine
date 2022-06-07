<?php
	function ft_is_sort($tab)
	{
		$tmp_arr = $tab;
		sort($tmp_arr);
		if ($tmp_arr !== $tab)
			return false;
		else
			return true;
	}
?>