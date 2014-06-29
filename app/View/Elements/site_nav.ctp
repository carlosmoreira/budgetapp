<!-- REGULAR MENU -->
<?php $this->start('nav_site_reg');  ?>
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
				<li class="active"><a href="/budget_app">Home</a></li>
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
				<li><a href="../navbar-static-top/">Register</a></li>
				<li class="divider-vertical"></li>
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
					<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
						<form action="/budget_app/users/login" id="UserLoginForm" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"></div><div class="input email required"><label for="UserEmail">Email</label><input name="data[User][email]" maxlength="150" type="email" id="UserEmail" required="required"></div><div class="input password required"><label for="UserPassword">Password</label><input name="data[User][password]" type="password" id="UserPassword" required="required"></div><div class="submit"><input type="submit" value="Login Now"></div></form>
					</div>
				</li>
			</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- End Nav BAr -->
	<?php $this->end(); ?>
	
	<!-- LOGGED IN MENU -->
	
	<?php $this->start('nav_site_loggedin');  ?>
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
					<li class="active"><a href="/budget_app">Home</a></li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Household Payments <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li>
								<?php echo $this->Html->link('View All', array('controller'=>'Households','action'=>'index')); ?>	
							</li>
							<li class="divider"></li>
							<li>
								<?php echo $this->Html->link('Add Household', array('controller'=>'Households', 'action'=>'add')); ?>	
							</li>
							
						</ul>
					</li>
					<li><?php echo $this->Html->link('Manage Bills', array('controller'=>'Bills', 'action'=>'all')); ?></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="padding-top:15px;">Welcome <?php echo $current_user['email'];?>
						<li><a href="/budget_app/users/logout">Logout</a></li>
					</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
			<!-- End Nav BAr -->
			<?php $this->end(); ?>