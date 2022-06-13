<?php
//List everything in cart, allow editing amounts, allow removing.
$basket = $_SESSION['basket'];

if (count($basket))
{
    //Get list of all products to calculate prices and to get the names.
    $products = unserialize(file_get_contents("../private/products"));

    $grand_total = 0;
    foreach ($basket as $basket_item => $basket_values)
    {
        foreach ($products as $product => $values)
        {
            if ($basket_values['id'] == $values['id'])
            {
                $grand_total = $grand_total + $values['price'] * $basket_values['amount'];
                echo '<form action="utils/update_basket.php" method="POST">';
                echo 'Item: ' . $values['name'] . ", Price: " . $values['price'];
                echo ' - Amount: <input type="text" size="6" value="' . $basket_values['amount'] . '" name="amount"/>';
                echo ' - Total price: ' . $values['price'] * $basket_values['amount'];
                echo '  <input type="submit" value="Update amount" name="update"/>';
                echo '<input type="submit" value="Remove from basket" name="remove"/>';
                echo '<input type="hidden" name="id" value="' . $basket_values['id'] . '"/>';
                echo '</form>';
            }
        }
    }
    echo '<hr><p style="font-size:30px;">Grand total price: ' . $grand_total . '</p>';
    
    echo '<form action="utils/update_basket.php" method="POST">';
    echo '<input type="submit" value="Empty basket" name="empty"/>';
    echo '</form>';
    echo '<br>';
    echo '<form action="utils/validate_order.php" method="POST">';
    if (is_logged_in())
        echo '<input type="submit" value="Validate order" name="validate"/>';
    else {
        echo '<input type="submit" disabled="disabled" value="Validate order" name="validate"/>';
        echo '<p>You must login in the top right corner to validate this order</p>';
    }
    echo '</form>';
}
else
    echo 'No items in basket yet.'
?>
