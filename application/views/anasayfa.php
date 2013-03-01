	<div id="content">
		<div id="yonetmen_list_works">
			<ul>
				<? $sayi = 1; ?>
				<? foreach($this->yonetmen_model->yonetmen_listesi() AS $y){ ?>
				<? if($y->id==8){?>
				<li style="width: 180px;"></li>
				<? } ?>
				<li>
					<a href="<?=base_url('yonetmen');?>/<?=seourl($y->isim);?>/<?=$y->id;?>">
						<div id="wl<?=$sayi;?>" class="yonetmenlist" style="background: url('<?=base_url('content/images');?>/<?=$y->resim;?>') 0px 0px no-repeat;"></div>
					</a>
					<div class='clear'></div><!-- .clear -->
					<a href="<?=base_url('yonetmen');?>/<?=seourl($y->isim);?>/<?=$y->id;?>" title="Tesla - <?=$y->isim;?>"><?=$y->isim;?></a>
				</li>
				<? $sayi++; ?>
				<? } ?>
			</ul>
		</div><!-- #works -->
		<div class='clear'></div><!-- .clear -->
	</div><!-- #content -->