<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<!--<![endif]-->
<head>
<title><?php echo $title;?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="<?php echo $description?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="" />
<!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
<link rel="stylesheet" href="<?php echo SITE_PATH;?>assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo SITE_PATH;?>assets/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo SITE_PATH;?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo SITE_PATH;?>assets/css/main.css">
<nav class="navbar navbar-inverse navbar-fixed-top is-visible">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
				aria-expanded="false">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo SITE_PATH;?>"><b><img src="<?php echo SITE_PATH;?>logo.png"
					style="height: 40px"></b></a>

		</div>
		<?php $this->load->view ( 'common/topNav' );?>
	</div>
</nav>
<div class="firstContainer">