<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Tesla Films" />
	<meta name="keywords" content="Tesla" />
	<meta name="author" content="ProjeCalide" />
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<title>Tesla Films</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('content/css');?>/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('content/css');?>/fonts.css" />
	<link rel="stylesheet" type="text/css" href="<?=base_url('content/css');?>/style.css?v=2" />
	<link REL="SHORTCUT ICON" HREF="<?=base_url('content/images/main');?>/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="<?=base_url('content/js');?>/main.js"></script>
</head>
<body>
<div id="page">
	<div id="header">
		<div id="logo"><a href="<?=base_url();?>"><img src="<?=base_url('content/images/main');?>/tesla_logo_v2.jpg"></a></div><!-- #logo -->
<?php if($header_list === True){ ?>
		<div id="contact_list_header">
			<h2><?=$y_name;?></h2>
		</div><!-- #contact_list_header -->
		<div id="header_line6"></div>
<?php }else{ ?>
		<div id="contact">
		<div id="contact_list_header">
			<h2><?=$y_name;?></h2>
		</div><!-- #contact_list_header -->
		<ul>
				<li><a href="<?=base_url('contact');?>">Contact</a></li>
				<li><a href="http://www.facebook.com/Teslafilms"><img src="<?=base_url('content/images/main');?>/facebook.png"></a></li>
				<li><a href="https://twitter.com/Teslafilms"><img src="<?=base_url('content/images/main');?>/twitter.png"></a></li>
				<li><a href="https://vimeo.com/user11454531"><img src="<?=base_url('content/images/main');?>/vimeologo.png"></a></li>
			</ul>
			<div class='clear'></div><!-- .clear -->
		</div><!-- #contact -->
		<div id="header_line8"></div>
<?php } ?>
	</div><!-- #header -->