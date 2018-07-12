<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create user</title>
</head>
<body>

<?php echo validation_errors(); ?>

<?php echo form_open(''); ?>
	<input type="text" name="login" placeholder="login" value="<?php echo set_value('login') ?>"><br>
	<input type="text" name="password" placeholder="password" value="<?php echo set_value('password') ?>"><br>
	<input type="email" name="email" placeholder="email" value="<?php echo set_value('email') ?>"><br>
	<button type="submit">Create user</button>
<?php echo form_close(); ?>


</body>
</html>