 <?php $this->load->view('backend/header');?>
 <?php $this->load->view('backend/menu');?>
 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">
 
  		<!--banner-->	
		    <div class="banner">
		   
				<h2>
				<a href="<?php echo base_url('admin');?>">Home</a>
				<i class="fa fa-angle-right"></i>
				<span><?php echo $title;?></span>
				</h2>
		    </div>
			<!--//banner-->
			<!--content-->
			<div class="content-top">
				<?php $this->load->view($view);?>
			</div>
			
			
<?php $this->load->view('backend/footer');?>
