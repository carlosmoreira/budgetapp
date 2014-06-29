<div id="table-container-720">
	<div class="panel panel-default">
		<div class="panel-heading"><h2>All Bills - <?php echo $this->html->link('New Bill', array('action'=>'add', $url_id)); ?></h2></div>
		<div class="row">
			<div class="col-md-12">
				<div id='householdchangeholder'>
					<select id='householdchange' class="form-control">
						<option value="">Select Home</option>
						<?php foreach($allhouseholds as $ahousehold): ?>
						<option value="<?php echo $ahousehold['Household']['Id'] ?>"
						<?php echo ($household == $ahousehold['Household']['Id'] ) ? "selected" :""; ?>><?php echo $ahousehold['Household']['name'] ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<?php if($household != null):?>
				<table class="table table-striped">
					<tr>
						<th>Name</th>
						<th>Recurring</th>
						<th>Active</th>
						<th>Actions</th>
					</tr>
					<?php foreach($bills as $bill): ?>
					<tr>
						<td><?php echo $bill['Bill']['name']; ?></td>
						<td><input type="checkbox" name=''></td>
						<td><input type="checkbox" name='' <?php echo ($bill['Bill']['active']) ? "checked" : ""; ?>></td>
						<td>
							<select name="" id="" class="form-control">
								<option value="">Select Actions</option>
								<option value="">Edit</option>
							</select>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
				<?php endif; ?>
			</div>
		</div>
	</div>
<pre>
<?php $this->Html->script('householdchange.js', array('block' => 'scriptBottom')); ?>