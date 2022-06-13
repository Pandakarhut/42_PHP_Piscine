<form method="POST" action="utils/modifyuser.php">
<?php
	echo "
		<tr>
			<th>" . $data['login'] . "</th>
			<th>" . $data['type'] . "</th>
			<th>
				<select name='action' id='action'>
					<option value='user'>User</option>
					<option value='admin'>Admin</option>
					<option value='delete'>Delete</option>
				</select>
				<input type='hidden' name='login' value='" . $data['login'] . "' />
			</th>
			<th><input type=submit name=submit value=Update /></th>
		</tr>";
?>
</form>