<!-- start content -->
<div id="content">


<div id="page-heading"><h1><?=$title;?></h1></div>

<form method="POST" action="<?=base_url('admin');?>/<?=$page_tab;?><?if($editmi=='evet'){echo '/edit/'.$verican->ID;}?>">
<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="<?=base_url('content/admin');?>/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="<?=base_url('content/admin');?>/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner -->
	<div id="content-table-inner">
		<?php if($mesaj_goster): ?>
		<!--  start message -->
		<div id="message-<?=$mesaj_type;?>">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
				<tr>
					<td class="<?=$mesaj_type;?>-left"><?=$mesaj;?></td>
					<td class="<?=$mesaj_type;?>-right"><a class="close-<?=$mesaj_type;?>"><img src="<?=base_url('content/admin');?>/images/table/icon_close_<?=$mesaj_type;?>.gif"   alt="" /></a></td>
				</tr>
			</table>
		</div>
		<!--  end message -->
		<?php endif; ?>
				
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
	
	
		<!--  start step-holder -->
		<div id="step-holder">
			<div class="step-no">1</div>
			<div class="step-dark-left"><a href=""><?=$title;?></a></div>
			<div class="step-dark-right">&nbsp;</div>
<?
/*
			<div class="step-no-off">2</div>
			<div class="step-light-left">Select related products</div>
			<div class="step-light-right">&nbsp;</div>
			<div class="step-no-off">3</div>
			<div class="step-light-left">Preview</div>
			<div class="step-light-round">&nbsp;</div>
*/
?>
			<div class="clear"></div>
		</div>
		<!--  end step-holder -->
	
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">User Name:</th>
			<td><input type="text" name="title" value="<?if($editmi=='evet'){echo $verican->uname;}?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Password:</th>
			<td><input type="password" name="password" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Re-Enter Password:</th>
			<td><input type="password" name="repassword" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">E-Mail:</th>
			<td><input type="text" name="email" value="<?if($editmi=='evet'){echo $verican->usermail;}?>" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th>&nbsp;</th>
			<td valign="top">
				<input type="hidden" name="action" value="<?=$page_tab;?>">
				<input type="submit" value="" class="form-submit" />
			</td>
			<td></td>
		</tr>
		</table>
	<!-- end id-form  -->

	</td>
	<td>

</td>
</tr>
<tr>
<td><img src="<?=base_url('content/admin');?>/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>
 </form>
<div class="clear"></div>
 

</div>
<!--  end content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>


<div class="clear">&nbsp;</div>

</div>
<!--  end content -->