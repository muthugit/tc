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
<?php if(isset($metaImage)){?>
	<meta property="og:image" content="<?php echo IMAGE_PATH.$metaImage;?>" />
<?php }?>

<!-- Vendor: Bootstrap Stylesheets http://getbootstrap.com -->
<link rel="stylesheet"
	href="<?php echo SITE_PATH;?>assets/css/bootstrap.min.css">
<link rel="stylesheet"
	href="<?php echo SITE_PATH;?>assets/css/font-awesome.min.css">
<link rel="stylesheet"
	href="<?php echo SITE_PATH;?>assets/css/jquery-ui.css">
<link rel="stylesheet" href="<?php echo SITE_PATH;?>assets/css/main.css">
<div class="col-sm-12 col-xs-12" style="background-color: black;">
	<center><a class=" col-sm-3 col-xs-12" href="<?php echo SITE_PATH;?>"><b><img
			class="" src="<?php echo SITE_PATH;?>logo.png" style=""></b></a></center>
		<?php
		if (isSet ( $header ))
			echo $header ['htmlContent'];
		?>
</div>
<?php $this->load->view ( 'common/topNav' );?>
