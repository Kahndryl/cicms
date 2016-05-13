<ul class="pager">
	<li><a href="<?php echo site_url('settings/')?>">List</a></li>
	<li><a href="<?php echo site_url('settings/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Title</th>
	<td><?php echo $setting->title?></td>
</tr><tr>
	<th>Image</th>
	<td><?php echo $setting->image?></td>
</tr><tr>
	<th>Is Active</th>
	<td><?php echo $setting->Is_active?></td>
</tr><tr>
	<th>Description</th>
	<td><?php echo $setting->description?></td>
</tr>

</table>