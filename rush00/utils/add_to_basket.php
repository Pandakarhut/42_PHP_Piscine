<?php
session_start();
//Add selected item and amounts to session variables
$basket = [];
if ($_SESSION['basket'])
    $basket = $_SESSION['basket']; 

//Check if we already have product with this id in basket. Then just add the amount
$found_index = -1;
foreach ($basket as $index => $values) {
    if ($values['id'] == $_POST['id']) {
        $found_index = $index;
    }
}

if ($found_index != -1)
{
    //We found this item already. Just update amount.
    $basket[$found_index]['amount'] = $basket[$found_index]['amount'] + $_POST['amount']; 
}
else 
{
    //It's a new item, add to basket.
    $basket[] = array("id" => $_POST['id'], "amount" => $_POST['amount']);
}
$_SESSION['basket'] = $basket;
header('Location: /store/index.php?page=category&id=' . $_GET['category'] . '&name=' . $_GET['name']);
?>
