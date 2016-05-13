

<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/admin')?>">ALL User List</a></li>
	
</ul>
<?php
	$template = array(
        'table_open'            => '<table class="table table-stripped table-bordered">',

		        'thead_open'            => '<thead>',
		        'thead_close'           => '</thead>',

		        'heading_row_start'     => '<tr>',
		        'heading_row_end'       => '</tr>',
		        'heading_cell_start'    => '<th>',
		        'heading_cell_end'      => '</th>',

		        'tbody_open'            => '<tbody>',
		        'tbody_close'           => '</tbody>',

		        'row_start'             => '<tr>',
		        'row_end'               => '</tr>',
		        'cell_start'            => '<td>',
		        'cell_end'              => '</td>',

		        'row_alt_start'         => '<tr>',
		        'row_alt_end'           => '</tr>',
		        'cell_alt_start'        => '<td>',
		        'cell_alt_end'          => '</td>',

		        'table_close'           => '</table>'
);

	$this->table->set_template($template);

	$this->table->set_heading('Name','Email','Contact','Action');
	//print'<pre>'; print_r($users);die;
	foreach($users as $user){
		$links = anchor('users/admin/view/'.$user->user_id,'view',array('title'=>'View User','class'=>'btn btn-sm btn-info'));
		$links .= ' | '.anchor('users/admin/edit/'.$user->user_id,'Update Password',array('title'=>'Edit User','class'=>'btn btn-sm btn-warning'));
		
		if($user->is_manager == 1){
		
		$links .= ' | '.anchor('users/admin/is_manager?value=0&user_id='.$user->user_id,'Manager',array('title'=>' Manager','class'=>'btn btn-sm btn-success'));
		}else{
			
		$links .= ' | '.anchor('users/admin/is_manager?value=1&user_id='.$user->user_id,'Normal User',array('title'=>'Normal User ','class'=>'btn btn-sm btn-primary'));
		}
	
	
		$this->table->add_row($user->name,$user->email,$user->contact,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('users/admin/index/'.$i)?>"><?php echo $i+1; ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>