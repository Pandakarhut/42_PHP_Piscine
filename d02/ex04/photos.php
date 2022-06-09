#!/usr/bin/php
<?php
	$url = $argv[1];

	if (!filter_var($url, FILTER_VALIDATE_URL))
		die("Not a valid URL\n");

	$page = file_get_contents($url);

	if (preg_match_all('/<img\s+[^>]*src="([^"]*\.\w+)"[^>]*>/is', $page, $matches))
	{
		//Make folder for the host name
		$folder = parse_url($url)["host"];
		@mkdir($folder);

		//Loop through matches and save image
		foreach ($matches[1] as $match)
		{
			//If the image url doesn't start with http or https, add the given url in front of it.
			if (preg_match('#^https?://#i', $match) === 0)
			{
				//If there is no slash in the path, add it
				if ($match[0] != "/" && substr($url, -1) != "/")
					$match = "/".$match;

				$match = $url.$match;
			}
			download_image($match, $folder . "/" . basename($match));
		}
	}

	function download_image($image_url, $image_file){
		$fp = fopen ($image_file, 'w+');
		$ch = curl_init($image_url);
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 2000);
		curl_exec($ch);
		curl_close($ch);
		fclose($fp);
}
?>
