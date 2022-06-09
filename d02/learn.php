#!/usr/bin/php
<?php
	$name = "key";
	$$name = "val";
	echo "$key\n";
?>

<!--
	REGEX regular expression
	PCRE  Perl Compatible Regular Expressions
-->

^$
"/^t[oi]t[oi]$/"

"/^t[0-9]{4}t[a-m]$/"

"/t([io])t\1/"
