<?php
session_start();
include "utils.php";
$orderid = $_POST["orderid"];

if (is_admin())
{
	$orders = unserialize(file_get_contents("../../private/orders"));
	foreach ($orders as $order => $data)
	{
		echo $data['id'];
		if ($data["id"] == $orderid)
		{
			unset($orders[$order]);
			file_put_contents("../../private/orders", serialize($orders));
			echo "deleted\n";
			header('Location: /store/index.php?page=adminorders');
			return;
		}
	}
}
header('Location: /store/index.php?page=error&message=unauthorized');
?>