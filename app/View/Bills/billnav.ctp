<?php 
	/*
		Need To Find better solution for grabbing the ID,
		which is the last item in the url
	*/
	$this->start('billnav');
?>

<?php $url = explode('/', $_SERVER["REQUEST_URI"]); ?>
<div class="controller_nav">
	<ul>
		<li><?php echo $this->Html->link('Add', array('action' => 'add' ,  $url[sizeof($url)-1]));?></li>
	</ul>
</div>

