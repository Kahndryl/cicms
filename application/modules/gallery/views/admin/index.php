<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('gallery/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('gallery/admin/create')?>">Add</a></li>
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

	$this->table->set_heading('Gallery Title','Slug','Status','Created On','Updated On','Action');
	foreach($gallerys as $gallery){
		$links = anchor('gallery/admin/view/'.$gallery->id,'view',array('title'=>'View gallery','class'=>'btn btn-sm btn-success'));
		$links .= ' | '.anchor('gallery/admin/edit/'.$gallery->id,'edit',array('title'=>'Edit gallery','class'=>'btn btn-sm btn-warning'));
		$links .= ' | '.anchor('gallery/admin/remove/'.$gallery->id,'remove',array('title'=>'remove gallery','class'=>'btn btn-sm btn-danger'));
		
		$this->table->add_row($gallery->gallery_title,$gallery->slug,$gallery->status,$gallery->created_on,$gallery->updated_on,$links);
		
	}
?>
<?php echo $this->table->generate();?>
<ul class="pagination">
<?php
	for($i=0;$i<$total_rows/$per_page;$i++){
		?>
		<li <?php echo ($i == $current_page)?'class="active" ':''?>><a href="<?php echo site_url('gallery/admin/index/'.$i)?>"><?php echo $i ?></a></li>
		<?php
	}
?>
</ul>
</div>
</div>
