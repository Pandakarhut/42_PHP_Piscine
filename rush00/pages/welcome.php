<?php
    echo '<p style="text-align:center;line-height: 1.6;"><span class="welcometitle">Welcome!</span><br/>';
    echo '<span class="welcome">';
    switch ($_GET['message'])
    {
        case 'usercreated': echo "User " . $_GET['name'] . " has been created. You may now proceed to log in."; break;
        case 'loggedin': echo "Nice to see you here again, " . $_GET['name'] . "!"; break;
        case 'pwchanged': echo "Password was changed successfully!"; break;
        default: echo "We sell all kinds of stuff!"; break;
    }
    echo '</span></p>';
?>
