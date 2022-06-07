<?php
    $array = array();
    $id = 0;
    if (file_exists("list.csv") && isset($_GET["todo"]) && !empty($_GET["todo"]))
    {
        $file = file("list.csv", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($file as $line) {
            $tmp = explode(";", $line);
            if ($tmp[0] >= $id)
                $id = $tmp[0] + 1;
        }
        file_put_contents("list.csv", $id.";".$_GET["todo"].PHP_EOL, FILE_APPEND);
    }
?>