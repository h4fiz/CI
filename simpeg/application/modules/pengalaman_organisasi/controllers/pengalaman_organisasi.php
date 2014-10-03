<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengalaman_organisasi extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_pengalaman_organisasi");
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
	        $config["total_rows"] = $this->mdl_pengalaman_organisasi->record_count();
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_pengalaman_organisasi->
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
			$data['title'] = "Data Pengalaman Organisasi";
			$data['title_header'] = "Data Pengalaman Organisasi";
			$data['view_file'] = "index";
			$data['modules'] = "pengalaman_organisasi";
			$data['javascript'] = "pengalaman_organisasi.js";
/*			$data['query_agama'] = $this->mdl_pengalaman_organisasi->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_pengalaman_organisasi->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_pengalaman_organisasi->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_pengalaman_organisasi->get_kelurahan('Nm_Kelurahan');*/

	        $config = array();
	        $config["base_url"] = base_url() . "pengalaman_organisasi/daftar";
	        $config["total_rows"] = $this->mdl_pengalaman_organisasi->record_count();
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
	        $data["results"] = $this->mdl_pengalaman_organisasi->
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
			$data['Nama'] = $this->mdl_pengalaman_organisasi->get_name_pegawai($data['NIP']);
			$data['title'] = "Data Penglalaman Organisasi";
			$data['title_header'] = "Data Pengalaman Organisasi";
			$data['view_file'] = "index_detail";
			$data['modules'] = "pengalaman_organisasi";
			$data['javascript'] = "pengalaman_organisasi.js";
			$data['jml_row'] = $this->mdl_pengalaman_organisasi->record_count_keluarga($data['NIP']);
			$data['query_tingkat_hukuman'] = $this->mdl_pengalaman_organisasi->get_tingkat_hukuman('Kd_TkHkm');;

	        $config = array();
	        $config["base_url"] = base_url() . "pengalaman_organisasi/detail/".$data['NIP']."/";
	        $config["total_rows"] = $this->mdl_pengalaman_organisasi->record_count_keluarga($data['NIP']);
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
	        $data["results"] = $this->mdl_pengalaman_organisasi->
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
			$data['title'] = "Data Penglalaman Organisasi";
			$data['title_header'] = "Data Pengalaman Organisasi";
			$data['view_file'] = "index_utama";
			$data['modules'] = "pengalaman_organisasi";
			$data['javascript'] = "pengalaman_organisasi.js";
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
			$data['jml_row'] = $this->mdl_pengalaman_organisasi->record_count_keluarga($data['NIP']);
			$data['query_tingkat_hukuman'] = $this->mdl_pengalaman_organisasi->get_tingkat_hukuman('Kd_TkHkm');;

	        $config = array();
	        $config["base_url"] = base_url() . "pengalaman_organisasi/daftar_utama";
	        $config["total_rows"] = $this->mdl_pengalaman_organisasi->record_count_keluarga($data['NIP']);
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
	        $data["results"] = $this->mdl_pengalaman_organisasi->
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
		$data_insert['Nama_Org'] = $this->input->post('nama_org');
		$data_insert['Thn_Awal'] = $this->input->post('thn_periode_awal');
		$data_insert['Thn_Akhir'] = $this->input->post('thn_periode_akhir');
		$data_insert['Lokasi'] = $this->input->post('lokasi');
		$data_insert['Jabatan'] = $this->input->post('jabatan');
		$data_insert['Keterangan'] = $this->input->post('keterangan');


		//cek
		echo " NIP = ".$data_insert['NIP']."<br>";
		echo " Nama_Org = ".$data_insert['Nama_Org']."<br>";
		echo " Thn_Awal = ".$data_insert['Thn_Awal']."<br>";
		echo " Thn_Akhir = ".$data_insert['Thn_Akhir']."<br>";
		echo " Lokasi = ".$data_insert['Lokasi']."<br>";
		echo " Jabatan = ".$data_insert['Jabatan']."<br>";
		echo " Keterangan = ".$data_insert['Keterangan']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_pengalaman_organisasi->_insert($data_insert);
		redirect(base_url() . "pengalaman_organisasi/detail/".$data_insert['NIP']."/");
		redirect(base_url().'pengalaman_organisasi/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Nama_Org'] = $this->input->post('nama_org');
		$data_update['Thn_Awal'] = $this->input->post('thn_periode_awal');
		$data_update['Thn_Akhir'] = $this->input->post('thn_periode_akhir');
		$data_update['Lokasi'] = $this->input->post('lokasi');
		$data_update['Jabatan'] = $this->input->post('jabatan');
		$data_update['Keterangan'] = $this->input->post('keterangan');


		//cek
		echo " id  = ".$id."<br>";
		echo " NIP = ".$data_update['NIP']."<br>";
		echo " Nama_Org = ".$data_update['Nama_Org']."<br>";
		echo " Thn_Awal = ".$data_update['Thn_Awal']."<br>";
		echo " Thn_Akhir = ".$data_update['Thn_Akhir']."<br>";
		echo " Lokasi = ".$data_update['Lokasi']."<br>";
		echo " Jabatan = ".$data_update['Jabatan']."<br>";
		echo " Keterangan = ".$data_update['Keterangan']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_pengalaman_organisasi-> _update($id,$data_update);
		redirect(base_url() . "pengalaman_organisasi/detail/".$data_update['NIP']."/");
		//redirect(base_url().'pengalaman_organisasi/daftar_utama');
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

		$this->mdl_pengalaman_organisasi->_delete($id);
		redirect(base_url() . "pengalaman_organisasi/detail/".$data_delete['NIP']."/");
		//redirect(base_url().'pengalaman_organisasi/daftar_utama');
	}
}