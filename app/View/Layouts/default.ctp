<?php
/**
*
*
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @package       app.View.Layouts
* @since         CakePHP(tm) v 0.10.0.1076
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
		</title>
		<script type="text/javascript" src='http://code.jquery.com/jquery-1.11.1.min.js'></script>
		<script type="text/javascript" src='/budget_app/js/bootstrap.js'></script>
		<?php
			echo $this->Html->meta('icon');
			echo $this->Html->css('bootstrap');
			echo $this->Html->css('custom');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<style type="text/css">
		
		</style>
	</head>
	<body>
		<?php echo $this->element('site_nav');
			if($logged_in)
				echo $this->fetch('nav_site_loggedin');
			else
				echo $this->fetch('nav_site_reg');
		?>
		<div classs="container-fluid">
			<div id="header">
				
			</div>
			
			<div id="content">
				
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<div class="footer">
				<div class="row text-center">
					<div class="col-md-4">
						<h4>Contact Info</h4>
						<p id="contact_info">
						Carlos Moreira
						<br /><br />
						123 NW 79th St.<br />
						Pembroke Pines FL, 33027
						<br /><br />
						Email: <a href="#">carlos@therealcarlos.com</a>
						</p>
					</div>
					<div class="col-md-4">
						<h4>Links</h4>
					</div>
					<div class="col-md-4">
						<h4>Try It!</h4>
						<p>Click here to try it now!</p>
					</div>
				</div>
				<hr />
				<span class='text-center'>All Rights Reserved &copy; BudgetIzer
				<br />
				Powered By <a href="http://www.therealcarlos.com">www.therealcarlos.com</a>
				</span>
			</div>
		</div>
		<?php echo $this->element('sql_dump'); ?>
		<?php echo $this->fetch('scriptBottom'); ?>
	</body>
</html>