<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="<?php echo base_url('assets/js/jquery-3.1.0.js') ?>"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		.buttons{
			color: #2196f3;
			border: 1px solid #cabdbd;
			border-radius: 3px;
			padding: 2px 10px 2px 10px;
		}
	</style>
</head>
</head>
<body>

<div id="container">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	 	<div class="container-fluid">
	 		<div class="navbar-header col-lg-10">
	 			<a href="" class="navbar-brand" style="color: #fff;">COLLEGE MANAGEMENT SYSTEM</a>
	 		</div>
			<div class="col-lg-2" style="margin-top: 15px;" id="bs-example-navbar-collapse-2">
		 		<div class="btn-group">
		 			<button>
		 			<a href="#" class="btn btn-default">Settings</a>
		 			<a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
		 				<ul class="dropdown-menu">
		 					<?php 
		 						$user_id = $this->session->userdata('user_id');
		 						if ($user_id == '1') :
		 					?>
		 					<li><?php echo anchor("admin/dashboard",'Dashboard',['class' => 'btn btn-default']); ?></li>
		 					<li><?php echo anchor("admin/coadmins",'View Co Admin',['class' => 'btn btn-default']); ?></li>
		 					<li><?php echo anchor("welcome/logout",'Logout',['class' => 'btn btn-default']); ?></li>

		 				<?php elseif($user_id > '1'): ?>
		 					<li><?php echo anchor("welcome/logout",'Logout',['class' => 'btn btn-default']); ?></li>
		 				<?php endif; ?>

		 				</ul>
		 			</button>
		 		</div>
		 	</div>
	 	</div>
	</nav>