<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"> 
	
    <script type='text/javascript' src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>

</head>
<body>

	<?php if (isset($_SESSION['logged_in'])): ?>
		Jesteś zalogowany jako <b><?php echo $_SESSION['login']; ?></b><br>
		<a href="<?php echo base_url('logout'); ?>">LOGOUT</a><br><br>
	<?php endif ?>

	<?php 
	if ($this->session->flashdata('alert')) {
		echo $this->session->flashdata('alert');
	}
	?>