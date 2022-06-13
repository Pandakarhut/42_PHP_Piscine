<?php
session_start();
include "utils.php";

if (is_admin())
{
    //$order_list = unserialize(file_get_contents("../../private/orders"));
	//echo $_POST["orderid"] . " item:" . $_POST["itemid"] . " quantity:" . $_POST["quantity"] . "\n";
}
else
    header('Location: /store/index.php?page=error&message=unauthorized');
?>
