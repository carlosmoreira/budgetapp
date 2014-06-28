<?php
if (!Configure::read('debug')):
	throw new NotFoundException();
endif;
App::uses('Debugger', 'Utility');
$this->Html->script('home.parallax.js', array('block' => 'scriptBottom'));
?>
<div id="parallex_outer">
	<div id="parallex_con">
		<?php echo $this->Html->image('budget_home_parallax.jpg', array('id'=>'parallex_img', 'alt'=>'Budget')); ?>
	</div>
</div>
<div id="triple_blocks_home">
	<div class="row">
		<div class="col-md-4 col-sm-4 text-center">
			<div class="img_cover"><img src="img/budget_management.gif" alt=""></div>
			<h2>Budget Management</h2>
			<p>Manage your monthly bills in an easy to use interface.</p>
		</div>
		<div class="col-md-4 col-sm-4 text-center">
			<div class="img_cover"><img src="img/monthlystatistics.jpg" alt=""></div>
			<h2>Monthly Statistics</h2>
			<p class="text-center">Compare your monthly payments, and see where you money is going.</p>
		</div>
		<div class="col-md-4 col-sm-4 text-center">
			<div class="img_cover"><img src="img/free.jpg" alt=""></div>
			<h2 class="text-center">Free</h2>
			<p>Free bill tracking at no expenses.</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center">
			<img src="img/runningmoney.jpg" alt="">
			<h2>Dont let you money get away</h2>
			<p>Track it down and watch how you spend.</p>
		</div>
	</div>
</div>