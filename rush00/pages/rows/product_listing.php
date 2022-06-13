<?php
    echo '<form method="POST" action="utils/add_to_basket.php?category=' . $_GET['id'] . '&name=' . $_GET['name'] . '">';
    echo 'Product: ' . $values['name'] . ' - ';
    echo 'price: ' . $values['price'] . ' - ';
    echo 'Amount <input type="text" name="amount" value="1" />';
    echo '<input type="submit" name="add" value="Add to cart" />';
    echo '<input type="hidden" name="id" value="' . $values['id'] . '" />';
    echo '</form>'
?>
