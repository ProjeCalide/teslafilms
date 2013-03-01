<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Yonetmen extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('yonetmen_model');
	}

	public function index($id='')
	{
		$this->works($id);
	}
	
	public function works($id='')
	{
		$this->load->view('header',array('header_list' => False, 'y_name'=>$this->yonetmen_model->yonetmen_ad($id)));
		$data['y_id']	= $id;
		$this->load->view('yonetmen_works', $data);
		$ftr['footer_goster']	= True;
		$ftr['footer_type']	= 'in_page';
		$this->load->view('footer', $ftr);
	}
}