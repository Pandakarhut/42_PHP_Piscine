#!/usr/bin/php
<?php
	//First pattern matches any string that starts with <a and ends with </a>
	//When we do preg_match_all, it will match both link elements in the html.
	$pattern1 = "/<a.*?<\/a>/ism";

	//Second pattern will match anything between symbols > and < (so the link text) OR anything starting with title=" and ending with "
	$pattern2 = "/>.*?<|(?<=title=\").*?\"/ism";
	if ($argc == 2)
	{
		$content = file_get_contents($argv[1]);

		//Get all <a> elements from the content and store them to $links
		preg_match_all($pattern1, $content, $links_array);

		//If there were multiple <a> elements, like in the example, join them together and store them as a string in the same variable.
		$links_str = implode("", $links_array[0]);

		//From the new string containing only our links ($links_str), find all texts that match $pattern2 and store them to array $texts
		preg_match_all($pattern2, $links_str, $texts);

		//Loop through the texts array items and replace them in the original text with upper case replacements.
		foreach($texts[0] as $string)
			$content = preg_replace("/$string/", strtoupper($string), $content);
		echo $content;
	}
?>
