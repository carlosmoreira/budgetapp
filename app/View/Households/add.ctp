<div id="table-container-720">
	<div class="panel panel-default">
		<div class="panel-heading"><h2>Add Household</h2></div>
		<div class="row">
			<div class="col-md-6">
				
				<?php
					echo $this->Form->create('Household');
					echo $this->Form->input('name', array('class'=>'form-control', 'value'=>'Enter Name', 'label'=>false));
				?>
			</div>
			<div class="col-md-6">
				<?php
					echo $this->Form->hidden('User_id');
					echo $this->Form->end(array('value'=>'Submit','class'=>'btn btn-success'));
				?>
			</div>
		</div>
	</div>
</div>