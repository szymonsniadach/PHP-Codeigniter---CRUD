
<?php foreach ($user as $row): ?>
	login: <?php echo $row->login; ?><br>
	password: <?php echo $row->password; ?><br>
	email: <?php echo $row->email; ?><br>
	<a href="<?php echo base_url('admin/user/delete/index/'.$row->id); ?>">DELETE</a>
	<a href="<?php echo base_url('admin/user/edit/index/'.$row->id); ?>">EDIT</a>
	<br><br><br>
<?php endforeach ?>

<a href="<?php echo base_url('admin/user/create'); ?>">CREATE</a><br><br>