<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MX_Controller 
{

	function __construct() 
	{
		parent::__construct();
	}

	function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Sistem Kepegawaian";
			$data['title_header'] = "Sistem kepagawaian";
			$data['hasil_upload'] = "kosong";
			$data['view_file'] = "index";
			$data['modules'] = "admin";
			$data['javascript'] = "test.js";
			//$data['query'] = $this->getall_data_slider_from_db();
			//$this->load->model('mdl_slider');
			//$data['query'] = $this->mdl_slider->get('id_slider');
			echo Modules::run('template/admin',$data);
		}
		else
		{
			$this->load->view('login',$data);			
		}
		
	}

	public function validasi_login()
	{
		$this->load->library('session');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$session_id = $this->session->all_userdata();

		$this->load->model('mdl_val_login');
		$result = $this->mdl_val_login->cek_jml_user($username,$password);
		if($result == 1)
		{
			$rows = $this->mdl_val_login->cari_user($username,$password);
			$data[] = array(
				'status' => 'OK',
				'Rows' => $rows
			);
			$newdata = array(
                   		'username'  => $rows['USERNAME'],
                   		'password'  => $rows['PASSWORD'],
                    	'password'  => $rows['NAMA'],
                    	'password'  => $rows['WEWENANG']
               		   );
			$this->session->set_userdata($newdata);
			redirect(base_url().'admin');
		} 
		else 
		{
			redirect(base_url());
		}	
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'admin');
	}

// End std function model
}