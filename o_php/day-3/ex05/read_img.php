<?php
	$pic = ("../img/42.png");
	header('Content-type: image/png');
	readfile($pic);
?>
