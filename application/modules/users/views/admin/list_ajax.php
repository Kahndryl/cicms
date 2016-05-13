<?php	
	foreach($users as $user){
		$links = anchor('users/admin/view/'.$user->user_id,'view',array('title'=>'View User','class'=>'btn btn-sm btn-info'));
		$links .= ' | '.anchor('users/admin/edit/'.$user->user_id,'Update Password',array('title'=>'Edit User','class'=>'btn btn-sm btn-warning'));
		
		if($user->is_manager == 1){
		
		$links .= ' | '.anchor('users/admin/is_manager?value=0&user_id='.$user->user_id,'Manager',array('title'=>' Manager','class'=>'btn btn-sm btn-success'));
		}else{
			
		$links .= ' | '.anchor('users/admin/is_manager?value=1&user_id='.$user->user_id,'Normal User',array('title'=>'Normal User ','class'=>'btn btn-sm btn-primary'));
		}
		?>
		<tr role="row">
<td><?php echo $user->name; ?></td><td><?php echo $user->email; ?></td><td><?php echo $user->contact; ?></td><td><?php echo $links; ?></td></tr>
		<?php
	}
	
?>

