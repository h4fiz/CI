<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kepangkatan extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_kepangkatan");
        $this->load->library("pagination");
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Kepangkatan";
			$data['title_header'] = "Data Kepangkatan";
			$data['view_file'] = "index";
			$data['modules'] = "hukuman_disiplin";
			$data['javascript'] = "hukuman_disiplin.js";


	        $config = array();
	        $config["base_url"] = base_url() . "hukuman_disiplin/";
	        $config["total_rows"] = $this->mdl_kepangkatan->record_count();
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_kepangkatan->
	            fetch_data_profil_pegawai($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url());		
		}
	}

	public function daftar()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Kepangkatan";
			$data['title_header'] = "Data Kepangkatan";
			$data['view_file'] = "index";
			$data['modules'] = "kepangkatan";
			$data['javascript'] = "kepangkatan.js";
/*			$data['query_agama'] = $this->mdl_kepangkatan->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_kepangkatan->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_kepangkatan->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_kepangkatan->get_kelurahan('Nm_Kelurahan');*/

	        $config = array();
	        $config["base_url"] = base_url() . "kepangkatan/daftar";
	        $config["total_rows"] = $this->mdl_kepangkatan->record_count();
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 
	 		// twitter bootstrap markup 
			$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">'; 
			$config['full_tag_close'] = '</ul>'; $config['num_tag_open'] = '<li>'; 
			$config['num_tag_close'] = '</li>'; $config['cur_tag_open'] = '<li class="active"><span>'; 
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>'; 
			$config['prev_tag_open'] = '<li>'; 
			$config['prev_tag_close'] = '</li>'; 
			$config['next_tag_open'] = '<li>'; 
			$config['next_tag_close'] = '</li>'; 
			$config['first_link'] = '&laquo;'; 
			$config['prev_link'] = '&lsaquo;'; 
			$config['last_link'] = '&raquo;'; 
			$config['next_link'] = '&rsaquo;'; 
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>'; 
			$config['last_tag_open'] = '<li>'; 
			$config['last_tag_close'] = '</li>';

	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_kepangkatan->
	            fetch_data_profil_pegawai($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'');		
		}
	}

	public function detail()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['NIP'] = $this->uri->segment(3);
			$data['Nama'] = $this->mdl_kepangkatan->get_name_pegawai($data['NIP']);
			$data['title'] = "Data Kepangkatan ".$data['Nama'];
			$data['title_header'] = "Data Kepangkatan ".$data['Nama'];
			$data['view_file'] = "index_detail";
			$data['modules'] = "kepangkatan";
			$data['javascript'] = "kepangkatan.js";
			$data['jml_row'] = $this->mdl_kepangkatan->record_count_kepangkatan($data['NIP']);
			$data['query_gol_kepangkatan'] = $this->mdl_kepangkatan->get_gol_kepangkatan('Kd_Gol');
			$data['query_bidang'] = $this->mdl_kepangkatan->get_bidang('IdBidang');
			$data['query_seksi'] = $this->mdl_kepangkatan->get_seksi('01');

	        $config = array();
	        $config["base_url"] = base_url() . "kepangkatan/detail/".$data['NIP']."/";
	        $config["total_rows"] = $this->mdl_kepangkatan->record_count_kepangkatan($data['NIP']);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 4;
	 
	 		// twitter bootstrap markup 
			$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">'; 
			$config['full_tag_close'] = '</ul>'; $config['num_tag_open'] = '<li>'; 
			$config['num_tag_close'] = '</li>'; $config['cur_tag_open'] = '<li class="active"><span>'; 
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>'; 
			$config['prev_tag_open'] = '<li>'; 
			$config['prev_tag_close'] = '</li>'; 
			$config['next_tag_open'] = '<li>'; 
			$config['next_tag_close'] = '</li>'; 
			$config['first_link'] = '&laquo;'; 
			$config['prev_link'] = '&lsaquo;'; 
			$config['last_link'] = '&raquo;'; 
			$config['next_link'] = '&rsaquo;'; 
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>'; 
			$config['last_tag_open'] = '<li>'; 
			$config['last_tag_close'] = '</li>';

	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
	        $data["results"] = $this->mdl_kepangkatan->
	            fetch_kepangkatan($data['NIP'],$config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'');		
		}
	}

	public function daftar_utama()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Kepangkatan";
			$data['title_header'] = "Data Kepangkatan";
			$data['view_file'] = "index_utama";
			$data['modules'] = "kepangkatan";
			$data['javascript'] = "kepangkatan.js";
			if ($this->input->post('NIP')=="") 
			{
				$new_NIP = $this->session->userdata("NIP_delete");
				$data['NIP'] = $new_NIP['NIP_delete'];
			} 
			else 
			{
				$data['NIP'] = $this->input->post('NIP');
			}
			$data['Nama'] = $this->input->post('Nama');
			$data['jml_row'] = $this->mdl_kepangkatan->record_count_kepangkatan($data['NIP']);
			$data['query_gol_kepangkatan'] = $this->mdl_kepangkatan->get_gol_kepangkatan('Kd_Gol');
			$data['query_bidang'] = $this->mdl_kepangkatan->get_bidang('IdBidang');
			$data['query_seksi'] = $this->mdl_kepangkatan->get_seksi('01');

	        $config = array();
	        $config["base_url"] = base_url() . "kepangkatan/daftar_utama";
	        $config["total_rows"] = $this->mdl_kepangkatan->record_count_kepangkatan($data['NIP']);
	        $config["per_page"] = 10;
	        $config["uri_segment"] = 3;
	 
	 		// twitter bootstrap markup 
			$config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">'; 
			$config['full_tag_close'] = '</ul>'; $config['num_tag_open'] = '<li>'; 
			$config['num_tag_close'] = '</li>'; $config['cur_tag_open'] = '<li class="active"><span>'; 
			$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>'; 
			$config['prev_tag_open'] = '<li>'; 
			$config['prev_tag_close'] = '</li>'; 
			$config['next_tag_open'] = '<li>'; 
			$config['next_tag_close'] = '</li>'; 
			$config['first_link'] = '&laquo;'; 
			$config['prev_link'] = '&lsaquo;'; 
			$config['last_link'] = '&raquo;'; 
			$config['next_link'] = '&rsaquo;'; 
			$config['first_tag_open'] = '<li>'; 
			$config['first_tag_close'] = '</li>'; 
			$config['last_tag_open'] = '<li>'; 
			$config['last_tag_close'] = '</li>';

	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_kepangkatan->
	            fetch_kepangkatan($data['NIP'],$config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'');		
		}
	}

	public function show_unit_seksi()
	{
		$id_bidang= $this->input->post('id_bidang');
		$data['query_seksi'] = $this->mdl_kepangkatan->get_seksi($id_bidang);
		$this->load->view('unit_seksi', $data);	
	}

	public function show_unit_seksi_update()
	{
		$id_bidang= $this->input->post('id_bidang');
		$data['id_seksi']= $this->input->post('id_seksi');
		$data['query_seksi'] = $this->mdl_kepangkatan->get_seksi($id_bidang);
		$this->load->view('unit_seksi_update', $data);	
	}

	public function simpan()
	{
		$data_insert['NIP'] = $this->input->post('NIP');
		$data_insert['Kd_Gol'] = $this->input->post('gol_kepangkatan');
		$data_insert['Gaji_Pokok'] = $this->input->post('gaji_pokok');
		$data_insert['IdBidang'] = $this->input->post('bidang'); 
		$data_insert['IdSeksi'] = $this->input->post('seksi');  
		$TMT = explode('/', $this->input->post('TMT'));
		$data_insert['TMT'] = $TMT[2].'-'.$TMT[0].'-'.$TMT[1];
		$data_insert['SK_No'] = $this->input->post('nomor');
		$tgl_SK = explode('/', $this->input->post('tgl_SK'));
		$data_insert['SK_Tgl'] = $tgl_SK[2].'-'.$tgl_SK[0].'-'.$tgl_SK[1];
		$data_insert['SK_Jbt_Penandatangan'] = $this->input->post('jabatan_ttd');



		//cek
		echo " NIP = ".$data_insert['NIP']."<br>";
		echo " Kd_Gol = ".$data_insert['Kd_Gol']."<br>";
		echo " Gaji_Pokok = ".$data_insert['Gaji_Pokok']."<br>";
		echo " IdBidang = ".$data_insert['IdBidang']."<br>";
		echo " IdSeksi = ".$data_insert['IdSeksi']."<br>";
		echo " TMT = ".$data_insert['TMT']."<br>";
		echo " SK_No = ".$data_insert['SK_No']."<br>";
		echo " SK_Tgl = ".$data_insert['SK_Tgl']."<br>";
		echo " SK_Jbt_Penandatangan = ".$data_insert['SK_Jbt_Penandatangan']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_kepangkatan->_insert($data_insert);
		redirect(base_url() . "kepangkatan/detail/".$data_insert['NIP']."/");
		//redirect(base_url().'kepangkatan/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Kd_Gol'] = $this->input->post('gol_kepangkatan');
		$data_update['Gaji_Pokok'] = $this->input->post('gaji_pokok');
		$data_update['IdBidang'] = $this->input->post('bidang'); 
		$data_update['IdSeksi'] = $this->input->post('seksi');  
		$TMT = explode('/', $this->input->post('TMT'));
		$data_update['TMT'] = $TMT[2].'-'.$TMT[0].'-'.$TMT[1];
		$data_update['SK_No'] = $this->input->post('nomor');
		$tgl_SK = explode('/', $this->input->post('tgl_SK'));
		$data_update['SK_Tgl'] = $tgl_SK[2].'-'.$tgl_SK[0].'-'.$tgl_SK[1];
		$data_update['SK_Jbt_Penandatangan'] = $this->input->post('jabatan_ttd');



		//cek
		echo " id = ".$id."<br>";
		echo " NIP = ".$data_update['NIP']."<br>";
		echo " Kd_Gol = ".$data_update['Kd_Gol']."<br>";
		echo " Gaji_Pokok = ".$data_update['Gaji_Pokok']."<br>";
		echo " IdBidang = ".$data_update['IdBidang']."<br>";
		echo " IdSeksi = ".$data_update['IdSeksi']."<br>";
		echo " TMT = ".$data_update['TMT']."<br>";
		echo " SK_No = ".$data_update['SK_No']."<br>";
		echo " SK_Tgl = ".$data_update['SK_Tgl']."<br>";
		echo " SK_Jbt_Penandatangan = ".$data_update['SK_Jbt_Penandatangan']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_kepangkatan-> _update($id,$data_update);
		redirect(base_url() . "kepangkatan/detail/".$data_update['NIP']."/");
		//redirect(base_url().'kepangkatan/daftar_utama');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$data_delete['NIP'] = $this->input->post('NIP');


		//cek
		echo " id = ".$id."<br>";
		echo " NIP = ".$data_delete['NIP']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_delete['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_kepangkatan->_delete($id);
		redirect(base_url() . "kepangkatan/detail/".$data_update['NIP']."/");
		//redirect(base_url().'kepangkatan/daftar_utama');
	}
}