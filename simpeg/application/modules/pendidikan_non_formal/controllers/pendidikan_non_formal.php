<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pendidikan_non_formal extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_pendidikan_non_formal");
        $this->load->library("pagination");
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Pendidikan Non Formal";
			$data['title_header'] = "Data Pendidikan Non Formal";
			$data['view_file'] = "index";
			$data['modules'] = "hukuman_disiplin";
			$data['javascript'] = "hukuman_disiplin.js";


	        $config = array();
	        $config["base_url"] = base_url() . "hukuman_disiplin/";
	        $config["total_rows"] = $this->mdl_pendidikan_non_formal->record_count();
	        $config["per_page"] = 20;
	        $config["uri_segment"] = 3;
	 
	        $this->pagination->initialize($config);
	 
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $data["results"] = $this->mdl_pendidikan_non_formal->
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
			$data['title'] = "Data Pendidikan Non Formal";
			$data['title_header'] = "Data Pendidikan Non Formal";
			$data['view_file'] = "index";
			$data['modules'] = "pendidikan_non_formal";
			$data['javascript'] = "pendidikan_non_formal.js";
/*			$data['query_agama'] = $this->mdl_pendidikan_non_formal->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_pendidikan_non_formal->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_pendidikan_non_formal->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_pendidikan_non_formal->get_kelurahan('Nm_Kelurahan');*/

	        $config = array();
	        $config["base_url"] = base_url() . "pendidikan_non_formal/daftar";
	        $config["total_rows"] = $this->mdl_pendidikan_non_formal->record_count();
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
	        $data["results"] = $this->mdl_pendidikan_non_formal->
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
			$data['Nama'] = $this->mdl_pendidikan_non_formal->get_name_pegawai($data['NIP']);
			$data['title'] = "Data Pendidikan Non Formal ".$data['Nama'];
			$data['title_header'] = "Data Pendidikan Non Formal ".$data['Nama'];
			$data['view_file'] = "index_detail";
			$data['modules'] = "pendidikan_non_formal";
			$data['javascript'] = "pendidikan_non_formal.js";
			$data['jml_row'] = $this->mdl_pendidikan_non_formal->record_count_pendidikan_non_formal($data['NIP']);

	        $config = array();
	        $config["base_url"] = base_url() . "pendidikan_non_formal/detal/".$data['NIP']."/";
	        $config["total_rows"] = $this->mdl_pendidikan_non_formal->record_count_pendidikan_non_formal($data['NIP']);
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
	        $data["results"] = $this->mdl_pendidikan_non_formal->
	            fetch_pendidikan_non_formal($data['NIP'],$config["per_page"], $page);
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
			$data['title'] = "Data Pendidikan Non Formal";
			$data['title_header'] = "Data Pendidikan Non Formal";
			$data['view_file'] = "index_utama";
			$data['modules'] = "pendidikan_non_formal";
			$data['javascript'] = "pendidikan_non_formal.js";
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
			$data['jml_row'] = $this->mdl_pendidikan_non_formal->record_count_pendidikan_non_formal($data['NIP']);

	        $config = array();
	        $config["base_url"] = base_url() . "pendidikan_non_formal/daftar_utama";
	        $config["total_rows"] = $this->mdl_pendidikan_non_formal->record_count_pendidikan_non_formal($data['NIP']);
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
	        $data["results"] = $this->mdl_pendidikan_non_formal->
	            fetch_pendidikan_non_formal($data['NIP'],$config["per_page"], $page);
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
		$data_insert['Nama_Kursus_Seminar'] = $this->input->post('nama_kursus_seminar');
		$tgl_mulai = explode('/', $this->input->post('tgl_mulai'));
		$data_insert['Tgl_Mulai'] = $tgl_mulai[2].'-'.$tgl_mulai[0].'-'.$tgl_mulai[1];
		$tgl_selesai = explode('/', $this->input->post('tgl_selesai'));
		$data_insert['Tgl_Selesai'] = $tgl_selesai[2].'-'.$tgl_selesai[0].'-'.$tgl_selesai[1];   
		$data_insert['No_Sertifikat'] = $this->input->post('no_sertifikat');
		$tgl_sertifikat = explode('/', $this->input->post('tgl_sertifikat'));
		$data_insert['Tgl_Sertifikat'] = $tgl_sertifikat[2].'-'.$tgl_sertifikat[0].'-'.$tgl_sertifikat[1];
		$data_insert['Nama_Pejabat'] = $this->input->post('nama_pejabat');
		$data_insert['Instansi_Penyelenggara'] = $this->input->post('instansi');
		$data_insert['Tempat'] = $this->input->post('tempat');



		//cek
		echo " NIP = ".$data_insert['NIP']."<br>";
		echo " Nama_Kursus_Seminar = ".$data_insert['Nama_Kursus_Seminar']."<br>";
		echo " Tgl_Mulai = ".$data_insert['Tgl_Mulai']."<br>";
		echo " Tgl_Selesai = ".$data_insert['Tgl_Selesai']."<br>";
		echo " No_Sertifikat = ".$data_insert['No_Sertifikat']."<br>";
		echo " Tgl_Sertifikat = ".$data_insert['Tgl_Sertifikat']."<br>";
		echo " Nama_Pejabat = ".$data_insert['Nama_Pejabat']."<br>";
		echo " Instansi_Penyelenggara = ".$data_insert['Instansi_Penyelenggara']."<br>";
		echo " Tempat = ".$data_insert['Tempat']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_pendidikan_non_formal->_insert($data_insert);
		redirect(base_url() . "pendidikan_non_formal/detal/".$data_insert['NIP']."/");
		//redirect(base_url().'pendidikan_non_formal/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Nama_Kursus_Seminar'] = $this->input->post('nama_kursus_seminar');
		$tgl_mulai = explode('/', $this->input->post('tgl_mulai'));
		$data_update['Tgl_Mulai'] = $tgl_mulai[2].'-'.$tgl_mulai[0].'-'.$tgl_mulai[1];
		$tgl_selesai = explode('/', $this->input->post('tgl_selesai'));
		$data_update['Tgl_Selesai'] = $tgl_selesai[2].'-'.$tgl_selesai[0].'-'.$tgl_selesai[1];   
		$data_update['No_Sertifikat'] = $this->input->post('no_sertifikat');
		$tgl_sertifikat = explode('/', $this->input->post('tgl_sertifikat'));
		$data_update['Tgl_Sertifikat'] = $tgl_sertifikat[2].'-'.$tgl_sertifikat[0].'-'.$tgl_sertifikat[1];
		$data_update['Nama_Pejabat'] = $this->input->post('nama_pejabat');
		$data_update['Instansi_Penyelenggara'] = $this->input->post('instansi');
		$data_update['Tempat'] = $this->input->post('tempat');



		//cek
		echo " id = ".$id."<br>";
		echo " NIP = ".$data_update['NIP']."<br>";
		echo " Nama_Kursus_Seminar = ".$data_update['Nama_Kursus_Seminar']."<br>";
		echo " Tgl_Mulai = ".$data_update['Tgl_Mulai']."<br>";
		echo " Tgl_Selesai = ".$data_update['Tgl_Selesai']."<br>";
		echo " No_Sertifikat = ".$data_update['No_Sertifikat']."<br>";
		echo " Tgl_Sertifikat = ".$data_update['Tgl_Sertifikat']."<br>";
		echo " Nama_Pejabat = ".$data_update['Nama_Pejabat']."<br>";
		echo " Instansi_Penyelenggara = ".$data_update['Instansi_Penyelenggara']."<br>";
		echo " Tempat = ".$data_update['Tempat']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_pendidikan_non_formal-> _update($id,$data_update);
		redirect(base_url() . "pendidikan_non_formal/detal/".$data_update['NIP']."/");
		//redirect(base_url().'pendidikan_non_formal/daftar_utama');
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

		$this->mdl_pendidikan_non_formal->_delete($id);
		redirect(base_url() . "pendidikan_non_formal/detal/".$data_delete['NIP']."/");
		//redirect(base_url().'pendidikan_non_formal/daftar_utama');
	}
}