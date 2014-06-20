<h2>Households</h2>
<?php echo $this->element('nav_controllers');
	  echo $this->fetch('nav_households');
 ?>

<table>
	<tr>
		<td>Name</td>
	</tr>
	<?php foreach ($households as $house) : ?>
		<tr>
			<td>
				<span class="home_name"><?php echo $this->Html->link($house['Household']['name'], array(
					 'controller' => 'Bills',
					 'action'=> 'index', $house['Household']['Id'])); ?>
				</span> 
				- 
				<span class="update">
					<?php 
						echo $this->Html->link('Update', array('action'=>'update', $house['Household']['Id']));
					 ?>
				 </span>
			</td>
		</tr>
	<?php endforeach; ?>
</table>