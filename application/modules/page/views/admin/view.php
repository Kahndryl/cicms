<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('page/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('page/admin/create')?>">Add</a></li>
</ul>
<table class="table table-bordered"><tr>
	<th>Page Title</th>
	<td><?php echo $page->page_title?></td>
</tr><tr>
	<th>Slug</th>
	<td><?php echo $page->slug?></td>
</tr><tr>
	<th>Short Content</th>
	<td><?php echo $page->short_content?></td>
</tr><tr>
	<th>Content</th>
	<td><?php echo $page->content?></td>
</tr><tr>
	<th>Meta Keyword</th>
	<td><?php echo $page->meta_keyword?></td>
</tr><tr>
	<th>Meta Description</th>
	<td><?php echo $page->meta_description?></td>
</tr><tr>
	<th>Status</th>
	<td><?php echo $page->status?></td>
</tr><tr>
	<th>Created On</th>
	<td><?php echo $page->created_on?></td>
</tr><tr>
	<th>Updated On</th>
	<td><?php echo $page->updated_on?></td>
</tr>

</table>
</div>
</div>