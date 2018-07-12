
<?php echo validation_errors(); ?>

<?php echo form_open(''); ?>

	<input type="text" name="title" placeholder="title of the article" value="<?php echo set_value('title') ?>"><br><br>
	<textarea name="description"></textarea><br><br>

	<button type="submit">Add article</button>

<?php echo form_close(); ?>
