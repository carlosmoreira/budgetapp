<?php
	echo $this->element('nav_controllers');
	echo $this->fetch('nav_bills');
	///echo "<pre>";
	//print_r($Bills);
	//echo "</pre>";

?>  
<span><?php echo $this->Html->link('Prev Month', $prevLink ); ?></span>			
<h2><span id="month"><?php echo $dateDisplay; ?></span></h2>
<span><?php echo $this->Html->link('Next Month', $nextLink ); ?></span>			

<hr />

<h4>Total For <?php echo date('M'); ?> $<span id='monthTotal'></span></h4>

<?php if(!empty($Bills)) : ?>
<form method='post' action="/budget_app/Payments/billpay">

<table>
	<?php $bid = 1; ?>
	<?php foreach ($Bills as $b) : ?>
		<?php $payment_id = $b['payments']['Id']; ?>
		<tr>
			<th class="billName" style="text-align:center;" colspan="2">
				<span class="title">
					<?php echo $b['Bill']['name']; ?>
				</span>
				-
				<span class="info">
					<?php echo $this->Html->link('Info', array('action'=>'info', $b['Bill']['Id']) ); ?>
				</span>
			</th>
		</tr>
		<tr>
			<td>
				Bill Amount<input type='text' class='billAmount'
				name=
					'bill[<?php echo $bid; ?>][amount]'
					value='<?php echo ($payment_id != null || $payment_id != '') ? $b['payments']['amount']  : 0; ?>'>
			</td>
			<td>
				Notes<textarea name='bill[<?php echo $bid; ?>][notes]'><?php echo $b['payments']['notes']; ?></textarea>
			</td>

<input type='hidden' name='bill[<?php echo $bid; ?>][id]' value='<?php echo ($payment_id != null) ? $b["payments"]["Id"] : "false" ; ?>'>
		</tr>
	<input type='hidden' name='bill[<?php echo $bid?>][Bill_Id]' value='<?php echo $b["Bill"]["Id"] ?>'>		
	<?php $bid++ ?>	
	<?php endforeach; ?>
	<tr>
		<td colspan="2"><input type='submit' value='Update'></td>
	</tr>
	
	<input type='hidden' 
		name='household_id' 
		value='<?php echo $household_id;  ?>' />
</table>
</form>
<?php else : ?>
	<h3>Please add bills to this household.</h3>
<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function() {
		var totalBills = 0;
		$('.billAmount').each(function(key, value){
			 totalBills += parseInt(this.value);

		});

		var monthfTotal = $('#monthTotal');
		monthTotal.text(totalBills);
	});
</script>