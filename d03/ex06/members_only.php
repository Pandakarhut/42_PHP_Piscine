<?php
	if ($_SERVER['PHP_AUTH_USER'] == "zaz" && $_SERVER['PHP_AUTH_PW'] == "Ilovemylittleponey")
	{
		$png = base64_encode(file_get_contents("../img/42.png"));
		echo "<html><body>\nHello Zaz<br />\n<img src='data:image/png;base64," . $png . "'\n</body></html>\n";
	}
	else
	{
		//http: 401 Unauthorized
		//https://developer.mozilla.org/en-US/docs/Web/HTTP/Status/401
		header('Content-Type: text/html');
		header('HTTP/1.0 401 Unauthorized');
		header('X-Powered-By: PHP/5.4.26');
		header('WWW-Authenticate: Basic realm=\'\'Member area\'\'');
		echo "<html><body>That area is accessible for members only</body></html>     \n";
	}
?>