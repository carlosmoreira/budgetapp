<?php $this->start('nav_households');  ?>
<div class="controller_nav">
	<ul>
		<li><?php 
			echo $this->Html->link(
				'Add', 
				array(
					'controller'=>'Households',
					'action'=>'add', $url_id)) ?></li>
	</ul>
</div>
<?php $this->end() ?>

<?php $this->start('nav_bills');  ?>
<div class="controller_nav">
	<ul>
		<li><?php echo $this->Html->link('Households', array('controller'=>'Households')); ?></li>
		<li><?php 
			echo $this->Html->link(
				'Add', 
				array(
					'controller'=>'Bills',
					'action'=>'add', $url_id)) ?></li>
	</ul>
</div>
<?php $this->end(); ?>



