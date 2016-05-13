<div class="content-main">
 	<div class="grid-form">
	<div class="grid-form1">
			
			<div class="tab-content">
			<?php $status = $this->session->flashdata('status');?>
			<?php
				if(!empty($status)){
					?>
					<span class="alert alert-info"><?php echo $status; ?></span>
					<?php
				}
			?>
				<form class="form-horizontal" action="<?php echo base_url('users/change_password');?>" method="post">
					<div class="form-group">
						<label for="current_password" class="col-sm-2 control-label">Current Password</label>
						<div class="col-sm-8">
						<input type="password" name="current_password" value="" class="form-control1" id="current_password" placeholder="Your current password">
							<div class="valid_error"><?php echo form_error('current_password'); ?></div>
						</div>
						<div class="col-sm-2">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="form-group">
						
						<div class="col-md-4">
						<input type="password" name="new_password" value="" class="form-control1" id="new_password" placeholder="Your New password">
							<div class="valid_error"><?php echo form_error('new_password'); ?></div>
						</div>
						<div class="col-md-4">
					
						<input type="password" name="re_new_password" value="" class="form-control1" id="re_new_password" placeholder="Confirm New Password">
							<div class="valid_error"><?php echo form_error('re_new_password'); ?></div>
						</div>
						<div class="col-md-2">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn-primary btn">Update</button>
							</div>
						</div>
					</div>
				</form>
			</div>
	</div>
	</div>
</div>