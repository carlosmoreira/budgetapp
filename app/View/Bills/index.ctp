<?php
///echo "<pre>";
//print_r($Bills);
	//echo "</pre>";
?>
<div class="text-center">
	<br />
	<span class='changeMonth prevMonth'><?php echo $this->Html->link('', $prevLink , array('class'=>'glyphicon glyphicon-arrow-left') ); ?></span>
	<span id="month"><?php echo $dateDisplay; ?></span>
	<span class='changeMonth nextMonth'><?php echo $this->Html->link('', $nextLink, array('class'=>'glyphicon glyphicon-arrow-right') ); ?></span>
</div>
<hr />
<h4>Total For <?php echo date('M'); ?> $<span id='monthTotal'></span></h4>
<div id="bills_container">
	<?php if(!empty($Bills)) : ?>
	<form role="form" method='post' action="/budget_app/Payments/billpay">
		
		<?php $bid = 1; ?>
		<?php foreach ($Bills as $b) : ?>
		<?php $payment_id = $b['payments']['Id']; ?>
		<div class="row">
			<div class="col-md-2">
				<h4 class="text-center"><?php echo $b['Bill']['name']; ?></h4>
				<h5 class="text-center"><?php echo $this->Html->link('Info', array('action'=>'info', $b['Bill']['Id']) ); ?></h5>
			</div>
			<div class="col-md-2">
				Bill Amount
				<input type='text' class='billAmount form-control'
				name=
				'bill[<?php echo $bid; ?>][amount]'
				value='<?php echo ($payment_id != null || $payment_id != '') ? $b['payments']['amount']  : 0; ?>'>
			</div>
			<div class="col-md-6">
				Notes<textarea class='form-control' name='bill[<?php echo $bid; ?>][notes]'><?php echo $b['payments']['notes']; ?></textarea>
			</div>
		</div>
		
		<input type='hidden' name='bill[<?php echo $bid; ?>][id]' value='<?php echo ($payment_id != null) ? $b["payments"]["Id"] : "false" ; ?>'>
		
		<input type='hidden' name='bill[<?php echo $bid?>][Bill_Id]' value='<?php echo $b["Bill"]["Id"] ?>'>
		<?php $bid++ ?>
		<?php endforeach; ?>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">Update Month</button>
			</div>
		</div>
		
		<input type='hidden' name='household_id' value='<?php echo $household_id;  ?>' />
	</form>
	<?php else : ?>
	<h3>Please add bills to this household.</h3>
	<?php endif; ?>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		
		var totalBills = 0;
		$('.billAmount').each(function(key, value){
			totalBills += parseInt(this.value);
		});
		var monthTotal = $('#monthTotal');
		monthTotal.text(totalBills);
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.billAmount').focus(function(){
			
			var pos = $(this).offset();
			var body = $('body');
			var totalTemplate = "<div class='totalTemplateHolder'><div id='closeTotalTemplate'>X</div></div>";
			body.append(totalTemplate);
			var findTemplate = body.find('.totalTemplateHolder');
			findTemplate.css({
				'top': pos.top - (findTemplate.height()/2)+'px',
				'left': pos.left + $(this).parent().width() +'px'
			});


			var closeTotalTemplate = findTemplate.find('#closeTotalTemplate');
			closeTotalTemplate.click(function(event) {
				/* Act on the event */
				$(this).parent().remove();
			});

		});

	});
</script>