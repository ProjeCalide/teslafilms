<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('generate_password'))
{
	function generate_password($pass)
	{
		$pass	= 'projecalide'.$pass;
		$pass	.= 'de4da4f9f4448c567a671b01ea1a07729db26b87';
		$pass	= base64_encode($pass);
		return md5($pass);
	}
}

if ( ! function_exists('seourl'))
{
	function seourl($string)
	{
			$string	= iconv("UTF-8", "ISO-8859-1//TRANSLIT", $string);
			$string = preg_replace("`\[.*\]`U","",$string);
			$string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
			$string = htmlentities($string, ENT_QUOTES, 'ISO-8859-1');
			$trans	= array(
						"&thorn;"	=> 's',
						"&eth;"		=> 'g',
						"&THORN;"	=> 'S',
						"&ETH;"		=> 'G',
						"&YACUTE;"	=> 'I',
						"&yacute;"	=> 'i'
				);
			$string	= strtr($string, $trans);
			$string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
			$string = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $string);
			return strtolower(trim($string));
	}
}