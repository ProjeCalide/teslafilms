<?php

class Yonetmen_model extends CI_Model
{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	function yonetmen_listesi()
	{
		$yonetmen_listesi	= $this->db->query("SELECT yonetmen_id as id, isim, resim FROM yonetmenler ORDER BY siralama ASC")->result();
		return $yonetmen_listesi;
	}
	
	function yonetmen_listesi_inpage($id)
	{
		$yonetmen_listesi	= $this->db->query("SELECT yonetmen_id as id, isim FROM yonetmenler WHERE yonetmen_id not in(?) ORDER BY siralama ASC",array($id))->result();
		return $yonetmen_listesi;	
	}
	
	function get_yonetmen_works($id)
	{
		$yonetmen_listesi	= $this->db->query("SELECT 	yonetmen_works_id as id, image, workname, vimeo FROM yonetmen_works WHERE yonetmen_id=? ORDER BY sira ASC",array($id))->result();
		return $yonetmen_listesi;
	}
	
	function yonetmen_ad($id)
	{
		return $this->db->query("SELECT isim FROM yonetmenler WHERE yonetmen_id=?",array($id))->row()->isim;
	}
}