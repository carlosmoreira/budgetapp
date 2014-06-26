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
			//echo $this->Html->css('template');
			echo $this->fetch('meta');
			echo $this->fetch('css');
			echo $this->fetch('script');
		?>
		<style type="text/css">
		body{
			padding-top: 80px;
		}
		</style>
	</head>
	<body>
		<!-- Start Nav Bar -->
		
		<!-- Fixed navbar -->
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">BudetIzer</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Nav header</li>
								<li><a href="#">link1</a></li>
								
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						
						<?php if($logged_in):  ?>
						<li>Welcome <?php echo $current_user['email'];?> 
						<?php //echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?></li>			
						<?php else : ?>
						<li><a href="../navbar-static-top/">Register</a></li>
						<li class="active"><a href="./">Login</a></li>
						<li class="divider-vertical"></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
							<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
								<form action="/budget_app/users/login" id="UserLoginForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div><div class="input email required"><label for="UserEmail">Email</label><input name="data[User][email]" maxlength="150" type="email" id="UserEmail" required="required"></div><div class="input password required"><label for="UserPassword">Password</label><input name="data[User][password]" type="password" id="UserPassword" required="required"></div><div class="submit"><input type="submit" value="Login Now"></div></form>
							</div>
						</li>
						<?php //echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?>
						<?php endif; ?>
						
					</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
			<!-- End Nav BAr -->
			<div classs="container-fluid">
				<div id="header">
					<h1>Budgetizer</h1>
				</div>
				
				<div id="content">
					<div>
						<?php if($logged_in):  ?>
						Welcome <?php echo $current_user['email'];?> <?php echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout')); ?>
						<?php else : ?>
						<?php echo $this->Html->link('Login', array('controller'=>'users', 'action'=>'login')); ?>
						<?php endif; ?>
					</div>
					<?php echo $this->Session->flash(); ?>
					<?php echo $this->fetch('content'); ?>
				</div>
				<div id="footer">
					<?php echo $this->Html->link(
							$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
							'http://www.cakephp.org/',
							array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
						);
					?>
					<p>
					<?php echo $cakeVersion; ?>
					</p>
				</div>
			</div>
			<?php echo $this->element('sql_dump'); ?>
		</body>
	</html>