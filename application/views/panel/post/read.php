<!-- <?php form_open(); ?>

<input type="date" name="date_start" placeholder="Start date">
<input type="date" name="date_end" placeholder="End date">

<?php form_close(); ?>

<br><br> -->


<?php foreach ($article as $row): ?>

	id: <?php echo $row->id; ?>
	<h2><?php echo str_replace("_", " ", $row->title); ?></h2>
	<small><?php echo $row->date; ?></small>
	<?php echo $row->description; ?>

	<a href="<?php echo base_url('panel/post/delete/index/'.$row->id); ?>">DELETE</a>
	<a href="<?php echo base_url('panel/post/edit/index/'.$row->id); ?>">EDIT</a>
	<br><br><br><br><br><br>

<?php endforeach ?>

<a href="<?php echo base_url('panel/post/create'); ?>">CREATE</a><br><br>