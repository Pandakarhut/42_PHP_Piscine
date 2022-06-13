<?php
session_start();
$_SESSION["loggued_on_user"] = "";
$_SESSION["permission_type"] = "";
$_SESSION["basket"] = [];
header('Location: /store/index.php');
?>
