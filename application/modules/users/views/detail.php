
     <!----->
	<div class="content-main">
 	<div class="grid-form">
	<div class="grid-form1">
		<h3>Update Personal Details</h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" action="<?php echo base_url('users/edit_detail'); ?>" enctype="multipart/form-data" method="post">
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">First Name</label>
							<div class="col-sm-8">
								<input type="text" name="name" value="<?php echo $detail->name; ?>" class="form-control1" placeholder="First Name">
								<input name="image" value="<?php echo $detail->image; ?>" type="hidden">
								<div class="valid_error"><?php echo form_error('name'); ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="disabledinput" class="col-sm-2 control-label">Last Name</label>
							<div class="col-sm-8">
								<input name="surname" value="<?php echo $detail->surname; ?>" type="text" class="form-control1" id="disabledinput" placeholder="Last Name">
								<div class="valid_error"><?php echo form_error('surname'); ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Cell No.</label>
							<div class="col-sm-8">
								<input type="text" name="contact" value="<?php echo $detail->contact; ?>" class="form-control1" id="inputPassword" placeholder="Contact">
								<div class="valid_error"><?php echo form_error('contact'); ?></div>
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Guider Cell No.</label>
							<div class="col-sm-8">
								<input type="text" name="guider_contact" value="<?php echo $detail->guider_contact; ?>" class="form-control1" id="inputPassword" placeholder="Guider Cell Number">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Street no.</label>
							<div class="col-sm-8">
								<input type="text" name="stret_no" value="<?php echo $detail->stret_no; ?>" class="form-control1" id="inputPassword" placeholder="Stret No.">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Building Name and No.</label>
							<div class="col-sm-8">
								<input type="text" name="building_name" value="<?php echo $detail->building_name; ?>" class="form-control1" id="inputPassword" placeholder="Building Name and No.">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Street.</label>
							<div class="col-sm-8">
								<input type="text" class="form-control1" name="street" value="<?php echo $detail->street; ?>" id="inputPassword" placeholder="Street">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Suburb.</label>
							<div class="col-sm-8">
								<input type="text" name="suburb" value="<?php echo $detail->suburb; ?>" class="form-control1" id="inputPassword" placeholder="Suburb.">
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">City.</label>
							<div class="col-sm-8">
								<input type="text" name="city" value="<?php echo $detail->city; ?>" class="form-control1" id="inputPassword" placeholder="City">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Country.</label>
							<div class="col-sm-8">
								<input type="text" name="country" value="<?php echo $detail->country; ?>" class="form-control1" id="inputPassword" placeholder="Country">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Change Profile Image</label>
							<div style="width: 300px;cursor:pointer; padding-left: 14px;" class="form-group input-group">
								<span class="form-control"><span id="file_msg"></span>
									<input type="file" style="padding:0px;opacity: 0;" id="image" value="" name="file">
									<?php validation_errors('file'); ?>
								</span>
								<span id="select_file" class="input-group-addon">Browse </span>
							</div>	
						</div>
						<div class="form-group">
							<label for="disabledinput" class="col-sm-2 control-label">Profile Image</label>
							<div class="col-sm-8">
								<img src="<?php if($detail->image == ''){echo base_url('assets/upload/profile/profile.jpg');}else{echo base_url('assets/upload/profile/display/'.$detail->image);} ?>" />
							</div>
						</div>
				</div>
				<div class="bs-example" data-example-id="form-validation-states-with-icons">
					<span id="inputGroupSuccess1Status" class="sr-only">(success)</span>
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
<script>
$(document).ready(function () {
    /*
     * Manage form upload
     */
	$('#image').change(function(){
        if($(this).val() === '') {
            $('#file_msg').text('No file selected.');
        } else {
            $('#file_msg').text($(this).val());
        }
    });
    $('#select_file').on('click', function(){
        $('#image').trigger('click');
    });
});
</script>