<?php
session_start();
include "utils.php";

if (is_admin())
{
    $product_list = unserialize(file_get_contents("../../private/products"));
    
    //Find index of the category we should modify/remove. 
    $index = 0;
    foreach ($product_list as $product => $values) {
        if ($values['id'] == $_POST['id'])
            $index = $product;
    }

    //check if we want to remove the category
    if ($_POST['remove'])
    {
        unset($product_list[$index]);
        file_put_contents("../../private/products", serialize($product_list));
        header('Location: /store/index.php?page=adminproducts');
    }
    else if ($_POST['modify'])
    {
        //Let's just modify the category.
        $product_list[$index]["name"] = $_POST['product'];
        $product_list[$index]["price"] = $_POST['price'];
        $product_list[$index]["categories"] = $_POST['categories'];
        
        file_put_contents("../../private/products", serialize($product_list));
        header('Location: /store/index.php?page=adminproducts');
    }
}
else
    header('Location: /store/index.php?page=error&message=unauthorized');
?>
