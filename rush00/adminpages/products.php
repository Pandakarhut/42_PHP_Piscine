<?php
    //Verify we are admin, otherwise go to error page.
    if (is_admin()) {
        //Get categories from file and list them.
        $products = unserialize(file_get_contents("../private/products"));
        if ($products)
        {
            foreach ($products as $product => $values)
            {
                include "rows/update_product.php";
            }
        }
        else
            echo '<p>No products exist yet.</p>';
    }
    else
        header('Location: /store/index.php?page=error&message=unauthorized');
?>
<hr>
<div style="margin-top: 20px;">
<form action="/store/utils/addproduct.php" method="POST">
<input type="text" name="product" value="" placeholder="product name" />
<input type="text" name="price" value="" placeholder="price" />
<input type="text" name="categories" value="" size="50" placeholder="categories (comma separated)" />
<input type="submit" name="create" value="Add new product" />
</form>
</div>
