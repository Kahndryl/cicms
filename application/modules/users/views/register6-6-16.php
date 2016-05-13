<link rel="stylesheet" href="<?php echo base_url('assets/front/form/formsthirdparty.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/front/form/formslive.css');?>">
<link href="<?php echo base_url('assets/front/form/fonts.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('assets/front/form/plain.css');?>" rel="stylesheet" type="text/css">
<style id="CUSTOM_STYLE_TAG"></style>
<link href="<?php echo base_url('assets/front/form/media.css');?>" rel="stylesheet" type="text/css">
<link href="<?php echo base_url('plainMedia.css');?>" rel="stylesheet" type="text/css">
<?php if($this->session->flashdata('match_guider_contact')!='') { ?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('match_guider_contact');?>
			<i class="fa fa-times pull-right alert-dismiss" data-dismiss="alert"></i>
		</div>
<?php } ?>
<div class="backgroundBg">
   <div class="backgroundSecBg">
      <div elname="frmTemplate" class="templateWidth">
         <div class="topContainer"></div>
         <div class="centerContainer ">
            <div id="formDiv">
               <div id="logo-wallpaper" class="fLogowall" style="display:none"><img id="logo-wallpaper-img" src=""></div>
               <div id="fileuploadtemplate" style="display:none"></div>
			   <?php
					$error = $this->session->flashdata('error');
					$message = $this->session->flashdata('message');
					if(!empty($error)){
						echo '<div class="alert alert-danger">'.$error.'</div>';
					}
					if(!empty($message)){
						echo '<div class="alert alert-info">'.$message.'</div>';
					}
				?>
               <form id="test" name="test" action="<?php echo base_url('user/register')?>" method="post">
                  <div openurl="1" elname="" id="formRedirectURL" class="templateWrapper" style="min-height:543px;">
                     <ul class="tempHeadBdr formRelative">
                        <li class="tempHeadContBdr">
                           <span style="display: none" class="formLogo" id="logo-formheader"><img src="" id="logo-formheader-img"></span> 
                           <h2 class="frmTitle">Phakamoney enrollment form.</h2>
                           <p class="frmDesc">Please use this form to join Phakamoney.</p>
                           <div class="clearBoth"></div>
                        </li>
                     </ul>
                     <!-- 'FieldElement' class is imported in order to get the key for display name of the component of 'Address' field. -->
                     <div class="formRelative">
                        <ul class="ulNoStyle subContWrap topAlign" elname="formBodyULName" id="formBodyUL">
                           <li mandatory="true" compname="Name" id="Name-li" needdata="true" comptype="7" class="tempFrmWrapper name namemedium">
                              <label class="labelName">Name
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv">
                                 <div>
                                    <span>
                                       <input type="text" name="firstname" elname="first" maxlength="255">
                                       <!-- Display name of 'First' component of 'Name' field. -->
                                       <label class="formSubInfoText">First</label> 
										<?php echo form_error('firstname', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
									</span>
                                    <span class="last">
                                       <input type="text" name="surname" elname="last" maxlength="255">
                                       <!-- Display name of 'Last' component of 'Name' field. -->
                                       <label class="formSubInfoText">Last</label> 
									   <?php echo form_error('surname', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                    </span>
									
                                    <div class="clearBoth"></div>
                                 </div>
                                 <p id="error-Name" elname="error" class="errorMessage"></p>
                              </div>
                              <div class="clearBoth"></div>
                           </li>
                           <li mandatory="true" compname="PhoneNumber" needdata="true" id="PhoneNumber-li" comptype="11" class="tempFrmWrapper  small">
                              <label class="labelName">Phone Number
                              <em class="important">*</em>
                              </label>
                              <div phoneformat="INTERNATIONAL" elname="phoneFormatElem" class="tempContDiv">
                                 <div>
                                    <input type="text" value="" maxlength="20" elname="countrycode" name="contact">
                                    <div class="clearBoth"></div>
                                 </div>
                                 <?php echo form_error('contact', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                 <p id="hint-PhoneNumber" elname="hint" class="instruction"> Please use the international format ie: 27768202031</p>
                              </div>
                              <div class="clearBoth"></div>
                           </li>
                           <li mandatory="true" compname="Number" needdata="true" id="Number-li" comptype="3" class="tempFrmWrapper small">
                              <label class="labelName">Cel number of the member that introduced you.
                              <em class="important">*</em>
                              </label>
							  <?php
								$contactrf = '';
								if(isset($_GET['rf']) && !empty($_GET['rf'])){
									$contactrf = strip_tags($_GET['rf']);
								}
							  ?>
                              <div class="tempContDiv">
                                 <span><input type="text" value="<?php echo $contactrf;?>" name="guider_contact" maxlength="18"></span> 
                                  <?php echo form_error('guider_contact', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                 <p id="hint-Number" elname="hint" class="instruction"> If no one introduced you then do not enter anything in this box. </p>
                              </div>
                              <div class="clearBoth"></div>
                           </li>
                           <li mandatory="true" compname="Email" needdata="true" id="Email-li" comptype="9" class="tempFrmWrapper small">
                              <label class="labelName">Email
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv">
                                 <span> <input type="text" value="" name="email" onchange="zf_rule.evalRules(this);" maxlength="255"></span> 
                                  <?php echo form_error('email', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                              </div>
                              <div class="clearBoth"></div>
                              <div class="clearBoth"></div>
                           </li>
						   <li mandatory="true" compname="Email" needdata="true" id="Email-li" comptype="9" class="tempFrmWrapper small">
                              <label class="labelName">Confirm Email
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv">
                                 <span> <input type="text" value="" name="cnfrm_email" onchange="zf_rule.evalRules(this);" maxlength="255"></span> 
                                  <?php echo form_error('cnfrm_email', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                              </div>
                              <div class="clearBoth"></div>
                              <div class="clearBoth"></div>
                           </li>
                           <li mandatory="true" compname="Address" id="Address-li" needdata="true" comptype="8" class="tempFrmWrapper address addrlarge">
                              <div class="arrowNav"></div>
                             <!-- <label class="labelName">Where must we send your money?
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv address">
                                 <div class="addrCont">
                                    <div class="addOne">
                                       <input type="text" name="bank_name" maxlength="255">
                                       <!-- Display name of 'AddressLine1' component of 'Address' field. 
                                    <label class="formSubInfoText">Bank Name</label>
									    <?php echo form_error('bank_name', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                    </div>
                                    <div class="addOne">
                                       <input type="text" name="account_holder" maxlength="255">
                                       <!-- Display name of 'AddressLine2' component of 'Address' field. 
                                       <label class="formSubInfoText">Account holders name</label>
									    <?php echo form_error('account_holder', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?> 
                                    </div>
                                    <span class="flLeft addtwo">
                                       <input type="text" name="account_number" maxlength="255">
                                        Display name of 'City' component of 'Address' field. 
									   
                                       <label class="formSubInfoText">Account number</label> 
									     <?php echo form_error('account_number', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?> 
                                    </span>
                                    <span class="flLeft addtwo">
                                       <input type="text" name="branch_name" maxlength="255">
                                        Display name of 'Region' component of 'Address' field. 
                                       <label class="formSubInfoText">Branch name</label> 
									    <?php echo form_error('branch_name', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?> 
                                    </span>
                                    <span class="flLeft addtwo">
                                       <input type="text" name="branch_code" maxlength="255">
                                        Display name of 'ZipCode' component of 'Address' field. 
                                       <label class="formSubInfoText">Branch code</label> 
									     <?php echo form_error('branch_code', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?> 
                                    </span> 
                                    <div class="clearBoth"></div>
                                    <p id="error-Address" elname="error" class="errorMessage"></p>
                                 </div>
                              </div>   -->
                              <div class="clearBoth"></div>
                           </li>
						   
<!-- Vinay Gupta Temporary -->
						   
                          <!-- <li mandatory="true" compname="SingleLine" needdata="true" id="SingleLine-li" comptype="1" class="tempFrmWrapper small">
                              <label class="labelName">How much would you like to deposit? 
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv">
                                 <span><input type="text" value="1000" name="initial_amount" maxlength="255"></span> 
                                <?php echo form_error('initial_amount', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                 <p id="hint-SingleLine" elname="hint" class="instruction"> Please note you have 48 hrs to pay the money, or you will be banned from the community for life. </p>
                              </div>
                              <div class="clearBoth"></div>
                           </li>
                           <li mandatory="true" compname="Dropdown1" needdata="true" id="Dropdown1-li" comptype="12" class="tempFrmWrapper small">
                              <label class="labelName">How long will you "Offer" help for ?
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv">
                                 <div class="form_sBox">
                                    <div class="customArrow"></div>
                                    <select name="scheme_id">
                                       <option value="" selected="true">-Select-</option>
                                       <option value="3">3 months</option>
                                       <option value="4">4 months</option>
                                       <option value="5">5 months</option>
                                       <option value="6">6 months</option>
                                       <option value="7">7 months</option>
                                       <option value="8">8 months</option>
                                       <option value="9">9 months</option>
                                       <option value="10">10 months</option>
                                       <option value="11">11 months</option>
                                       <option value="12">1 year</option>
                                    </select>
                                 </div>
                                <?php echo form_error('scheme_id', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                 <p id="hint-Dropdown1" elname="hint" class="instruction"> Please select the time period you wish to circulate your "Offer" of help.</p>
                              </div>
                              <div class="clearBoth"></div>
                           </li>
                           <li mandatory="true" compname="Dropdown" needdata="true" id="Dropdown-li" comptype="12" class="tempFrmWrapper small">
                              <label class="labelName">How would you like to Deposit?
                              <em class="important">*</em>
                              </label>
                              <div class="tempContDiv">
                                 <div class="form_sBox">
                                    <div class="customArrow"></div>
                                    <select name="deposit_method">
                                       <option value="" selected="true">-Select-</option>
                                       <option value="Bitcoin (+20% interest = 50% p/month)">Bitcoin (+20% interest = 50% p/month)</option>
                                       <option value="Cash Deposit">Cash Deposit</option>
                                       <option value="Bank Transfer">Bank Transfer</option>
                                       <option value="Other">Other</option>
                                       <option value="Paypal">Paypal</option>
                                       <option value="FNB E-Wallet">FNB E-Wallet</option>
                                       <option value="Vodacom M-Pesa">Vodacom M-Pesa</option>
                                       <option value="Mobile Money">Mobile Money</option>
                                    </select>
                                 </div>
                                 <?php echo form_error('deposit_method', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                                 <p id="hint-Dropdown" elname="hint" class="instruction"> All payments made in Bitcoin will earn an additional 10% when credited to your back office.</p>
                              </div>
                              <div class="clearBoth"></div>
                           </li>-->
                           <li mandatory="true" compname="DecisionBox" id="DecisionBox-li" needdata="true" comptype="18" class="tempFrmWrapper decesion ">
                              <div class="tempContDiv">
                                 <input type="checkbox" name="DecisionBox" id="DecisionBox" onclick="zf_rule.evalRules(this);">
                                 <label for="DecisionBox" class="labelName">I agree.
                                 <em class="important">*</em>
                                 </label>
                               <?php echo form_error('DecisionBox', '<p id="error-Number" elname="error" class="errorMessage" style="display:block; color:#B04848;">', '</p>');?>
                              </div>
                              <div class="clearBoth"></div>
                           </li>
                           <li compname="Section" class="tempFrmWrapper section">
                              <h2>Please note:</h2>
                              <p>You will receive an email with payment instructions, always use your cel number as reference or we will not be able to credit your investment to your account.</p>
                           </li>
                        </ul>
                     </div>
                     <!-- Uncomment the following Code to enable automation location based value filling for GeoLocation Fields -->
                     <!-- Set the mapquestURL from zohoforms.properties -->
                     <!--   -->
                     <!--Div to show error for unconfirmed users -->
                     <div class="errorMsgWrapper" style="display:none" id="errorDiv">
                        <div class="flLeft errorIcon"></div>
                        <div class="errorMsgCont">
                           <h2>Error Occurred!</h2>
                           <span id="errorMsgSpan">You haven't verified your email yet, click<a onclick="ZFUtil.resendMail('0');" href="javascript:;"> here </a> to receive a verification email.</span>
                        </div>
                        <div class="clearBoth"></div>
                     </div>
                     <ul class="footerWrapper formRelative">
                        <li elname="0" id="formAccess" class="btnAllign fmFooter">
                           <div class="formRelative inlineBlock submitWrapper">
                              <button type="submit" class="fmSmtButton submitColor fmSmtButtom"><em>Proceed</em></button>
                           </div>
                        </li>
                     </ul>
                  </div>
                  <!-- 'formRedirectURL' ends -->
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

