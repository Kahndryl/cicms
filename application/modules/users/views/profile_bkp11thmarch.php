
       <div class="content-main">

 	 <div class=" profile">

		<div class="profile-bottom">
			<h3><i class="fa fa-user"></i>Profile</h3>
			<div class="profile-bottom-top">
			<div class="col-md-4 profile-bottom-img">
				<img width="150" height="150" src="<?php if($profileDetail->image == ''){echo base_url('assets/upload/profile/profile.jpg');}else{echo base_url('assets/upload/profile/display/'.$profileDetail->image);} ?>" alt="">
			</div>
			<div class="col-md-8 profile-text">
				<h6><?php echo $profileDetail->firstname." ".$profileDetail->surname; ?></h6>
				<table>
					<tr>
						<td>Joined</td>  
						<td>:</td>  
						<td>  <?php echo date('d M Y',strtotime($profileDetail->created_on)); ?></td></tr>
					
					<tr>
						<td>User ID</td>
						<td> :</td>
						<td> <?php echo $profileDetail->email; ?></td>
					</tr>
					<tr>
						<td>Country </td>
						<td>:</td>
						<td> <?php echo $profileDetail->country; ?></td>
					</tr>
				</table>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-bottom-bottom">
			<div class="col-md-4 profile-fo">
				<h4>coming soon...</h4>
				<p>Help Given</p>
				<a href="#" class="pro"><i class="fa fa-plus-circle"></i>Offer Help</a>
			</div>
			<div class="col-md-4 profile-fo">
				<h4><?php echo number_format(get_user_help_received($profileDetail->user_id),2);?></h4>
				<p>Help Received</p>
				<a href="<?php echo base_url('request/create');?>" class="pro1"><i class="fa fa-user"></i>Request Help</a>
			</div>
			<div class="col-md-4 profile-fo">
				<h4><?php echo number_format(get_user_balance($profileDetail->user_id),2)?></h4>
				<p>Balance</p>
				<a href="#"><i class="fa fa-cog"></i>Settings</a>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="profile-btn">
				<button type="button" onclick="location.href='<?php echo base_url('users/change_password');?>'" class="btn bg-red" style="margin-left:10px;">Change Password</button>
                <button type="button" onclick="location.href='<?php echo base_url('offers/user');?>'" class="btn bg-red">Account Summary</button>
           <div class="clearfix"></div>
			</div>
			 
			
		</div>
		
		
		
		
	</div>
	<!--//gallery-->
		<!---->

		</div>
		
		<div class="clearfix"> </div>
      