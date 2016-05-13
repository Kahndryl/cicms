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
<?php echo form_open('page/admin/create') ?><div class="form-group">
	<?php
		$input = array(
			'name' => 'page_title',
			'id' 		=> 'page_title',
			'class' => 'form-control',
		);
	?>
    <label for="page_title">Page Title</label>
	<?php echo form_input($input);?>
</div><div class="form-group">
	<?php
		//$input = array(
		//	'name' => 'short_content',
		//	'id' 		=> 'short_content',
		//	'class' => 'form-control',
		// );
	?>
    <label for="short_content">Short Content</label>
	<?php // echo form_input($input);?>
	<textarea name='short_content' id='mytextarea' class='form-control'> </textarea>
</div>
<div class="form-group">
	
    <label for="content">Content</label>
	<textarea name='content'id='content' class='form-control'> </textarea>
	
</div>
<div class="form-group">
	
    <label for="meta_keyword">Meta Keyword</label>
	<textarea name='meta_keyword'id='meta_keyword' class='form-control'> </textarea>
	
</div>
<div class="form-group">
	
    <label for="meta_description">Meta Description</label>
<textarea name='meta_description'id='meta_description' class='form-control'> </textarea>
	
</div><div class="form-group">

	
    <label for="status">Status</label>
	 <select name='status' id='status' class='form-control'>
  <option value="1">Publish</option>
   <option value="0">Not Publish</option>
</select> 
</div>
<?php echo form_submit('submit', 'Save!','class="btn btn-primary" ');?>
<?php echo form_close();?>
</div>
</div>