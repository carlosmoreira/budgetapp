<h2>Update</h2>
<?php
	echo $this->element('nav_controllers');
	echo $this->fetch('nav_bills');
?>  


<?php 
	  echo $this->Form->create('Bill');
	  echo $this->Form->input('name');
	  echo $this->Form->end('Submit');
?>


