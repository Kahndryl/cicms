<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/admin')?>">ALL User List</a></li>
	
</ul>
<?php 
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
<?php echo form_open('users/admin/edit/'.$user->user_id) ?><div class="form-group">
	<?php 
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
			'value' => $user->name,
			'readonly'=>'true'
		);
	?>
    <label for="name">Name</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'email',
			'id' 		=> 'email',
			'class' => 'form-control',
			'value' => $user->email,
			'readonly'=>'true'
		);
	?>
    <label for="email">Email</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'password',
			'id' 		=> 'password',
			'class' => 'form-control',
			//'value' => $user->password,
		);
	?>
    <label for="password">New Password</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'contact',
			'id' 		=> 'contact',
			'class' => 'form-control',
			'value' => $user->contact,
			'readonly'=>'true'
		);
	?>
    <label for="contact">Contact</label>
	<?php echo form_input($input);?>
</div>

<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
   
</div>