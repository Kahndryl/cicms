<?php //print"<pre>"; print_r($editdetail); die;?>
     <!----->
	<div class="content-main">
 	<div class="grid-form">
	<div class="grid-form1">
	
	
	<?php 
	if(isset($message) && !empty($message)){
		?>
		<div class="alert alert-info"><?php echo $message ?></div>
		<?php
	}
?>
		<h3>Update Bank Details</h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
				
				
				<form class="form-horizontal" action="<?php echo base_url('users/edit_bank'); ?>" method="post">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Account Holder</label>
						<div class="col-sm-8">
					<input type="text" name="account_holder" value="<?php echo (isset($editdetail->account_holder))?$editdetail->account_holder:''; ?>" class="form-control1" id="focusedinput" placeholder="Account Holder">
							<div class="valid_error"><?php echo form_error('account_holder'); ?></div>
						</div>
						<div class="col-sm-2">
							<p class="help-block"></p>
						</div>
					</div>
					<div class="form-group">
						<label for="disabledinput" class="col-sm-2 control-label">Bank Name</label>
						<div class="col-sm-8">
							<input type="text" name="bank_name" value="<?php echo (isset($editdetail->bank_name))?$editdetail->bank_name:''; ?>" class="form-control1" id="disabledinput" placeholder="Bank Name">
							<div class="valid_error"><?php echo form_error('bank_name'); ?></div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">Account No.</label>
						<div class="col-sm-8">
							<input type="text" name="account_number" value="<?php echo (isset($editdetail->account_number))?$editdetail->account_number:''; ?>" class="form-control1" id="inputPassword" placeholder="Account Number">
							<div class="valid_error"><?php echo form_error('account_number'); ?></div>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">Branch Code</label>
						<div class="col-sm-8">
							<input type="text" name="branch_code" value="<?php echo (isset($editdetail->branch_code))?$editdetail->branch_code:''; ?>" class="form-control1" id="inputPassword" placeholder="Branch Code">
							<div class="valid_error"><?php echo form_error('branch_code'); ?></div>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">Branch name</label>
						<div class="col-sm-8">
							<input type="text" name="branch_name" value="<?php echo (isset($editdetail->branch_name))?$editdetail->branch_name:'' ?>" class="form-control1" id="inputPassword" placeholder="Branch Name">
							<div class="valid_error"><?php echo form_error('branch_name'); ?></div>
						</div>
					</div>

					<div class="form-group">
						<label for="inputPassword" class="col-sm-2 control-label">&nbsp;</label>
						<div class="col-sm-8">
							Saving Account <input type="radio" <?php echo (isset($editdetail->saveing_current) && ($editdetail->saveing_current == 1))?'Checked':''; ?> name="saveing_current" value="1"> 
							Current Account <input type="radio" <?php echo (isset($editdetail->saveing_current) && ($editdetail->saveing_current == 0))?'Checked':''; ?> name="saveing_current" value="0"> 
							<div class="valid_error"><?php echo form_error('saveing_current'); ?></div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
								<button class="btn-primary btn">Save</button>
							</div>
						</div>
					</div>
				</form>
  </div>
 	</div>
 	<!--//grid-->
		<!---->
		</div>
		</div>
		<div class="clearfix"> </div>
  

