<ul class="navigation">
    <li class="header">
        Categories
    </li>
    <?php
        $categories = unserialize(file_get_contents("../private/categories"));
        if ($categories)
        {
            foreach ($categories as $category => $values)
            {
                echo '<li><a class="category" href="/store/index.php?page=category&id=' . $values['id'] . '&name=' . $values['name'] . '">' . $values['name'] . '</a></li>';
            }
        }
        else
            echo '<p>No categories yet</p>';
    ?>
</ul>
