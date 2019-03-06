<?php include("inc/header.php"); ?>

<div class="container">
	<h3>View CoAdmin</h3>

	<div class="row">
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Username</th>
					<th scope="col">College Name</th>					
					<th scope="col">Email</th>
					<th scope="col">Gender</th>
				</tr>
				
			</thead>
			<tbody>
				<?php if(count($coAdmins)): ?>
					<?php foreach($coAdmins as $coAdmin): ?>
				<tr class="table-active">
					<td><?php echo $coAdmin->college_id; ?></td>
					<td><?php echo $coAdmin->username; ?></td>
					<td><?php echo $coAdmin->collegename; ?></td>
					<td><?php echo $coAdmin->email; ?></td>
					<td><?php echo $coAdmin->gender; ?></td>					
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