<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct() {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_profil_pegawai_test");
        $this->load->library("pagination");
    }
 
    public function example1() {
        $config = array();
        $config["base_url"] = base_url() . "welcome/example1";
        $config["total_rows"] = $this->mdl_profil_pegawai_test->record_count();
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
 
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->mdl_profil_pegawai_test->
            fetch_countries($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
        $this->load->view("example1", $data);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */