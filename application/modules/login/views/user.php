<!DOCTYPE HTML>
<html>
<head>
<title><?php echo SITE_NAME;?> : Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url(); ?>/assets/admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url(); ?>/assets/admin/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url(); ?>/assets/admin/css/font-awesome.css" rel="stylesheet"> 
<script src="<?php echo base_url(); ?>/assets/admin/js/jquery.min.js"> </script>
<script src="<?php echo base_url(); ?>/assets/admin/js/bootstrap.min.js"> </script>
<style>
	.login-mail i {
		color: #999;
		font-size: 15px;
	}
</style>
</head>
<body>
	<div class="login">
		<h1><a href="<?php echo base_url();?>login/user"><?php echo SITE_NAME?> </a></h1>
		<div class="login-bottom">
			<h2>Login</h2>
			<?php
				if(isset($message)){
					echo '<p class="alert alert-info">'.$message.'</p>';
				}
			?>
			<form action="<?php echo base_url();?>login/user" method="post">
			<div class="col-md-6">
				<div class="login-mail">
					<input type="text" placeholder="Mobile" required="" name="contact">
					<i class="fa fa-envelope"></i>
				</div>
				<div class="login-mail">
					<input type="password" placeholder="Password" required="" name="password">
					<i class="fa fa-lock"></i>
				</div>
				   
			
			</div>
			<div class="col-md-6 login-do">
				<label class="hvr-shutter-in-horizontal login-sub">
					<input type="submit" value="login">
					</label>
					
					<label class="hvr-shutter-in-horizontal  register-sub">
				<a href="<?php echo base_url('user/register');?>">Register</a>
					</label>
					<label class="hvr-shutter-in-horizontal login-sub btn-warning">
				<a href="<?php echo base_url('user/forgot');?>">Forgot Password</a>
					</label>
					
			</div>
			
			
			
			<div class="clearfix"> </div>
			</form>
		</div>
	</div>
		<!---->
<div class="copy-right">
            <p> &copy; <?php echo date('Y')?> PhakaMoney. All Rights Reserved </a> </p>	    </div>  
<!---->
<!--scrolling js-->
	<script src="<?php echo base_url(); ?>/assets/admin/js/jquery.nicescroll.js"></script>
	<script src="<?php echo base_url(); ?>/assets/admin/js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>

