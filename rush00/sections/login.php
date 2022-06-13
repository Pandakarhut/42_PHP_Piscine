<div class="login">
    <form action="/store/login.php" method="POST">
    <input type="text" name="login" value="" placeholder="Username" />
    <input type="password" name="passwd" value="" placeholder="Password" />
    <input type="submit" name="login-btn" value="Login" />
    <input type="submit" name="newuser-btn" value="Create new user" />
    <?php
    if ($_GET['page'] == "cart") {
        echo '<input type="hidden" name="stayincart" value="true"/>';
    }
    ?>
    </form>
</div>
