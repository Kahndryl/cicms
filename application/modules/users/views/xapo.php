
     <!----->
	<div class="content-main">
 	<div class="grid-form">
	<div class="grid-form1">
		<h3>Update Xapo Card Address</h3>
			<div class="tab-content">
				<div class="tab-pane active" id="horizontal-form">
					<form class="form-horizontal" action="<?php echo base_url('users/update_xapo'); ?>" enctype="multipart/form-data" method="post">
						<div class="form-group">
							<label for="focusedinput" class="col-sm-2 control-label">Xapo Card Address</label>
							<div class="col-sm-8">
								<input type="text" name="xapo_address" value="<?php echo (isset($xapo->xapo_address))?$xapo->xapo_address:''; ?>" class="form-control1" id="focusedinput" placeholder="Enter Your Xapo Xapo Card Address">
							</div>
							<div class="col-sm-2">
								<p class="help-block"></p>
							</div>
						</div>
						<div class="form-group">
							<label for="checkbox" class="col-sm-2 control-label">Checkbox</label>
							<div class="col-sm-8">
								<div class="checkbox-inline1"><label><input <?php echo (isset($xapo->send_btc) && ($xapo->send_btc == 1))?'Checked':''; ?> name="send_btc" type="checkbox" value="1"> Send BTC</label></div>
								<div class="checkbox-inline1"><label><input <?php echo (isset($xapo->receive_btc) && ($xapo->receive_btc == 0))?'Checked':''; ?> name="receive_btc" type="checkbox" value="0"> Receive BTC</label></div>
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