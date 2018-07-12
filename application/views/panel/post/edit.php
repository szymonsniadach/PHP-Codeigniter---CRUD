<?php echo form_open(''); ?>

	<input type="text" name="title" placeholder="title" value="<?php echo $article->title; ?>"><br><br>
	<textarea name="description" placeholder="description">
		<?php echo $article->description; ?>
	</textarea><br><br>

	<button type="submit">Update post</button>

<?php echo form_close(); ?>



<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
	tinymce.init({
		selector: 'textarea',
		width: 500
	});
</script>