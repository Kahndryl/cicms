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
<?php echo form_open('users/edit/'.$user->id) ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'name',
			'id' 		=> 'name',
			'class' => 'form-control',
			'value' => $user->name,
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
		);
	?>
    <label for="email">Email</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'contact',
			'id' 		=> 'contact',
			'class' => 'form-control',
			'value' => $user->contact,
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
			'value' => $user->firstname,
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
			'value' => $user->surname,
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
			'value' => $user->guider_contact,
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
			'value' => $user->stret_no,
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
			'value' => $user->building_name,
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
			'value' => $user->street,
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
			'value' => $user->suburb,
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
			'value' => $user->city,
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
			'value' => $user->country,
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
			'value' => $user->balance,
		);
	?>
    <label for="balance">Balance</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>