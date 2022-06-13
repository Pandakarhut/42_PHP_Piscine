<?php
session_start();
include "utils.php";

if (is_admin())
{
    $category_list = unserialize(file_get_contents("../../private/categories"));
    
    //Find index of the category we should modify/remove. 
    $index = 0;
    foreach ($category_list as $category => $values) {
        if ($values['id'] == $_POST['id'])
            $index = $category;
    }

    //check if we want to remove the category
    if ($_POST['remove'])
    {
        unset($category_list[$index]);
        file_put_contents("../../private/categories", serialize($category_list));
        header('Location: /store/index.php?page=admincategories');
    }
    else if ($_POST['modify'])
    {
        //Let's just modify the category.
        $category_list[$index]["name"] = $_POST['category'];
        file_put_contents("../../private/categories", serialize($category_list));
        header('Location: /store/index.php?page=admincategories');
    }
}
else
    header('Location: /store/index.php?page=error&message=unauthorized');
?>
