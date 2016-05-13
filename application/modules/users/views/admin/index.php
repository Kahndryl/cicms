<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/jquery.dataTables.min.js') ?>"></script>

<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('users/admin')?>">All User List</a></li>
</ul>
<?php
	$template = array(
						'table_open'            => '<table class="dataTable table table-striped">',
						'thead_open'           => '<thead>',
						'heading_row_start'     => '<tr >',
						'heading_cell_start'    => '<th>',
						'heading_cell_end'      => '</th>',
						'heading_row_end'       => '</tr>',
						'thead_close'           => '</thead>',
						'tbody_open'            => '<tbody>',
						'row_start'             => '<tr>',
						'cell_start'            => '<td>',
						'cell_end'              => '</td>',
						'row_end'               => '</tr>',
						'tbody_close'           => '</tbody>',
						'row_alt_start'         => '<tr>',
						 'cell_alt_start'        => '<td>',
						'cell_alt_end'          => '</td>',
						'row_alt_end'           => '</tr>',
						'table_close'           => '</table>'
                    );

	$this->table->set_template($template);
	$this->table->set_heading('Name','Email','Contact','Action');
	//print'<pre>'; print_r($users);die;
	
?>
<?php echo $this->table->generate();?>
<!--<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('users/admin/index/'.$i)?>"><?php echo $i+1; ?></a></li>
		<?php
	}
?>
</ul>-->
</div>
</div>
<script>
	$(document).ready(function(){
		$('.dataTable').append('<tbody></tbody>');
		get_user_list();
	});
	var page = <?php echo $current_page;?>;
	
	function get_user_list(){
		$.ajax({
		  method: "GET",
		  url: "<?php echo base_url('users/admin/list_ajax/');?>"+"/"+page,
		})
		  .done(function( msg ) {
			if(msg.length > 50){
				$('.dataTable tbody').append(msg);
				page = page +1;
				get_user_list();
			}else{
				$('.dataTable').DataTable();
			}
		  });
	}
</script>

