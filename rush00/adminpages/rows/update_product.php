<form method="POST" action="utils/modifyproduct.php">
<?php
    echo '<input type="text" name="product" value="' . $values['name'] . '" />';
    echo '<input type="text" name="price" value="' . $values['price'] . '" />';
    echo '<input type="text" name="categories" value="' . $values['categories'] . '" />';
    echo '<input type="submit" name="modify" value="Update" />';
    echo '<input type="submit" name="remove" value="Remove" />';  
    echo '<input type="hidden" name="id" value="' . $values['id'] . '" />';
?>
</form>
