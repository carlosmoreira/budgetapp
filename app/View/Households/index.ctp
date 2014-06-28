<div id="table-container-720">
	<div class="panel panel-default">
		<div class="panel-heading"><h3>Households</h3></div>
		<table class="table table-striped">
			<tr>
				<th>House Name</th>
				<th>Actions</th>
			</tr>
			<?php foreach ($households as $house) : ?>
			<tr>
				<td>
					
					<span class="home_name">
					<h3><?php echo $this->Html->link($house['Household']['name'], array(
						'controller' => 'Bills',
					'action'=> 'index', $house['Household']['Id'])); ?>
					</h3>
					</span>
				</td>
				<td>
					<span class="update">
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
						What To Do? <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><?php echo $this->Html->link('Bills', array(
									'controller' => 'Bills',
							'action'=> 'index', $house['Household']['Id'])); ?></li>
							<li><?php echo $this->Html->link('Edit', array('controller'=>'Households',
																				'action'=>'update',
							$house['Household']['Id'] )) ?></li>
							<li><a href="#">Delete</a></li>
							
						</ul>
					</div>
					</span>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>