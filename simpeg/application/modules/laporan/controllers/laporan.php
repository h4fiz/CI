<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data laporan Lakip";
			$data['title_header'] = "Data laporan Lakip";
			$data['view_file'] = "index";
			$data['modules'] = "laporan";
			$data['javascript'] = "laporan.js";

	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url());		
		}
	}

	public function lap_simpeg()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data laporan Simpeg";
			$data['title_header'] = "Data laporan Simpeg";
			$data['view_file'] = "index_lap_simpeg";
			$data['modules'] = "laporan";
			$data['javascript'] = "laporan.js";

	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url());		
		}
	}

}