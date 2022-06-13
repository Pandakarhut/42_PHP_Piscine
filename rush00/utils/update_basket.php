<?php
session_start();

$basket = [];
if ($_SESSION['basket'])
    $basket = $_SESSION['basket']; 

//Find array index for the item in question.
$found_index = -1;
foreach ($basket as $index => $values) {
    if ($values['id'] == $_POST['id']) {
        $found_index = $index;
    }
}

//If we want to remove it, unset the array index
if ($_POST['remove'])
    unset($basket[$found_index]);
else if ($_POST['update'])
{
    //If we want to update amount.
    $basket[$found_index]['amount'] = $_POST['amount'];
}
else if ($_POST['empty'])
{
    $basket = [];
}

$_SESSION['basket'] = $basket;
header('Location: /store/index.php?page=cart');
?>
