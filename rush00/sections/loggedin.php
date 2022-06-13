<?php
echo '<p class="loggedin">Logged in as <strong>' . $_SESSION['loggued_on_user'] . '</strong> | <a href="index.php?page=profile">Profile</a> | <a href="index.php?page=orders">Orders</a> <a href="logout.php">Log out</a></p>';
?>
