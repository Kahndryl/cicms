<?php $this->load->view('frontend/header');?>
<div class="container">
				<div class="mid-section">
						<div class="mid-top wow fadeInUpBig animated animated" data-wow-delay="0.4s">
							<div class="col-md-10 mid-text">
							<?php
								if(isset($view)){
									$this->load->view($view);
								}
							?>
							<?php if(isset($content)){?>
								<h3><?php echo $content->page_title; ?></h3>
								<?php echo $content->content; ?>
							<?php } ?>
							</div>
							<div class="col-md-2 mid-button">
							
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<?php $this->load->view('frontend/footer');?>
