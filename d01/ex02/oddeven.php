#!/usr/bin/php
<?php
while (1)
{
	echo "Enter a number: ";
	if ($nb = fgets(STDIN))
	{
		$nb = trim($nb);
		if (!(is_numeric($nb)))
		{
			echo "'$nb' is not a number\n";
			continue;
		}
		if ($nb % 2 == 0)
			echo "The number $nb is even\n";
		else
			echo "The number $nb is odd\n";
	}
	else
		exit(0);
}
?>