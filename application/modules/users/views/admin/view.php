<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/admin/index/')?>"><< All User List</a></li>
	
</ul>
  <?php 
  $saveing_current = 'No Account';
  if( isset($user->saveing_current)){
			
		if($user->saveing_current == 0){
			$saveing_current ='Saveing Acount';
		}else{
				$saveing_current ='Current Acount';
		}
}?>
  <?php //print'<pre>'; print_r($user);die;?>
<table class="table table-bordered"><tr>
	<th>Name</th>
	<td><?php echo $user->name?></td>
</tr><tr>
	<th>Email</th>
	<td><?php echo $user->email?></td>
</tr><tr>
	<th>Contact</th>
	<td><?php echo $user->contact?></td>
</tr><tr>
	<th>Firstname</th>
	<td><?php echo $user->firstname?></td>
</tr><tr>
	<th>Surname</th>
	<td><?php echo $user->surname?></td>
</tr><tr>
	<th>Guider Contact</th>
	<td><?php echo $user->guider_contact?></td>
</tr><tr>
	<th>Stret No</th>
	<td><?php echo $user->stret_no?></td>
</tr><tr>
	<th>Building Name</th>
	<td><?php echo $user->building_name?></td>
</tr><tr>
	<th>Street</th>
	<td><?php echo $user->street?></td>
</tr><tr>
	<th>Suburb</th>
	<td><?php echo $user->suburb?></td>
</tr><tr>
	<th>City</th>
	<td><?php echo $user->city?></td>
</tr><tr>
	<th>Country</th>
	<td><?php echo $user->country?></td>
</tr><tr>
	<th>Balance</th>
	<td>R <?php echo number_format(( $user->balance),2); ?></td>
</tr><tr>
	<th>Image</th>
	<td><img width="150" height="150" src="<?php if($user->image == ''){echo base_url('assets/upload/profile/profile.jpg');}else{echo base_url('assets/upload/profile/'.$user->image);} ?>" alt="">
	</td>
</tr>
</table>
<table class="table table-bordered">
<p>Bank Detail</p>
<tr>
	<th>Account Holder Name</th>
	<td><?php echo isset($user->account_holder)?$user->account_holder:''?></td>
</tr><tr>
	<th>Bank Name</th>
	<td><?php echo isset($user->bank_name)?$user->bank_name:''?></td>
</tr><tr>
	<th>Account Number</th>
	<td><?php echo isset($user->account_number)?$user->account_number:''?></td>
</tr><tr>
	<th>Branch Name</th>
	<td><?php echo isset($user->branch_name)?$user->branch_name:''?></td>
</tr><tr>
	<th>Branch Code</th>
	<td><?php echo isset($user->branch_code)?$user->branch_name:''?></td>
</tr><tr>
	<th>Account Type</th>
	<td><?php echo $saveing_current ?></td>
</tr>

</table>

</div>
</div>