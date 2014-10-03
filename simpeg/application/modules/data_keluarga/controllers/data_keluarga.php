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

	public function detail()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['NIP'] = $this->uri->segment(3);
			$data['Nama'] = $this->mdl_data_keluarga->get_name_pegawai($data['NIP']);
			$data['title'] = "Data Keluarga";
			$data['title_header'] = "Data Keluarga";
			$data['view_file'] = "index_detail";
			$data['modules'] = "data_keluarga";
			$data['javascript'] = "data_keluarga.js";
			$data['jml_row'] = $this->mdl_data_keluarga->record_count_keluarga($data['NIP']);
			$data['query_hub_keluarga'] = $this->mdl_data_keluarga->get_hub_keluarga('Kd_Kel');
			$data['query_pendidikan'] = $this->mdl_data_keluarga->get_pendidikan('Kd_Pend');
			$data['query_pekerjaan'] = $this->mdl_data_keluarga->get_pekerjaan('Kd_Pekerjaan');
 			$data['query_status_nikah'] = $this->mdl_data_keluarga->get_status_nikah('Status_Perkawinan');

	        $config = array();
	        $config["base_url"] = base_url() . "data_keluarga/detail/".$data['NIP']."/";
	        $config["total_rows"] = $this->mdl_data_keluarga->record_count_keluarga($data['NIP']);
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
	        $data["results"] = $this->mdl_data_keluarga->
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
			$data['jml_row'] = $this->mdl_data_keluarga->record_count_keluarga($data['NIP']);
			$data['query_hub_keluarga'] = $this->mdl_data_keluarga->get_hub_keluarga('Kd_Kel');
			$data['query_pendidikan'] = $this->mdl_data_keluarga->get_pendidikan('Kd_Pend');
			$data['query_pekerjaan'] = $this->mdl_data_keluarga->get_pekerjaan('Kd_Pekerjaan');
 			$data['query_status_nikah'] = $this->mdl_data_keluarga->get_status_nikah('Status_Perkawinan');

	        $config = array();
	        $config["base_url"] = base_url() . "data_keluarga/daftar_utama";
	        $config["total_rows"] = $this->mdl_data_keluarga->record_count_keluarga($data['NIP']);
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
		$data_insert['Nama_Lengkap'] = $this->input->post('nama');
		$data_insert['Kd_HubKel'] = $this->input->post('hub_keluarga');
		$data_insert['Jenis_Kelamin'] = $this->input->post('jenis_kelamin');
		$data_insert['Tmpt_Lahir'] = $this->input->post('tmpt_lahir');
		$tgl_lahir = explode('/', $this->input->post('tgl_lahir'));
		$data_insert['Tgl_Lahir'] = $tgl_lahir[2].'-'.$tgl_lahir[0].'-'.$tgl_lahir[1];
		$tgl_nikah = explode('/', $this->input->post('tgl_nikah'));
		$data_insert['Tgl_Nikah'] = $tgl_nikah[2].'-'.$tgl_nikah[0].'-'.$tgl_nikah[1];
		$data_insert['Kd_Pend'] = $this->input->post('pendidikan');
		$data_insert['Kd_Pekerjaan'] = $this->input->post('pekerjaan');
		$data_insert['Keterangan'] = $this->input->post('keterangan');
		$data_insert['Kd_St_Kawin'] = $this->input->post('status_nikah');

		//cek
		echo " NIP = ".$data_insert['NIP']."<br>";
		echo " Nama_Lengkap = ".$data_insert['Nama_Lengkap']."<br>";
		echo " Kd_HubKel = ".$data_insert['Kd_HubKel']."<br>";
		echo " Jenis_Kelamin = ".$data_insert['Jenis_Kelamin']."<br>";
		echo " Tmpt_Lahir = ".$data_insert['Tmpt_Lahir']."<br>";
		echo " Tgl_Lahir = ".$data_insert['Tgl_Lahir']."<br>";
		echo " Tgl_Nikah = ".$data_insert['Tgl_Nikah']."<br>";
		echo " Kd_Pend = ".$data_insert['Kd_Pend']."<br>";
		echo " Kd_Pekerjaan = ".$data_insert['Kd_Pekerjaan']."<br>";
		echo " Keterangan = ".$data_insert['Keterangan']."<br>";
		echo " Kd_St_Kawin = ".$data_insert['Kd_St_Kawin']."<br>";

		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_insert['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_data_keluarga->_insert($data_insert);
		redirect(base_url() . "data_keluarga/detail/".$data_insert['NIP']."/");
		//redirect(base_url().'data_keluarga/daftar_utama');
	}

	public function ubah()
	{
		$id = $this->input->post('id');
		$data_update['NIP'] = $this->input->post('NIP');
		$data_update['Nama_Lengkap'] = $this->input->post('nama');
		$data_update['Kd_HubKel'] = $this->input->post('hub_keluarga');
		$data_update['Jenis_Kelamin'] = $this->input->post('jenis_kelamin');
		$data_update['Tmpt_Lahir'] = $this->input->post('tmpt_lahir');
		$tgl_lahir = explode('/', $this->input->post('tgl_lahir'));
		$data_update['Tgl_Lahir'] = $tgl_lahir[2].'-'.$tgl_lahir[0].'-'.$tgl_lahir[1];
		$tgl_nikah = explode('/', $this->input->post('tgl_nikah'));
		$data_update['Tgl_Nikah'] = $tgl_nikah[2].'-'.$tgl_nikah[0].'-'.$tgl_nikah[1];
		$data_update['Kd_Pend'] = $this->input->post('pendidikan');
		$data_update['Kd_Pekerjaan'] = $this->input->post('pekerjaan');
		$data_update['Keterangan'] = $this->input->post('keterangan');
		$data_update['Kd_St_Kawin'] = $this->input->post('status_nikah');

		//cek
		echo " NIP = ".$id."<br>";
		echo " NIP = ".$data_update['NIP']."<br>";
		echo " Nama_Lengkap = ".$data_update['Nama_Lengkap']."<br>";
		echo " Kd_HubKel = ".$data_update['Kd_HubKel']."<br>";
		echo " Jenis_Kelamin = ".$data_update['Jenis_Kelamin']."<br>";
		echo " Tmpt_Lahir = ".$data_update['Tmpt_Lahir']."<br>";
		echo " Tgl_Lahir = ".$data_update['Tgl_Lahir']."<br>";
		echo " Tgl_Nikah = ".$data_update['Tgl_Nikah']."<br>";
		echo " Kd_Pend = ".$data_update['Kd_Pend']."<br>";
		echo " Kd_Pekerjaan = ".$data_update['Kd_Pekerjaan']."<br>";
		echo " Keterangan = ".$data_update['Keterangan']."<br>";
		echo " Kd_St_Kawin = ".$data_update['Kd_St_Kawin']."<br>";


		//simpan session NIP
		$session_data = $this->session->userdata('NIP_delete');
		$session_data['NIP_delete'] = $data_update['NIP'];
		$this->session->set_userdata("NIP_delete", $session_data);
		$new_NIP = $this->session->userdata("NIP_delete");

		$this->mdl_data_keluarga-> _update($id,$data_update);
		redirect(base_url() . "data_keluarga/detail/".$data_update['NIP']."/");
		//redirect(base_url().'data_keluarga/daftar_utama');
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
		redirect(base_url() . "data_keluarga/detail/".$data_delete['NIP']."/");
		//redirect(base_url().'data_keluarga/daftar_utama');
	}
}