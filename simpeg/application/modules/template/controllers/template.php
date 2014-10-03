<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MX_Controller {

	public function admin($data)
	{
		$this->load->view('index', $data);
	}

}