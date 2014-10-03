<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_riwayat_pendidikan extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_data_riwayat_pendidikan");
        $this->load->library("pagination");
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Profil Pegawai";
			$data['title_header'] = "Data Profil Pegawai";
			$data['view_file'] = "index";
			$data['modules'] = "data_profil_pegawai";
			$data['javascript'] = "data_profil_pegawai.js";


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
			$data['title'] = "Data Pegawai";
			$data['title_header'] = "Data Pegawai";
			$data['view_file'] = "index";
			$data['modules'] = "data_riwayat_pendidikan";
			$data['javascript'] = "data_riwayat_pendidikan.js";
/*			$data['query_agama'] = $this->mdl_data_profil_pegawai->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_data_profil_pegawai->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_data_profil_pegawai->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_data_profil_pegawai->get_kelurahan('Nm_Kelurahan');*/

	        $config = array();
	        $config["base_url"] = base_url() . "data_riwayat_pendidikan/daftar";
	        $config["total_rows"] = $this->mdl_data_riwayat_pendidikan->record_count();
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
	        $data["results"] = $this->mdl_data_riwayat_pendidikan->
	            fetch_data_profil_pegawai($config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	 
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'data_riwayat_pendidikan/daftar');		
		}
	}

	public function detail()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{	
			$data['NIP'] = $this->uri->segment(3);
			$data['Nama'] = $this->mdl_data_riwayat_pendidikan->get_name_pegawai($data['NIP']);
			$data['title'] = "Data Riwayat Pendidikan";
			$data['title_header'] = "Data Riwayat Pendidikan ".$data['Nama'];
			$data['view_file'] = "index_detail";
			$data['modules'] = "data_riwayat_pendidikan";
			$data['javascript'] = "data_riwayat_pendidikan.js";
/*			$data['query_agama'] = $this->mdl_data_profil_pegawai->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_data_profil_pegawai->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_data_profil_pegawai->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_data_profil_pegawai->get_kelurahan('Nm_Kelurahan');*/

			
			$data['query_pendidikan'] = $this->mdl_data_riwayat_pendidikan->get_pendidikan('Kd_Pend');

	 		$data['jml_row'] = $this->mdl_data_riwayat_pendidikan->record_count_pend_formal($data['NIP']); 

	 		$config = array();
	        $config["base_url"] = base_url() . "data_riwayat_pendidikan/detail/".$data['NIP']."/";
	        $config["total_rows"] = $this->mdl_data_riwayat_pendidikan->record_count_pend_formal($data['NIP']); 
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
	        $data["results"] = $this->mdl_data_riwayat_pendidikan->
				fetch_data_pend_formal($data['NIP'],$config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'data_riwayat_pendidikan/daftar');		
		}
	}

	public function daftar_utama()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Riwayat Pendidikan";
			$data['title_header'] = "Data Riwayat Pendidikan";
			$data['view_file'] = "index_utama";
			$data['modules'] = "data_riwayat_pendidikan";
			$data['javascript'] = "data_riwayat_pendidikan.js";
			if ($this->input->post('NIP')=="") 
			{
				$new_NIP = $this->session->userdata("NIP_delete");
				$data['NIP'] = $new_NIP['NIP_delete'];
			} 
			else 
			{
				$data['NIP'] = $this->input->post('NIP');
			}
			
			if ($this->input->post('Nama')=="") 
			{
				$new_NIP = $this->session->userdata("nama");
				$data['Nama'] = $new_NIP['nama'];
			} 
			else 
			{
				$data['Nama'] = $this->input->post('Nama');
			}
			
			$data['query_pendidikan'] = $this->mdl_data_riwayat_pendidikan->get_pendidikan('Kd_Pend');

	 		$data['jml_row'] = $this->mdl_data_riwayat_pendidikan->record_count_pend_formal($data['NIP']); 

	 		$config = array();
	        $config["base_url"] = base_url() . "data_riwayat_pendidikan/daftar";
	        $config["total_rows"] = $this->mdl_data_riwayat_pendidikan->record_count_pend_formal($data['NIP']); 
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
	        $data["results"] = $this->mdl_data_riwayat_pendidikan->
				fetch_data_pend_formal($data['NIP'],$config["per_page"], $page);
	        $data["links"] = $this->pagination->create_links();
	        //$this->load->view("example1", $data);

			echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'data_riwayat_pendidikan/daftar');		
		}
	}

	public function simpan()
	{
		$nama = $this->input->post('nama');
		$data_insert['NIP'] = $this->input->post('NIP');
		$data_insert['Nama_Sekolah'] = $this->input->post('nama_instansi');
		$data_insert['Fakultas'] = $this->input->post('falkultas');
		$data_insert['Jurusan'] = $this->input->post('jurusan');
		$data_insert['Program'] = $this->input->post('pendidikan');
		$data_insert['Thn_Lulus'] = $this->input->post('tahun');

		//cek data
		echo "NIP = ".$data_insert['NIP']."<br>";
		echo "Nama_Sekolah = ".$data_insert['Nama_Sekolah']."<br>";
		echo "Fakultas = ".$data_insert['Fakultas']."<br>";
		echo "Jurusan = ".$data_insert['Jurusan']."<br>";
		echo "Program = ".$data_insert['Program']."<br>";
		echo "Thn_Lulus = ".$data_insert['Thn_Lulus']."<br>";

		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$session_data['nama'] = $nama;
		$this->session->set_userdata("NIP_delete", $session_data);

		$new_NIP = $this->session->userdata("NIP_delete");
		
		$this->mdl_data_riwayat_pendidikan->_insert($data_insert);
		redirect(base_url() . "data_riwayat_pendidikan/detail/".$data['NIP']."/");
		//redirect(base_url().'data_riwayat_pendidikan/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Nama_Sekolah'] = $this->input->post('nama_instansi');
		$data_update['Fakultas'] = $this->input->post('falkultas');
		$data_update['Jurusan'] = $this->input->post('jurusan');
		$data_update['Program'] = $this->input->post('pendidikan');
		$data_update['Thn_Lulus'] = $this->input->post('tahun');

		//cek data
		echo "NIP = ".$data_update['NIP']."<br>";
		echo "Nama_Sekolah = ".$data_update['Nama_Sekolah']."<br>";
		echo "Fakultas = ".$data_update['Fakultas']."<br>";
		echo "Jurusan = ".$data_update['Jurusan']."<br>";
		echo "Program = ".$data_update['Program']."<br>";
		echo "Thn_Lulus = ".$data_update['Thn_Lulus']."<br>";
		echo "ID = ".$id."<br>";

		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$session_data['nama'] = $nama;
		$this->session->set_userdata("NIP_delete", $session_data);

		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_data_riwayat_pendidikan->_update($id,$data_update);
		redirect(base_url() . "data_riwayat_pendidikan/detail/".$data['NIP']."/");
		//redirect(base_url().'data_riwayat_pendidikan/daftar_utama');
	}

	public function hapus()
	{
		$id = $this->input->post('id');
		$NIP = $this->input->post('NIP');
		$nama = $this->input->post('nama');

		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $NIP;
		$session_data['nama'] = $nama;
		$this->session->set_userdata("NIP_delete", $session_data);

		$new_NIP = $this->session->userdata("NIP_delete");

		
		//echo "NIP = ".$new_NIP['NIP_delete'];
		$this->mdl_data_riwayat_pendidikan->_delete($id);
		redirect(base_url() . "data_riwayat_pendidikan/detail/".$data['NIP']."/");
		//redirect(base_url().'data_riwayat_pendidikan/daftar_utama');
	}
}