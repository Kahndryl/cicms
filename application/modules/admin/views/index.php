<div class="grid-form">
	<div class="grid-form1">
		<ul class="pager">
			<li><a href="<?php echo site_url('admin/')?>">List</a></li>
			<li><a href="<?php echo site_url('admin/create')?>">Add</a></li>
		</ul>
		<?php
			$template = array(
		        'table_open'            => '<table class="table table-stripped table-bordered datatable">',

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

			$this->table->set_heading('Firstname','Lastname','Email','Date Created','Action');
			foreach($tbl_login as $admin){
				$links = anchor('admin/view/'.$admin->user_id,'view',array('title'=>'View admin','class'=>'btn btn-sm btn-success'));
				$links .= ' | '.anchor('admin/edit/'.$admin->user_id,'edit',array('title'=>'Edit admin','class'=>'btn btn-sm btn-warning'));
				$links .= ' | '.anchor('admin/remove/'.$admin->user_id,'remove',array('title'=>'Remove admin','class'=>'btn btn-sm btn-danger'));
				
				$this->table->add_row($admin->firstname,$admin->lastname,$admin->email,$admin->date_created,$links);
				
			}
		?>
		<?php echo $this->table->generate();?>
		
	</div>
</div>
<script>
				$(document).ready(function() {
					$('.datatable').DataTable( {
						"processing": true,
						"serverSide": true,
						"ajax": "<?php echo base_url('admin/ajaxlist');?>"
					} );
				} );
				</script>
