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
		
			<!--  start table-content  -->
			<div id="table-content">
				<!--  start product-table ..................................................................................... -->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
				<tr>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">User Name</a></th>
					<th class="table-header-repeat line-left minwidth-1"><a href="#nogo">User Mail</a></th>
					<th class="table-header-repeat line-left"><a href="#nogo">Reg Date</a></th>
					<th class="table-header-options line-left"><a href="#nogo">Options</a></th>
				</tr>
<?php
foreach($users as $w)
{
//class="alternate-row"
	echo '
		<tr>
			<td>'.$w->uname.'</td>
			<td>'.$w->usermail.'</td>
			<td>'.date('c',$w->regdate).'</td>
			<td class="options-width">
				<a href="'.base_url('admin').'/'.$page_tab.'/edit/'.$w->ID.'" title="Edit" class="icon-1 info-tooltip"></a>
		';
		if($w->ID != 1)
		{
				echo '<a href="javascript:delete_confirm(\''.base_url('admin').'/'.$page_tab.'/delete/'.$w->ID.'\')" title="Delete" class="icon-2 info-tooltip"></a>';
		}
	echo '
			</td>
		</tr>
	';
}
?>
				</table>
				<!--  end product-table................................... --> 

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