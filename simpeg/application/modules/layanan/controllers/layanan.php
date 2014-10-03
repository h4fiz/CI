<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Layanan extends MX_Controller 
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
			$data['title'] = "Layanan";
			$data['title_header'] = "Layanan";
			$data['hasil_upload'] = "kosong";
			$data['view_file'] = "index";
			$data['modules'] = "layanan";
			$data['javascript'] = "layanan.js";
			$this->load->model('mdl_layanan');
			$data['query_perancangan'] = $this->mdl_layanan->get_where(1);
			$data['query_strategi'] = $this->mdl_layanan->get_where(2);
			$data['query_konsultasi'] = $this->mdl_layanan->get_where(3);
			echo Modules::run('template/admin',$data);
		}
		else
		{
			redirect(base_url().'admin');		
		}
		
	}

	public function simpan_perancangan()
	{
		$isi_text = $this->input->post('isi_text');
		$this->load->model('mdl_layanan');
		$data['teks'] = $isi_text;
		$this->mdl_layanan->_update(1,$data);
		redirect(base_url().'layanan');
		//echo $isi_text;
	}

	public function simpan_strategi()
	{
		$isi_text = $this->input->post('isi_text');
		$this->load->model('mdl_layanan');
		$data['teks'] = $isi_text;
		$this->mdl_layanan->_update(2,$data);
		redirect(base_url().'layanan');
		//echo $isi_text;
	}

	public function simpan_konsultasi()
	{
		$isi_text = $this->input->post('isi_text');
		$this->load->model('mdl_layanan');
		$data['teks'] = $isi_text;
		$this->mdl_layanan->_update(3,$data);
		redirect(base_url().'layanan');
		//echo $isi_text;
	}
}