<?php
session_start();
include "utils.php";

if (is_logged_in())
{
    if (!file_exists("../../private/orders"))
        file_put_contents("../../private/orders", null);

    if (!file_exists("../../private/orders_id"))
        file_put_contents("../../private/orders_id", "0");
        
    $order_list = unserialize(file_get_contents("../../private/orders"));

    //Get max existing product id
    $last_id = file_get_contents("../../private/orders_id");
    $new_id = $last_id + 1;

    $order_list[] = array("id" => $new_id, "user" => $_SESSION['loggued_on_user'], "order" => $_SESSION['basket']);
    file_put_contents("../../private/orders", serialize($order_list));
    file_put_contents("../../private/orders_id", $new_id);
    $_SESSION['basket'] = [];
    header('Location: /store/index.php?page=ordercomplete');
}
else
    header('Location: /store/index.php?page=error&message=unauthorized');
?>
