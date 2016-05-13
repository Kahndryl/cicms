<div class="grid-form">
	<div class="grid-form1">
	
	<center class="pager">Referral</center>

	<input type="text" class="form-control" value="<?php echo base_url('user/register?rf='.$contact);?>" readonly onClick="this.setSelectionRange(0, this.value.length)"/>


</div>
</div>

	
	
					
	
<div class="grid-form">
	<div class="grid-form1">
	
	<center class="pager">Referral List</center>
<?php //print"<pre>";print_r($referals);die; 
foreach($referals as $contact)		
{ ?>
<table class="table table-bordered">


 <tr class="table-row" >
 <td class="table-text" width="">
		<h6>User Name :
			<?php echo $contact->firstname?></h6>
		<p>Email :
			<?php echo $contact->email?></p>
		<p>Country :
			<?php echo $contact->country?></p>
		<p>Contect Number :
			<?php echo $contact->contact?></p>
		<p>Guider Contact :
			<?php echo $contact->guider_contact?></p>
		<p>Stret No :
			<?php echo $contact->stret_no ?></p>
		<p>Building Name :
			<?php echo $contact->building_name ?></p>
		
	</td></tr>
	</table>
	<?php } ?>
	<?php
		if(empty($contact)){
			echo '<strong>No Referral Yet!</strong>';
		}
	?>
	


</div>
</div>

	
	
					
	