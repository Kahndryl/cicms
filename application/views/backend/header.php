<!DOCTYPE HTML>
<html>
<head>
<title><?php echo SITE_NAME; ?> <?php echo (isset($title))?': '.$title:'';?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Minimal Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url('assets/admin');?>/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="<?php echo base_url('assets/admin');?>/css/style.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/admin');?>/css/font-awesome.css" rel="stylesheet"> 
<link href="<?php echo base_url('assets/');?>/datatables/css/jquery.dataTables.min.css" rel="stylesheet"> 
<link href="<?php echo base_url('assets/');?>/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet"> 
<script src="<?php echo base_url('assets/admin');?>/js/jquery.min.js"> </script>
<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/admin');?>/js/jquery.metisMenu.js"></script>
<script src="<?php echo base_url('assets/admin');?>/js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="<?php echo base_url('assets/admin');?>/css/custom.css" rel="stylesheet">
<script src="<?php echo base_url('assets/admin');?>/js/custom.js"></script>
<script src="<?php echo base_url('assets/admin');?>/js/screenfull.js"></script>
<script src="<?php echo base_url('assets/admin');?>/tinymce/tinymce.min.js"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js');?>"></script>
 <script>tinymce.init({ selector:"#content" });</script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});
			

			
		});
		</script>

</head>
<body>
<div id="wrapper">


        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="<?php echo base_url('admin');?>"><?php echo SITE_NAME;?></a></h1>         
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>	
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>
     
       <?php //print'<pre>';print_r($email);die;?>
            <!-- Brand and toggle get grouped for better mobile display -->
		 
		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
				<?php
						$this->load->helper('users/users');
						$user_id = get_loged_admin_id();
					?>
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret"><?php echo get_admin_name($user_id);?><i class="caret"></i></span><img src="<?php echo base_url('assets/admin');?>/images/wo.jpg"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="<?php echo base_url('admin/edit/'.$user_id);?>"><i class="fa fa-user"></i>Edit Profile</a></li>
		                <li><a href="<?php echo base_url('login/admin/logout');?>"><i class="fa fa-envelope"></i>Logout</a></li>
		              </ul>
		            </li>
		           
		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">
       
     </div>
	  
