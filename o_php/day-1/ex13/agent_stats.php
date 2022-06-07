#!/usr/bin/php
<?php
if ($argc != 2)
	exit(0);

$grade = 0;
$count = 0;
$file = file('php://stdin');
unset($file[0]);

function av_user($file)
{
	$tmpfile = $file; 
		sort($file);
		$checked = array();
		foreach ($file as $line)
		{
			$arr = explode(";", $line);
			if (!in_array($arr[0], $checked))
			{
				array_push($checked, $arr[0]);
				if ($arr[1] != '' && $arr[2] != "moulinette")
				{
					foreach($tmpfile as $student)
					{
						$tmparr = explode(";", $student);
						if ($tmparr[0] == $arr[0] && $tmparr[1] != '' && $tmparr[2] != "moulinette")
						{
							$grade += $tmparr[1];
							$count++;
						}
					}
					if ($count)
						echo $arr[0] . ":" . $grade / $count . "\n";
				}
			}
			$grade = 0;
			$count = 0;
		}
}

function mou_user($file)
{
	sort($file);
	$checked = array();
	$mou = 0;
	foreach ($file as $line)
	{
		$arr = explode(";", $line);
		if (!in_array($arr[0], $checked))
		{
			array_push($checked, $arr[0]);
			if($tmparr[2] == "moulinette" && $tmparr[1] != '')
				$mou += $tmparr[1];
			if ($arr[1] != '' && $arr[2] != "moulinette")
			{
				foreach($file as $student)
				{
					$tmparr = explode(";", $student);
					if ($tmparr[0] == $arr[0] && $tmparr[1] != '' && $tmparr[2] == "moulinette")
						$mou += $tmparr[1];
					if ($tmparr[0] == $arr[0] && $tmparr[1] != '' && $tmparr[2] != "moulinette")
					{
						$grade += $tmparr[1];
						$count++;
					}
				}
				if ($count)
				{
					$avg = $grade / $count;
					echo $arr[0] . ":" . ($avg - $mou) . "\n";
				}
			}
		}
		$grade = 0;
		$count = 0;
		$mou = 0;
	}
}

switch($argv[1])
{
	case("average"):
		foreach ($file as $line)
		{
			$arr = explode(";", $line);
			if ($arr[1] != '' && $arr[2] != "moulinette")
			{
				$grade += $arr[1];
				$count++;
			}
		}
		if ($count)
			echo $grade / $count."\n";
		break;
	case("average_user"):
		av_user($file);
		break;
	case ("moulinette_variance"):
		mou_user($file);
		break;
}
?>