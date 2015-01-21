<?php //include ("inc/access.php"); ?>
<!-- Navigation -->
	<nav class="navbar navbar-default " role="navigation" style="margin-bottom: 0">
		<!-- /.navbar-header -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="index.php">
			<img src="img/logo.svg" class="navbar-logo">
			<span class="navbar-brand" ><?php echo $NAME ?></span></a>
		</div>
		<!-- /.navbar-header -->
		<ul class="nav navbar-top-links navbar-right">
			
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
				<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
				<li><a href="form/user-form.php?a=edit&user_id=<?php echo $_SESSION['user_id'];?>"  title="User setting" target="framepopup"  onClick="setdisplay(divpopup,1)"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
				<li class="divider"></li>
				<li><a href="?page=login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
				</li>
				</ul><!-- /.dropdown-user -->
			</li><!-- /.dropdown -->
		</ul><!-- /.navbar-top-links -->
		
		
		<?php  include("sidebar.php"); ?>
        </nav>
