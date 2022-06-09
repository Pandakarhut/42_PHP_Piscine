#!/usr/bin/php
<?PHP
//DO NOT RETURN THIS FILE, IT IS ONLY TO TEST THE ft_is_sort.php
include("ft_is_sort.php");
$tab = array("c", "b", "a");
// $tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
// $tab[] = "What are we doing now ?";
print_r($tab);
if (ft_is_sort($tab))
echo "The array is sorted\n";
else
echo "The array is not sorted\n";
?>
