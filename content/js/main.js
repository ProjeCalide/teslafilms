$(document).ready(function() {
	
	$(".worklist").mousemove(function(event) {
		var objeid	= $(this).attr("id");
		var sayi	= $(this).attr("id").substring(2);
		var kacta	= sayi / 3;
		kacta		= Math.ceil(kacta);
		kacta		= kacta * 3;
		kacta		= kacta - 3;
		var sayi2	= sayi - kacta;
		var	eksilt	= sayi2 * 300;
		if(sayi2 == 2)
		{
			eksilt = eksilt - 100;
		}else if(sayi2 == 3)
		{
			eksilt = eksilt - 200;
		}

		var frame	= event.pageX;
		var yer		= frame - eksilt;
		if(yer < 45)
		{
			$('#'+objeid).css('background-position', '0px 0px');
		}else if((yer>45) && (yer < 90))
		{
			$('#'+objeid).css('background-position', '0px -100px');
		}else if((yer>90) && (yer < 135))
		{
			$('#'+objeid).css('background-position', '0px -200px');
		}else if(yer>135)
		{
			$('#'+objeid).css('background-position', '0px -300px');
		}
	});
	
	$(".worklist").mouseout(function(){
		var objeid	= $(this).attr("id");
		$('#'+objeid).css('background-position', '0px 0px');
	});

	$(".yonetmenlist").mousemove(function(event) {
		
		var objeid	= $(this).attr("id");
		var sayi	= $(this).attr("id").substring(2);
		var kacta	= sayi / 3;
		kacta		= Math.ceil(kacta);
		kacta		= kacta * 3;
		kacta		= kacta - 3;
		var sayi2	= sayi - kacta;
		var	eksilt	= sayi2 * 350;
		if(sayi2 == 2)
		{
			eksilt = eksilt - 130;
		}else if(sayi2 == 3)
		{
			eksilt = eksilt - 230;
		}

		var frame	= event.pageX;
		var yer		= frame - eksilt;
		//console.log(frame, eksilt, yer);
		if(yer < 45)
		{
			$('#'+objeid).css('background-position', '0px 0px');
		}else if((yer>45) && (yer < 90))
		{
			$('#'+objeid).css('background-position', '0px -100px');
		}else if((yer>90) && (yer < 135))
		{
			$('#'+objeid).css('background-position', '0px -200px');
		}else if(yer>135)
		{
			$('#'+objeid).css('background-position', '0px -300px');
		}
	});
	
	$(".yonetmenlist").mouseout(function(){
		var objeid	= $(this).attr("id");
		$('#'+objeid).css('background-position', '0px 0px');
	});
	
	$('#video_bg').hide();
});

function video(vid)
{
	if(vid != 0)
	{
		$('#video_bg').show();
		$('#video_bg').animate({'opacity':'0.7'});
		$('#video').fadeIn('slow');
		var html_link	= '<div id="video_close"><a href="javascript:kapat();"><img src="http://www.teslafilms.com/content/images/main/video_close.png"></a></div><iframe src="http://player.vimeo.com/video/'+vid+'" width="500" height="375" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		$('#video').html(html_link);
	}
}

function kapat()
{
	$('#video_bg').hide();
	$('#video_bg').animate({'opacity':'0'});
	$('#video').fadeOut('slow');
	var html_bos	= '';
	$('#video').html(html_bos);
}