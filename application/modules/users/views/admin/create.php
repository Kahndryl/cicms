<ul class="pager">
	<li><a href="<?php echo site_url('users/')?>">List</a></li>
	<li><a href="<?php echo site_url('users/create')?>">Add</a></li>
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
<?php echo form_open('users/create') ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
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
		);
	?>
    <label for="password">Password</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'contact',
			'id' 		=> 'contact',
			'class' => 'form-control',
		);
	?>
    <label for="contact">Contact</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'firstname',
			'id' 		=> 'firstname',
			'class' => 'form-control',
		);
	?>
    <label for="firstname">Firstname</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'surname',
			'id' 		=> 'surname',
			'class' => 'form-control',
		);
	?>
    <label for="surname">Surname</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'guider_contact',
			'id' 		=> 'guider_contact',
			'class' => 'form-control',
		);
	?>
    <label for="guider_contact">Guider Contact</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'stret_no',
			'id' 		=> 'stret_no',
			'class' => 'form-control',
		);
	?>
    <label for="stret_no">Stret No</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'building_name',
			'id' 		=> 'building_name',
			'class' => 'form-control',
		);
	?>
    <label for="building_name">Building Name</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'street',
			'id' 		=> 'street',
			'class' => 'form-control',
		);
	?>
    <label for="street">Street</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'suburb',
			'id' 		=> 'suburb',
			'class' => 'form-control',
		);
	?>
    <label for="suburb">Suburb</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'city',
			'id' 		=> 'city',
			'class' => 'form-control',
		);
	?>
    <label for="city">City</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'country',
			'id' 		=> 'country',
			'class' => 'form-control',
		);
	?>
    <label for="country">Country</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'balance',
			'id' 		=> 'balance',
			'class' => 'form-control',
		);
	?>
    <label for="balance">Balance</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'image',
			'id' 		=> 'image',
			'class' => 'form-control',
		);
	?>
    <label for="image">Image</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>