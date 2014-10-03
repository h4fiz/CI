<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_keluarga extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_data_keluarga");
        $this->load->library("pagination");
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Diklat";
			$data['title_header'] = "Data Diklat";
			$data['view_file'] = "index";
			$data['modules'] = "data_diklat";
			$data['javascript'] = "data_diklat.js";


	        $config = array();
	        $config["base_url"] = base_url() . "data_profil_pegawai/";
	        $config["total_rows"] = $this->mdl_data_profil_pegawai->record_count();
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_data_profil_pegawai->
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
			$data['title'] = "Data Keluarga";
			$data['title_header'] = "Data Keluraga";
			$data['view_file'] = "index";
			$data['modules'] = "data_keluarga";
			$data['javascript'] = "data_keluarga.js";
/*			$data['query_agama'] = $this->mdl_data_profil_pegawai->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_data_profil_pegawai->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_data_profil_pegawai->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_data_profil_pegawai->get_kelurahan('Nm_Kelurahan');*/

	        $config = array();
	        $config["base_url"] = base_url() . "data_keluarga/daftar";
	        $config["total_rows"] = $this->mdl_data_keluarga->record_count();
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
	        $data["results"] = $this->mdl_data_keluarga->
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

	public function daftar_utama()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Keluarga";
			$data['title_header'] = "Data Keluarga";
			$data['view_file'] = "index_utama";
			$data['modules'] = "data_keluarga";
			$data['javascript'] = "data_keluarga.js";
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
			$data['jml_row'] = $this->mdl_data_keluarga->record_count_diklat($data['NIP']);


	        $config = array();
	        $config["base_url"] = base_url() . "data_diklat/daftar_utama";
	        $config["total_rows"] = $this->mdl_data_keluarga->record_count_diklat($data['NIP']);
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
	        $data["results"] = $this->mdl_data_keluarga->
	            fetch_data_diklat($data['NIP'],$config["per_page"], $page);
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
		$data_insert['Kd_Diklat'] = $this->input->post('jenis_diklat');
		$data_insert['Nama_Diklat'] = $this->input->post('nama_diklat');
		$tgl_mulai = explode('/', $this->input->post('tgl_mulai'));
		$data_insert['Tgl_Mulai'] = $tgl_mulai[2].'-'.$tgl_mulai[0].'-'.$tgl_mulai[1];
		$tgl_selesai = explode('/', $this->input->post('tgl_selesai'));
		$data_insert['Tgl_Selesai'] = $tgl_selesai[2].'-'.$tgl_selesai[0].'-'.$tgl_selesai[1];
		$data_insert['Jml_jam'] = $this->input->post('jumlah_jam');
		$tgl_STT = explode('/', $this->input->post('tgl_STT'));
		$data_insert['Tgl_STTP'] = $tgl_STT[2].'-'.$tgl_STT[0].'-'.$tgl_STT[1];
		$data_insert['Jab_Penandatangan'] = $this->input->post('jabatan_TTD');
		$data_insert['Inst_Penyelenggara'] = $this->input->post('instansi');
		$data_insert['Lokasi'] = $this->input->post('lokasi');

		//cek
		echo " NIP = ".$data_insert['NIP']."<br>";
		echo " Kd_Diklat = ".$data_insert['Kd_Diklat']."<br>";
		echo " Nama_Diklat = ".$data_insert['Nama_Diklat']."<br>";
		echo " Tgl_Mulai = ".$data_insert['Tgl_Mulai']."<br>";
		echo " Tgl_Selesai = ".$data_insert['Tgl_Selesai']."<br>";
		echo " Jml_jam = ".$data_insert['Jml_jam']."<br>";
		echo " Tgl_STTP = ".$data_insert['Tgl_STTP']."<br>";
		echo " Jab_Penandatangan = ".$data_insert['Jab_Penandatangan']."<br>";
		echo " Inst_Penyelenggara = ".$data_insert['Inst_Penyelenggara']."<br>";
		echo " Lokasi = ".$data_insert['Lokasi']."<br>";

		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_data_keluarga->_insert($data_insert);
		redirect(base_url().'data_diklat/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Kd_Diklat'] = $this->input->post('jenis_diklat');
		$data_update['Nama_Diklat'] = $this->input->post('nama_diklat');
		$tgl_mulai = explode('/', $this->input->post('tgl_mulai'));
		$data_update['Tgl_Mulai'] = $tgl_mulai[2].'-'.$tgl_mulai[0].'-'.$tgl_mulai[1];
		$tgl_selesai = explode('/', $this->input->post('tgl_selesai'));
		$data_update['Tgl_Selesai'] = $tgl_selesai[2].'-'.$tgl_selesai[0].'-'.$tgl_selesai[1];
		$data_update['Jml_jam'] = $this->input->post('jumlah_jam');
		$tgl_STT = explode('/', $this->input->post('tgl_STT'));
		$data_update['Tgl_STTP'] = $tgl_STT[2].'-'.$tgl_STT[0].'-'.$tgl_STT[1];
		$data_update['Jab_Penandatangan'] = $this->input->post('jabatan_TTD');
		$data_update['Inst_Penyelenggara'] = $this->input->post('instansi');
		$data_update['Lokasi'] = $this->input->post('lokasi');

		//cek
		echo " id = ".$id."<br>";
		echo " NIP = ".$data_update['NIP']."<br>";
		echo " Kd_Diklat = ".$data_update['Kd_Diklat']."<br>";
		echo " Nama_Diklat = ".$data_update['Nama_Diklat']."<br>";
		echo " Tgl_Mulai = ".$data_update['Tgl_Mulai']."<br>";
		echo " Tgl_Selesai = ".$data_update['Tgl_Selesai']."<br>";
		echo " Jml_jam = ".$data_update['Jml_jam']."<br>";
		echo " Tgl_STTP = ".$data_update['Tgl_STTP']."<br>";
		echo " Jab_Penandatangan = ".$data_update['Jab_Penandatangan']."<br>";
		echo " Inst_Penyelenggara = ".$data_update['Inst_Penyelenggara']."<br>";
		echo " Lokasi = ".$data_update['Lokasi']."<br>";

		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_data_keluarga-> _update($id,$data_update);
		redirect(base_url().'data_diklat/daftar_utama');
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

		$this->mdl_data_keluarga->_delete($id);
		//redirect(base_url().'data_diklat/daftar_utama');
	}
}