<?php
session_start();
include "utils.php";

if (is_admin())
{
    if (!file_exists("../../private/categories"))
        file_put_contents("../../private/categories", null);

    if (!file_exists("../../private/categories_id"))
        file_put_contents("../../private/categories_id", "0");
        
    $category_list = unserialize(file_get_contents("../../private/categories"));

    //Get max existing category id
    $last_id = file_get_contents("../../private/categories_id");
    $new_id = $last_id + 1;

    $category_list[] = array("id" => $new_id, "name" => $_POST['category']);
    file_put_contents("../../private/categories", serialize($category_list));
    file_put_contents("../../private/categories_id", $new_id);
    header('Location: /store/index.php?page=admincategories');
}
else
    header('Location: /store/index.php?page=error&message=unauthorized');
?>
