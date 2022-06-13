<?php
session_start();
include "utils.php";

if (is_admin())
{
    if (!file_exists("../../private/products"))
        file_put_contents("../../private/products", null);

    if (!file_exists("../../private/products_id"))
        file_put_contents("../../private/products_id", "0");
        
    $product_list = unserialize(file_get_contents("../../private/products"));

    //Get max existing product id
    $last_id = file_get_contents("../../private/products_id");
    $new_id = $last_id + 1;

    $product_list[] = array("id" => $new_id, "name" => $_POST['product'], "price" => $_POST['price'], "categories" => $_POST['categories']);
    file_put_contents("../../private/products", serialize($product_list));
    file_put_contents("../../private/products_id", $new_id);
    header('Location: /store/index.php?page=adminproducts');
}
else
    header('Location: /store/index.php?page=error&message=unauthorized');
?>
