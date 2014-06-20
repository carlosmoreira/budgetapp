<?php
	echo $this->element('nav_controllers');
	echo $this->fetch('nav_bills');
?>
<div class="info_nav">
<ul>
	<li>
		<span class="update">
			<?php
			echo $this->Html->link('Update', array('action'=>'update', $url_id));
			?>
		</span>
	</li>
	<li>
		<span class="remove">
			<?php
			echo $this->Form->postLink('Remove', 'remove/'.$url_id, array('name'=>'Id','value'=>'123'), 'These will stop recording this bill, you can come back later and reenable it.');
			?>
		</span>		
	</li>
</ul>
</div>



