<!DOCTYPE html>
<html>
<head>
	<title>login form</title>
</head>
<body>

	<?php echo validation_errors(); ?>

	<?php echo form_open(''); ?>
		<input type="text" name="login" placeholder="login" value="<?php echo set_value('login') ?>"><br>
		<input type="text" name="password" placeholder="password" value="<?php echo set_value('password') ?>"><br>
		<button type="submit">Sign in</button>
	<?php echo form_close(); ?>

</body>
</html>