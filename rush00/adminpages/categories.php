<?php
    //Verify we are admin, otherwise go to error page.
    if (is_admin()) {
        //Get categories from file and list them.
        $categories = unserialize(file_get_contents("../private/categories"));
        if ($categories)
        {
            foreach ($categories as $category => $values)
            {
                include "rows/update_category.php";
            }
        }
        else
            echo '<p>No categories exist yet.</p>';
    }
    else
        header('Location: /store/index.php?page=error&message=unauthorized');
?>
<hr>
<div style="margin-top: 20px;">
<form action="/store/utils/addcategory.php" method="POST">
<input type="text" name="category" value="" placeholder="category name" />
<input type="submit" name="create" value="Add new category" />
</form>
</div>
