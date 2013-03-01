	<div id="yonetmen_works">
		<div id="works">
			<ul id="bganimation">
				<? $sayi = 1; ?>
				<? foreach($this->yonetmen_model->get_yonetmen_works($y_id) AS $w){ ?>
				<li>
					<a href="javascript:video(<?=$w->vimeo;?>);">
						<div id="wl<?=$sayi;?>" class="worklist" style="background: url('<?=base_url('content/images');?>/<?=$w->image;?>') 0px 0px no-repeat;"></div>
					</a>
				</li>
				<? $sayi++; ?>
				<? } ?>
			</ul>			
		</div><!-- #works -->
		<div id="diger_yonetmenler">
			<ul>
				<? foreach($this->yonetmen_model->yonetmen_listesi_inpage($y_id) AS $y){ ?>
				<li><a href="<?=base_url('yonetmen');?>/<?=seourl($y->isim);?>/<?=$y->id;?>"><?=$y->isim;?></a></li>
				<? } ?>
			</ul>
		</div><!-- #diger_yonetmenler -->
		<div class='clear'></div><!-- .clear -->
	</div><!-- #yonetmen_works -->
	<div id="video"></div><!-- #video -->