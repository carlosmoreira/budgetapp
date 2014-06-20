<h2>Add Household</h2>

<?php 
	echo $this->Form->create('Household'); 
	echo $this->Form->input('name');
	echo $this->Form->hidden('User_id');
	echo $this->Form->end('Submit');

?>
