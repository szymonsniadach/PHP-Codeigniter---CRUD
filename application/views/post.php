
<h1><?php echo str_replace("_", " ", $article->title); ?></h1>
<?php echo $article->description; ?>





<br><br><br><br>
<h2>Comments:</h2>

<?php foreach ($comment as $row): ?>
	
	Name: <?php echo $row->name; ?>
	<?php echo $row->text; ?>
	<br><br><br>
	
<?php endforeach ?>



<?php echo form_open(); ?>

<input type="text" name="name" placeholder="your name"><br><br>
<textarea name="comment">
	
</textarea>

<button type="submit">send</button>

<?php echo form_close(); ?>