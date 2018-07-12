
<?php echo form_open(); ?>
	<label for="sort_post">Sort by</label>
	<select name="sort_post" id="sort_post">
		<option value="latest">Latest</option>
		<option value="oldest">Oldest</option>
	</select>

	<button type="submit">Show</button>
<?php echo form_close(); ?>


<?php foreach ($results as $row): ?>

	<h2><a href="<?php echo base_url(); ?>articles/post/<?php echo $row->id; ?>"><?php echo str_replace("_", " ", $row->title); ?></a></h2> <br>
	<small><?php echo $row->date; ?></small> <br>
	<p><?php echo substr(strip_tags($row->description), 0, 100)."..."; ?></p>
	<br><br><br>
	
<?php endforeach ?>

<?php echo $links; ?>