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