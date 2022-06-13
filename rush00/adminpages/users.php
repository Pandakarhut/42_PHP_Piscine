<?php
    //Verify we are admin, otherwise go to error page.
    if (is_admin()) {
        $users = unserialize(file_get_contents("../private/passwd"));
?>
<table>
<tr>
	<th>Username</th>
	<th>Type</th>
	<th>Action</th>
	<th>Submit</th>
</tr>
<?php
		foreach ($users as $user => $data)
		{
			include "rows/update_user.php";
		}
	}
	else
		header('Location: /store/index.php?page=error&message=unauthorized');
?>
</table>