<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
<li><a href="<?php echo site_url('admin/')?>">List</a></li>
			<li><a href="<?php echo site_url('admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Firstname</th>
	<td><?php echo $tbl_login->firstname?></td>
</tr><tr>
	<th>Lastname</th>
	<td><?php echo $tbl_login->lastname?></td>
</tr><tr>
	<th>Salt</th>
	<td><?php echo $tbl_login->salt?></td>
</tr><tr>
	<th>Email</th>
	<td><?php echo $tbl_login->email?></td>
</tr><tr>
	<th>Date Created</th>
	<td><?php echo $tbl_login->date_created?></td>
</tr>

</table>
	</div>
</div>