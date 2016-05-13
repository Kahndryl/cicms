<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('admin/')?>">List</a></li>
			<li><a href="<?php echo site_url('admin/create')?>">Add</a></li>
</ul>
<?php 
     error_reporting (0);
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>
<?php echo form_open('admin/edit/'.$tbl_login->user_id) ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'firstname',
			'id' 		=> 'firstname',
			'class' => 'form-control',
			'value' => $tbl_login->firstname,
		);
	?>
    <label for="firstname">Firstname</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'lastname',
			'id' 		=> 'lastname',
			'class' => 'form-control',
			'value' => $tbl_login->lastname,
		);
	?>
    <label for="lastname">Lastname</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'password',
			'id' 		=> 'password',
			'class' => 'form-control',
			'value' => '',
		);
	?>
    <label for="password">Password</label>
	<?php echo form_input($input);?>
	<span class="text-muted">If do not want to change password, then leave it blank.</span>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'email',
			'id' 		=> 'email',
			'class' => 'form-control',
			'value' => $tbl_login->email,
		);
	?>
    <label for="email">Email</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
	</div>
</div>
