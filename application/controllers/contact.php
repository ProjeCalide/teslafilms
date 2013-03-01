<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header',array('header_list' => False,'y_name'=>'<a href="'.base_url().'">Home</a>'));
		$this->load->view('contact');
		$ftr['footer_goster'] = False;
		$ftr['footer_type']	= '';
		$this->load->view('footer',$ftr);
	}
}