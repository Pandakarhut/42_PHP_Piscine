<form method="POST" action="utils/modifycategory.php">
<?php
    echo '<input type="text" name="category" value="' . $values['name'] . '" />';
    echo '<input type="submit" name="modify" value="Update" />';
    echo '<input type="submit" name="remove" value="Remove" />';  
    echo '<input type="hidden" name="id" value="' . $values['id'] . '" />';
?>
</form>
