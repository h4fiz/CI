<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hukuman_disiplin extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_hukuman_disiplin");
        $this->load->library("pagination");
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Hukuman dan Disiplin";
			$data['title_header'] = "Data Hukuman dan Disiplin";
			$data['view_file'] = "index";
			$data['modules'] = "hukuman_disiplin";
			$data['javascript'] = "hukuman_disiplin.js";


	        $config = array();
	        $config["base_url"] = base_url() . "hukuman_disiplin/";
	        $config["total_rows"] = $this->mdl_hukuman_disiplin->record_count();
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_hukuman_disiplin->
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
			$data['title'] = "Data Hukuman dan Disiplin";
			$data['title_header'] = "Data Hukuman dan Disiplin";
			$data['view_file'] = "index";
			$data['modules'] = "hukuman_disiplin";
			$data['javascript'] = "hukuman_disiplin.js";
/*			$data['query_agama'] = $this->mdl_hukuman_disiplin->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_hukuman_disiplin->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_hukuman_disiplin->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_hukuman_disiplin->get_kelurahan('Nm_Kelurahan');*/

	        $config = array();
	        $config["base_url"] = base_url() . "hukuman_disiplin/daftar";
	        $config["total_rows"] = $this->mdl_hukuman_disiplin->record_count();
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
	        $data["results"] = $this->mdl_hukuman_disiplin->
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
			$data['Nama'] = $this->mdl_hukuman_disiplin->get_name_pegawai($data['NIP']);
			$data['title'] = "Data Hukuman dan Disiplin ".$data['Nama'];
			$data['title_header'] = "Data Hukuman dan Disiplin ". $data['Nama'];
			$data['view_file'] = "index_detail";
			$data['modules'] = "hukuman_disiplin";
			$data['javascript'] = "hukuman_disiplin.js";
			$data['jml_row'] = $this->mdl_hukuman_disiplin->record_count_keluarga($data['NIP']);
			$data['query_tingkat_hukuman'] = $this->mdl_hukuman_disiplin->get_tingkat_hukuman('Kd_TkHkm');;

	        $config = array();
	        $config["base_url"] = base_url() . "hukuman_disiplin/detail/".$data['NIP']."/";
	        $config["total_rows"] = $this->mdl_hukuman_disiplin->record_count_keluarga($data['NIP']);
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
	        $data["results"] = $this->mdl_hukuman_disiplin->
	            fetch_data_keluarga($data['NIP'],$config["per_page"], $page);
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
			$data['title'] = "Data Hukuman dan Disiplin";
			$data['title_header'] = "Data Hukuman dan Disiplin";
			$data['view_file'] = "index_utama";
			$data['modules'] = "hukuman_disiplin";
			$data['javascript'] = "hukuman_disiplin.js";
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
			$data['jml_row'] = $this->mdl_hukuman_disiplin->record_count_keluarga($data['NIP']);
			$data['query_tingkat_hukuman'] = $this->mdl_hukuman_disiplin->get_tingkat_hukuman('Kd_TkHkm');;

	        $config = array();
	        $config["base_url"] = base_url() . "hukuman_disiplin/daftar_utama";
	        $config["total_rows"] = $this->mdl_hukuman_disiplin->record_count_keluarga($data['NIP']);
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
	        $data["results"] = $this->mdl_hukuman_disiplin->
	            fetch_data_keluarga($data['NIP'],$config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'');		
		}
	}

	public function simpan()
	{
		$data_insert['NIP'] = $this->input->post('NIP');
		$data_insert['Kd_Hkm_Displ_Tkt'] = $this->input->post('tingkat_hukuman');
		$data_insert['Hkm_Displ_Jenis'] = $this->input->post('jenis_hukuman');
		$data_insert['SK_No'] = $this->input->post('nomor');
		$tgl_SK = explode('/', $this->input->post('tgl_SK'));
		$data_insert['SK_Tgl'] = $tgl_SK[2].'-'.$tgl_SK[0].'-'.$tgl_SK[1];
		$tgl_awal_hukuman = explode('/', $this->input->post('tgl_awal_hukuman'));
		$data_insert['Tgl_Mulai_Hkm'] = $tgl_awal_hukuman[2].'-'.$tgl_awal_hukuman[0].'-'.$tgl_awal_hukuman[1];
		$tgl_selesai_hukuman = explode('/', $this->input->post('tgl_selesai_hukuman'));
		$data_insert['Tgl_Selesai_Hkm'] = $tgl_selesai_hukuman[2].'-'.$tgl_selesai_hukuman[0].'-'.$tgl_selesai_hukuman[1];
		$data_insert['SK_Jbt_Penandatangan'] = $this->input->post('jabatan_ttd');


		//cek
		echo " NIP = ".$data_insert['NIP']."<br>";
		echo " Kd_Hkm_Displ_Tkt = ".$data_insert['Kd_Hkm_Displ_Tkt']."<br>";
		echo " Hkm_Displ_Jenis = ".$data_insert['Hkm_Displ_Jenis']."<br>";
		echo " SK_No = ".$data_insert['SK_No']."<br>";
		echo " SK_Tgl = ".$data_insert['SK_Tgl']."<br>";
		echo " Tgl_Mulai_Hkm = ".$data_insert['Tgl_Mulai_Hkm']."<br>";
		echo " Tgl_Selesai_Hkm = ".$data_insert['Tgl_Selesai_Hkm']."<br>";
		echo " SK_Jbt_Penandatangan = ".$data_insert['SK_Jbt_Penandatangan']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_hukuman_disiplin->_insert($data_insert);
		redirect(base_url() . "hukuman_disiplin/detail/".$data_insert['NIP']."/");
		//redirect(base_url().'hukuman_disiplin/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Kd_Hkm_Displ_Tkt'] = $this->input->post('tingkat_hukuman');
		$data_update['Hkm_Displ_Jenis'] = $this->input->post('jenis_hukuman');
		$data_update['SK_No'] = $this->input->post('nomor');
		$tgl_SK = explode('/', $this->input->post('tgl_SK'));
		$data_update['SK_Tgl'] = $tgl_SK[2].'-'.$tgl_SK[0].'-'.$tgl_SK[1];
		$tgl_awal_hukuman = explode('/', $this->input->post('tgl_awal_hukuman'));
		$data_update['Tgl_Mulai_Hkm'] = $tgl_awal_hukuman[2].'-'.$tgl_awal_hukuman[0].'-'.$tgl_awal_hukuman[1];
		$tgl_selesai_hukuman = explode('/', $this->input->post('tgl_selesai_hukuman'));
		$data_update['Tgl_Selesai_Hkm'] = $tgl_selesai_hukuman[2].'-'.$tgl_selesai_hukuman[0].'-'.$tgl_selesai_hukuman[1];
		$data_update['SK_Jbt_Penandatangan'] = $this->input->post('jabatan_ttd');


		//cek
		echo " id = ".$id."<br>";
		echo " NIP = ".$data_update['NIP']."<br>";
		echo " Kd_Hkm_Displ_Tkt = ".$data_update['Kd_Hkm_Displ_Tkt']."<br>";
		echo " Hkm_Displ_Jenis = ".$data_update['Hkm_Displ_Jenis']."<br>";
		echo " SK_No = ".$data_update['SK_No']."<br>";
		echo " SK_Tgl = ".$data_update['SK_Tgl']."<br>";
		echo " Tgl_Mulai_Hkm = ".$data_update['Tgl_Mulai_Hkm']."<br>";
		echo " Tgl_Selesai_Hkm = ".$data_update['Tgl_Selesai_Hkm']."<br>";
		echo " SK_Jbt_Penandatangan = ".$data_update['SK_Jbt_Penandatangan']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_hukuman_disiplin-> _update($id,$data_update);
		redirect(base_url() . "hukuman_disiplin/detail/".$data_update['NIP']."/");
		//redirect(base_url().'hukuman_disiplin/daftar_utama');
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

		$this->mdl_hukuman_disiplin->_delete($id);
		redirect(base_url() . "hukuman_disiplin/detail/".$data_delete['NIP']."/");
		//redirect(base_url().'hukuman_disiplin/daftar_utama');
	}
}