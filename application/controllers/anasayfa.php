<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anasayfa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('yonetmen_model');
	}

	public function index()
	{
		$this->load->view('header',array('header_list' => False, 'y_name'=>''));
		$this->load->view('anasayfa');
		$data['footer_goster']	= True;
		$data['footer_type']	= 'main';
		$this->load->view('footer', $data);
	}
}