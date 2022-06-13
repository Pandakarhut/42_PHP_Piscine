<?php
    echo '<p style="text-align:center; line-height: 1.6;"><span class="errortitle">Error!</span><br/>';
    echo '<span class="error">';
    switch ($_GET['message'])
    {
        case 'invalidauth': echo "Invalid username or password!"; break;
        case 'invalidpw': echo "Invalid password!"; break;
        case 'userexists': echo "User " . $_GET['name'] . " already exists!"; break;
        case 'unauthorized': echo "You are not authorized to view this page!"; break;
    }
    echo '</span></p>';
?>
