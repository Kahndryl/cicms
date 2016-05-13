<div class="grid-form">
	<div class="grid-form1">
<ul class="pager">
	<li><a href="<?php echo site_url('page/admin')?>">List</a></li>
	<li><a href="<?php echo site_url('page/admin/create')?>">Add</a></li>
</ul>
<?php 
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>
<?php 
	$validation_error = validation_errors(); 
	if(!empty($validation_error)){
		?>
		<div class="alert alert-danger"><?php echo $validation_error ?></div>
		<?php
	}
?>
<?php echo form_open('page/admin/edit/'.$page->id) ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'page_title',
			'id' 		=> 'page_title',
			'class' => 'form-control',
			'value' => $page->page_title,
		);
	?>
    <label for="page_title">Page Title</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'short_content',
			'id' 		=> 'short_content',
			'class' => 'form-control',
			'value' => $page->short_content,
		);
	?>
    <label for="short_content">Short Content</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'content',
			'id' 		=> 'content',
			'class' => 'form-control',
			'value' => $page->content,
		);
	?>
    <label for="content">Content</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_keyword',
			'id' 		=> 'meta_keyword',
			'class' => 'form-control',
			'value' => $page->meta_keyword,
		);
	?>
    <label for="meta_keyword">Meta Keyword</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'meta_description',
			'id' 		=> 'meta_description',
			'class' => 'form-control',
			'value' => $page->meta_description,
		);
	?>
    <label for="meta_description">Meta Description</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		$input = array(
			'name' => 'status',
			'id' 		=> 'status',
			'class' => 'form-control',
			'value' => $page->status,
		);
	?>
    <label for="status">Status</label>
	<?php echo form_input($input);?>
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>