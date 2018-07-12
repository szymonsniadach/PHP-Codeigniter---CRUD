<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit user</title>
</head>
<body>

<?php echo form_open(''); ?>

	<input type="email" name="email" placeholder="email" value="<?php echo $user->email; ?>"><br>
	<input type="text" name="password" placeholder="password"><br>
	<button type="submit">Update user</button>

<?php echo form_close(); ?>


</body>
</html>