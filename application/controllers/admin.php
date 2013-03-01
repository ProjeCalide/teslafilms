<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	private $user;
	private $login;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('html');
		$this->user	= $this->session->userdata('adminid');
		if($this->user)
		{
			$this->login	= TRUE;
		}else{
			$u_name	= $this->input->cookie('tesla_films');
			$this->_cookie_login($u_name);
		}
		
	}

	public function index(){
		if($this->login)
		{
			$head['page']		= 'anasayfa';
			$head['page_tab']	= 'istatistikler';
			$head['uid']		= $this->user;
			$this->load->view('admin/admin_header.php', $head);
			$this->load->view('admin/admin_dashboard.php');
			$this->load->view('admin/admin_footer.php');
		}else{
			$this->load->view('admin/admin_login.php', array('mesaj' => ''));
		}
	}
	
	public function _cookie_login($u_name)
	{
		if(!empty($u_name))
		{
			$user_var_mi	= $this->db->query("SELECT ID,uname_clean FROM adm_users where uname_clean=?",array($u_name))->row();
			if(!empty($user_var_mi->ID))
			{
				$this->login	= TRUE;
				$this->user		= $user_var_mi->ID;
			}else{
				$this->login	= FALSE;
			}
		}else{
			$this->login	= FALSE;
		}
	}
	
	public function login()
	{
		$user			= $this->input->post('username');
		$pass			= generate_password($this->input->post('pass'));
		$user_var_mi	= $this->db->query("SELECT uname_clean, password FROM adm_users where uname_clean=?",array($user))->num_rows;
		if($user_var_mi > 0)
		{
			$user	= $this->db->query("SELECT ID, uname_clean, password FROM adm_users where uname_clean=?",array($user))->result();
			if($user[0]->password == $pass)
			{
				$this->input->set_cookie(array('name'   => 'tesla_films', 'value'  => $user[0]->uname_clean, 'expire' => '36000','path'   => '/'));
				$this->session->set_userdata(array('adminid' => $user[0]->ID));
			}else{
				$this->load->view('admin/admin_login.php', array('mesaj' => 'Hatalı kullanıcı adı veya şifresi!'));
			}
		}else{
			$this->load->view('admin/admin_login.php', array('mesaj' => 'Hatalı kullanıcı adı veya şifresi!'));
		}
		header('Location: '.base_url('admin'));
	}
	
	public function yonetmenindex($s='',$id='')
	{
		if($this->login)
		{
			switch($s)
			{
			default:
				$head['page']		= 'veri';
				$head['page_tab']	= 'listworks';
				$head['title']		= 'Yönetmen Filmleri';
				$head['uid']		= $this->user;
				$this->load->view('admin/admin_header.php', $head);
				if(empty($_GET['yonetmenid']))
				{
					$data['type']			= 'yonetmen_sec';
					$data['yonetmenler']	= $this->db->query("SELECT yonetmen_id, isim FROM yonetmenler ORDER BY siralama ASC")->result();
				}else{
					$data['type']				= 'yonetmenworks';
					$data['yononetmen_name']	= $this->db->query("SELECT isim FROM yonetmenler where yonetmen_id=?",array($_GET['yonetmenid']))->row();
					$data['worklist']			= $this->db->query("SELECT * FROM yonetmen_works where yonetmen_id=? order by sira asc",array($_GET['yonetmenid']))->result();
				}
				$this->load->view('admin/admin_edit_wcs_index.php', $data);
				$this->load->view('admin/admin_footer.php');
			break;
			case "delete":
				$this->db->query("DELETE FROM yonetmen_works where yonetmen_works_id=?",array($id));
				header('Location: '.base_url('admin/yonetmenindex').'?yonetmenid='.$_GET['yonetmenid']);
			break;
			case "silama":
				foreach($_POST as $a=>$d)
				{
					$this->db->query("UPDATE yonetmen_works set sira=? where yonetmen_works_id=?",array($d, $a));
				}
				header('Location: '.base_url('admin/yonetmenindex').'?yonetmenid='.$_GET['yonetmenid']);
			break;
			case "edit":
				if($this->input->post('action') == 'yonetmenindex')
				{
					if($this->input->post('film_name'))
					{
						if(!empty($_FILES["resim"]["name"]))
						{
							$config['upload_path']		= './content/images/yonetmen_works/uploads/';
							$config['allowed_types']	= 'jpg';
							$config['max_size']			= '100000';
							$conig['max_width']			= '180';
							$config['max_height']		= '400';
							$config['file_name']		= time().'-'.seourl($_FILES["resim"]["name"]).'.jpg';

							$this->load->library('upload', $config);

							if ( ! $this->upload->do_upload('resim'))
							{
								$err	= 'yeap';
							}
							if($err	!= 'yeap')
							{
								$updata		= $this->upload->data();
								$post_data	= array(
											'yonetmen_id'	=> $this->input->post('yonetmen'),
											'workname'		=> $this->input->post('film_name'),
											'image'			=> 'yonetmen_works/uploads/'.$updata['file_name']
								);
								$this->db->where('yonetmen_works_id', $id);
								$this->db->update('yonetmen_works', $post_data);
								$data['mesaj_goster']	= TRUE;
								$data['mesaj_type']		= 'green';
								$data['mesaj']			= 'Çalışma Kaydedildi...';
							}else{
								$data['mesaj_goster']	= TRUE;
								$data['mesaj_type']		= 'red';
								$data['mesaj']			= 'Resim boyutları Hatalı veya dosya türü jpg değil!!!';
							}
						}else{
							$post_data	= array(
											'yonetmen_id'	=> $this->input->post('yonetmen'),
											'workname'		=> $this->input->post('film_name'),
							);
							$this->db->where('yonetmen_works_id', $id);
							$this->db->update('yonetmen_works', $post_data);
							$data['mesaj_goster']	= TRUE;
							$data['mesaj_type']		= 'green';
							$data['mesaj']			= 'Çalışma Kaydedildi...';
						}
					}else{
						$data['mesaj_goster']	= TRUE;
						$data['mesaj_type']		= 'red';
						$data['mesaj']			= 'HATA! Tüm alanların doldurulması zorunludur.';
					}
				}else{
					$data['mesaj_goster']	= FALSE;
				}
				$head['page']			= 'veri';
				$head['page_tab']		= 'yonetmenindex';
				$head['title']			= 'Film Düzenle';
				$head['uid']			= $this->user;
				$data['editmi']			= 'evet';
				$data['verican']		= $this->db->query('SELECT * FROM yonetmen_works where yonetmen_works_id=?', $id)->row();
				$data['yonetmenler']	= $this->db->query("SELECT yonetmen_id, isim FROM yonetmenler ORDER BY siralama ASC")->result();
				$head['uid']			= $this->user;
				$this->load->view('admin/admin_header.php', $head);
				$this->load->view('admin/admin_add_wcs.php', $data);
				$this->load->view('admin/admin_footer.php');
			break;
			}
		}else{
			$this->load->view('admin/admin_login.php', array('mesaj' => ''));
		}
	}

	public function addworks()
	{
		if($this->login)
		{
			if($this->input->post('action') == 'addworks')
			{
				if($this->input->post('film_name'))
				{

					$config['upload_path']		= './content/images/yonetmen_works/uploads/';
					$config['allowed_types']	= 'jpg';
					$config['max_size']			= '100000';
					$config['max_width']		= '180';
					$config['max_height']		= '400';
					$config['file_name']		= time().'-'.seourl($_FILES["resim"]["name"]).'.jpg';

					$this->load->library('upload', $config);

					if ( ! $this->upload->do_upload('resim'))
					{
						$err	= 'yeap';
					}
					if($err	!= 'yeap')
					{
						$updata		= $this->upload->data();
						$post_data	= array(
										'yonetmen_id'	=> $this->input->post('yonetmen'),
										'workname'		=> $this->input->post('film_name'),
										'image'			=> 'yonetmen_works/uploads/'.$updata['file_name']
						);
						$this->db->insert('yonetmen_works', $post_data);
						$data['mesaj_goster']	= TRUE;
						$data['mesaj_type']		= 'green';
						$data['mesaj']			= 'Çalışma Kaydedildi...';
					}else{
						$data['mesaj_goster']	= TRUE;
						$data['mesaj_type']		= 'red';
						$data['mesaj']			= 'Resim boyutları Hatalı veya dosya türü jpg değil!!!';
					}
				}else{
					$data['mesaj_goster']	= TRUE;
					$data['mesaj_type']		= 'red';
					$data['mesaj']			= 'HATA! Tüm alanların doldurulması zorunludur.';
				}
			}else{
				$data['mesaj_goster']	= FALSE;
			}
			$head['page']			= 'veri';
			$head['page_tab']		= 'addworks';
			$head['title']			= 'Film Ekle';
			$data['editmi']			= 'hayir';
			$data['verican']		= '';
			$head['uid']			= $this->user;
			$data['yonetmenler']	= $this->db->query("SELECT yonetmen_id, isim FROM yonetmenler ORDER BY siralama ASC")->result();
			$this->load->view('admin/admin_header.php', $head);
			$this->load->view('admin/admin_add_wcs.php', $data);
			$this->load->view('admin/admin_footer.php');
		}else{
			$this->load->view('admin/admin_login.php', array('mesaj' => ''));
		}
	}

	public function editusers($s='',$id='')
	{
		if($this->login)
		{
			switch($s)
			{
			default:
				$head['page']		= 'kullanici';
				$head['page_tab']	= 'editusers';
				$head['title']		= 'Edit Users';
				$head['uid']		= $this->user;
				$this->load->view('admin/admin_header.php', $head);

				$data['users']	= $this->db->query("SELECT * FROM adm_users")->result();
				$this->load->view('admin/admin_edit_usr_index.php', $data);
				$this->load->view('admin/admin_footer.php');
			break;
			case "delete":
				$this->db->query("DELETE FROM adm_users where id=?",array($id));
				header('Location: '.base_url('admin/editusers'));
			break;
			case "edit":
				if($this->input->post('action') == 'editusers')
				{
					if($this->input->post('title')&&$this->input->post('password')&&$this->input->post('email'))
					{
						if($this->input->post('password') == $this->input->post('repassword'))
						{
							$post_data	= array(
										'uname'			=> $this->input->post('title'),
										'uname_clean'	=> seourl($this->input->post('title')),
										'password'		=> generate_password($this->input->post('password')),
										'usermail'		=> $this->input->post('email'),
							);
							$this->db->where('ID', $id);
							$this->db->update('adm_users', $post_data);
							$data['mesaj_goster']	= TRUE;
							$data['mesaj_type']		= 'green';
							$data['mesaj']			= 'Kullanıcı Düzenlendi...';
						}else{
							$data['mesaj_goster']	= TRUE;
							$data['mesaj_type']		= 'red';
							$data['mesaj']			= 'Şifre ve Şifre Tekrar alanları birbirine eşit olmalı.';
						}
					}else{
						$data['mesaj_goster']	= TRUE;
						$data['mesaj_type']		= 'red';
						$data['mesaj']			= 'HATA! Tüm alanların doldurulması zorunludur.';
					}
				}else{
					$data['mesaj_goster']	= FALSE;
				}
				$head['page']		= 'kullanici';
				$head['page_tab']	= 'editusers';
				$head['title']		= 'Edit Users';
				$data['editmi']		= 'evet';
				$head['uid']		= $this->user;
				$data['verican']	= $this->db->query('SELECT * FROM adm_users where id=?', $id)->row();
				$this->load->view('admin/admin_header.php', $head);
				$this->load->view('admin/admin_add_usr.php', $data);
				$this->load->view('admin/admin_footer.php');
			break;
			}
		}else{
			$this->load->view('admin/admin_login.php', array('mesaj' => ''));
		}
	}
	
	public function addusers()
	{
		if($this->login)
		{
			if($this->input->post('action') == 'addusers')
			{
				if($this->input->post('title')&&$this->input->post('password')&&$this->input->post('email'))
				{
					if($this->input->post('password') == $this->input->post('repassword'))
					{
						$post_data	= array(
									'uname'			=> $this->input->post('title'),
									'uname_clean'	=> seourl($this->input->post('title')),
									'password'		=> generate_password($this->input->post('password')),
									'usermail'		=> $this->input->post('email'),
									'regdate'		=> time()
						);
						$this->db->insert('adm_users', $post_data);
						$data['mesaj_goster']	= TRUE;
						$data['mesaj_type']		= 'green';
						$data['mesaj']			= 'Kullanıcı Eklendi...';
					}else{
						$data['mesaj_goster']	= TRUE;
						$data['mesaj_type']		= 'red';
						$data['mesaj']			= 'Şifre ve Şifre Tekrar alanları birbirine eşit olmalı.';
					}
				}else{
					$data['mesaj_goster']	= TRUE;
					$data['mesaj_type']		= 'red';
					$data['mesaj']			= 'HATA! Tüm alanların doldurulması zorunludur.';
				}
			}else{
				$data['mesaj_goster']	= FALSE;
			}
			$head['page']		= 'kullanici';
			$head['page_tab']	= 'addusers';
			$head['title']		= 'Add Users';
			$data['editmi']		= 'hayir';
			$data['verican']	= '';
			$head['uid']		= $this->user;
			$this->load->view('admin/admin_header.php', $head);
			$this->load->view('admin/admin_add_usr.php', $data);
			$this->load->view('admin/admin_footer.php');
		}else{
			$this->load->view('admin/admin_login.php', array('mesaj' => ''));
		}
	}
	
	public function logout()
	{
		$this->input->set_cookie(array('name'   => 'tesla_films','value'  => '', 'expire' => '-360000','path'   => '/'));
		$this->session->unset_userdata('adminid');
		header('Location: '.base_url('admin'));
	}
}
?>