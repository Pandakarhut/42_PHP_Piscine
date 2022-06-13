<?php
$basket = $_SESSION['basket'];
$products = unserialize(file_get_contents("../private/products"));

$basket_count = count($basket);

//$total_price = 0;

foreach ($basket as $basket_item => $basket_values)
{
    foreach ($products as $product => $values)
    {
        if ($basket_values['id'] == $values['id'])
        {
            $total_price = $total_price + $basket_values['amount'] * $values['price'];
        }
    }
}


echo 'Shopping basket (' . $basket_count . ' products) Price: ' . $total_price;

?>
