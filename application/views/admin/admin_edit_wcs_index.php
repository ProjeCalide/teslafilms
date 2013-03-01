<!-- start content -->
<div id="content">
	<!--  start page-heading -->
	<div id="page-heading">
		<h1><?=$title;?></h1>
	</div>
	<!-- end page-heading -->

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
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
<?php
	switch($type)
	{
		case "yonetmen_sec":
?>
		<form method="GET">
			Yönetmen Seçiniz: <select name="yonetmenid">
<?php
foreach($yonetmenler as $y)
{
?>
				<option value="<?=$y->yonetmen_id;?>"><?=$y->isim;?></option>
<?php
}
?>
			</select>
			<input type="submit" value=" Seç ">
		</form>
<?php
		break;
		case "yonetmenworks":
?>
			<!--  start table-content  -->
			<div id="table-content">
				<h3><?=$yononetmen_name->isim;?> Filmleri</h3>
<form method="POST" action="<?=base_url('admin');?>/yonetmenindex/silama?yonetmenid=<?=$_GET['yonetmenid'];?>">
				<!--  start product-table ..................................................................................... -->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Film İsim</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">Film Resim</a></th>
					<th class="table-header-options line-left"><a href="#nogo">Sıra</a></th>
					<th class="table-header-options line-left"><a href="#nogo">Ayarlar</a></th>
				</tr>
<?php
foreach($worklist as $w)
{
	echo '
		<tr>
			<td>'.$w->workname.'</td>
			<td>'.$w->image.'</td>
			<td><input type="text" name="'.$w->yonetmen_works_id.'" value="'.$w->sira.'" class="inp-form" /></td>
			<td class="options-width">
				<a href="'.base_url('admin').'/yonetmenindex/edit/'.$w->yonetmen_works_id.'" title="Edit" class="icon-1 info-tooltip"></a>
				<a href="javascript:delete_confirm(\''.base_url('admin').'/yonetmenindex/delete/'.$w->yonetmen_works_id.'?yonetmenid='.$w->yonetmen_id.'\')" title="Delete" class="icon-2 info-tooltip"></a>';
	echo '
			</td>
		</tr>
	';
}
?>
				</table>
				<!--  end product-table................................... --> 
<?php
		break;
	}
?>

<?
/*
			<!--  start paging..................................................... -->
			<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
			<tr>
			<td>
				<a href="" class="page-far-left"></a>
				<a href="" class="page-left"></a>
				<div id="page-info">Page <strong>1</strong> / 15</div>
				<a href="" class="page-right"></a>
				<a href="" class="page-far-right"></a>
			</td>
			<td>
			<select  class="styledselect_pages">
				<option value="">Number of rows</option>
				<option value="">1</option>
				<option value="">2</option>
				<option value="">3</option>
			</select>
			</td>
			</tr>
			</table>
			<!--  end paging................ -->
*/
?>
<?php if($type=='yonetmenworks'){ ?>
				<table border="0" cellpadding="0" cellspacing="0" id="paging-table">
				<tr>
				<td>
					<div id="page-info">
						<input type="submit" value="Sıralamayı Kaydet" class="form-submit">
					</div>
				</td>
				<td>
				</table>				
</form>
<?php } ?>
			<div class="clear"></div>
		</div>
		<!--  end content-table-inner ............................................END  -->
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