<html>
<body>

<?php echo form_open('/main/new_user') ?>
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Sign Up"></td>
		</tr>
	</table>
</form>
</body>
</html>