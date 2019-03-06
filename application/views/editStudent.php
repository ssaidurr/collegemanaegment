<?php include("inc/header.php"); ?>

<?php foreach($studentData as $students): ?>
<div class="container">
	<?php echo form_open("admin/modifyStudent/{$students->id}",['class' => 'form-horizontal']);?>
	<?php if ($msg = $this->session->flashdata('message')): ?>
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-dismissible alert-success">
					<?php echo $msg; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<h3>EDIT STUDENT</h3>
	<hr>
	
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Student Name</label>
				<div class="col-md-9">
					<?php echo form_input(['name' => 'studentname', 'class' =>'form-control', 'placeholder' => 'Student Name', 'value' => set_value('studentname',$students->studentname)]); ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('studentname','<div class="text-danger">','</div>');?>	
		</div>
	</div>



	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">College Name</label>
				<select class="col-md-9" name="college_id" style="margin-left: 17px;">
					<option value=<?php echo $students->college_id; ?>><?php echo $students->collegename; ?></option>
					<?php if(count($colleges)): ?>
						<?php foreach ($colleges as $college): ?>
							<option value=<?php echo $college->college_id; ?>><?php echo $college->collegename; ?></option>
						<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>
		<div class="col-md-6">		
			<?php echo form_error('college_id','<div class="text-danger">','</div>');?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Email</label>
				<div class="col-md-9">
					<?php echo form_input(['name' => 'email', 'class' =>'form-control', 'placeholder' => 'Email', 'value' => set_value('email',$students->email)]); ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('email','<div class="text-danger">','</div>');?>		
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Gender</label>
				<select class="col-md-9" name="gender" style="margin-left: 17px;">
					<option value=<?php echo $students->gender; ?>><?php echo $students->gender; ?></option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>
		</div>
		<div class="col-md-6">		
			<?php echo form_error('gender','<div class="text-danger">','</div>');?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="col-md-3 control-label">Course</label>
				<div class="col-md-9">
					<?php echo form_input(['name' => 'course', 'class' =>'form-control', 'placeholder' => 'Course', 'value' => set_value('course',$students->course)]); ?>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<?php echo form_error('course','<div class="text-danger">','</div>');?>	
		</div>
	</div>



	<button type="submit" class="btn btn-primary">EDIT</button>
	<?php echo anchor("admin/viewStudents/{$students->college_id}","Back",['class' => 'btn btn-primary']); ?>


	<?php echo form_close();?>
</div>

<?php endforeach; ?>



<?php include("inc/footer.php"); ?>