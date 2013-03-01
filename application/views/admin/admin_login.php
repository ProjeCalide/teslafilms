<?php echo doctype(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Tesla Admin Login</title>
<link rel="stylesheet" href="<?=base_url('content/admin');?>/css/screen.css?v=1" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="<?=base_url('content/admin');?>/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="<?=base_url('content/admin');?>/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="<?=base_url('content/admin');?>/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
$(document).pngFix( );
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<a href="<?=base_url();?>"><img src="<?=base_url('content');?>/images/main/tesla_logo.png" height="40" alt="" /></a>
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
		<div align="center"><?=$mesaj;?></div>
		<?=br(2);?>
	<form method="POST" action="<?=base_url('admin/login');?>">
	<!--  start login-inner -->
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text" class="login-inp" name="username" /></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input name="pass" type="password" value="************"  onfocus="this.value=''" class="login-inp" /></td>
		</tr>
<?
/*
		<tr>
			<th></th>
			<td valign="top"><input type="checkbox" class="checkbox-size" id="login-check" /><label for="login-check">Remember me</label></td>
		</tr>
*/
?>
		<tr>
			<th></th>
			<td><input type="submit" class="submit-login"  /></td>
		</tr>
		</table>
	</div>
 	<!--  end login-inner -->
	</form>
	<div class="clear"></div>
<?
/*
	<a href="" class="forgot-pwd">Forgot Password?</a>
*/
?>
 </div>
 <!--  end loginbox -->
<?
/* 
	<!--  start forgotbox ................................................................................... -->
	<div id="forgotbox">
		<div id="forgotbox-text">Please send us your email and we'll reset your password.</div>
		<!--  start forgot-inner -->
		<div id="forgot-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Email address:</th>
			<td><input type="text" value=""   class="login-inp" /></td>
		</tr>
		<tr>
			<th> </th>
			<td><input type="button" class="submit-login"  /></td>
		</tr>
		</table>
		</div>
		<!--  end forgot-inner -->
		<div class="clear"></div>
		<a href="" class="back-login">Back to login</a>
	</div>
	<!--  end forgotbox -->
*/
?>
</div>
<!-- End: login-holder -->
</body>
</html>