<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('menu/admin/')?>">List</a></li>
	<li><a href="<?php echo site_url('menu/admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Name</th>
	<td><?php echo $menu->name?></td>
</tr><tr>
	<th>Link</th>
	<td><?php echo $menu->link?></td>
</tr><tr>
	<th>Parent Id</th>
	<td><?php echo $menu->parent_id?></td>
</tr><tr>
	<th>Order</th>
	<td><?php echo $menu->order?></td>
</tr>

</table>
</div>
<div>