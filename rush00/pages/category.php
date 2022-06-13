
<?php
    echo "Category: " . $_GET['name'] . '<br>';
    $products = unserialize(file_get_contents("../private/products"));
    if ($products)
    {
        foreach ($products as $product => $values)
        {
            if (in_array($_GET['name'], explode(",", $values['categories'])))
                include "rows/product_listing.php";
        }
    }
    else
        echo '<p>No products in this category yet.</p>';
?>
