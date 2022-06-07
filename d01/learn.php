#!/usr/bin/php
<?PHP

function	my_add($p1, $p2)
{
	return $p1 + $p2;
}

print("Hello\n");
$var = 42;
$str = "World";
// $tab = array("zero", "one", "two");
$tab = explode(";", "zero;one;two");
$hash = array("key1" => "val1", "key2" => "val2");

// echo "$var\n$str\n";

// $tab[0] = "00";

$result = "21" + "21";
echo "$result\n";

echo "$tab[0]\n";
echo $hash["key1"]."\n";

print_r($tab);

// echo my_add("42", "42");

if ($tab[1] == "one")
echo "OK\n";
else
echo "KO\n";

echo "$argc\n";
print_r($tab);

foreach ($tab as $elem)
{
	echo "$elem\n";
}



?>