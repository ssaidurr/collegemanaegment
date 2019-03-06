<?php include("inc/header.php"); ?>

<div class="container">
	<h3>Co Admin Dashboard</h3>
	<?php $username = $this->session->userdata('username');?>
	<h5>Welcome <?php echo $username;?></h5>
	
	<hr>
	<div class="row">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Student Name</th>
					<th scope="col">College Name</th>
					<th scope="col">Email</th>
					<th scope="col">Gender</th>
					<th scope="col">Course</th>
				</tr>
				
			</thead>
			<tbody>
				<?php if(count($students)): ?>
					<?php foreach($students as $student): ?>
				<tr class="table-active">
					<td><?php echo $student->id; ?></td>
					<td><?php echo $student->studentname; ?></td>
					<td><?php echo $student->collegename; ?></td>
					<td><?php echo $student->email; ?></td>
					<td><?php echo $student->gender; ?></td>
					<td><?php echo $student->course; ?></td>					
				</tr>
					<?php endforeach; ?>
			<?php else: ?>
				<td>No Record Found</td>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<?php include("inc/footer.php"); ?>