<?php
function is_admin() {
    return ($_SESSION['permission_type'] === "admin");
}

function is_logged_in() {
    return ($_SESSION['loggued_on_user'] != "");
}
?>
