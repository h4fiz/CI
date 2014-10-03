<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_profil_pegawai extends MX_Controller  {

    public function __construct() 
    {
        parent:: __construct();
        $this->load->helper("url");
        $this->load->model("mdl_data_profil_pegawai");
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
		//simpan session NIP
        if($this->uri->segment(4)=="")
        {
			$nip_cari = $this->input->post('NIP_nomer');
		}
		else
		{
			$nip_cari = $this->uri->segment(3);	
		}		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Data Profil Pegawai";
			$data['title_header'] = "Data Profil Pegawai";
			$data['view_file'] = "index";
			$data['modules'] = "data_profil_pegawai";
			$data['javascript'] = "data_profil_pegawai.js";
			$data['query_agama'] = $this->mdl_data_profil_pegawai->get_agama('Kd_Agama');
			$data['query_gol_dar'] = $this->mdl_data_profil_pegawai->get_golongan_darah('Kd_Gol');
			$data['query_kecamatan'] = $this->mdl_data_profil_pegawai->get_kecamatan('NM_Kecamatan');
			$data['query_kelurahan'] = $this->mdl_data_profil_pegawai->get_kelurahan('Nm_Kelurahan');

	        $config = array();

	        if ($nip_cari == '')
	        {
		        $data['NIP_cari'] = $this->uri->segment(3);
		        $config["base_url"] = base_url() . "data_profil_pegawai/daftar/";
		        $config["total_rows"] = $this->mdl_data_profil_pegawai->record_count();
		        $config["per_page"] = 10;
		        if($this->uri->segment(4)=="")
		        {
		        	$config["uri_segment"] = 3;	
		        }
		        else
		        { 
		        	$config["uri_segment"] = 4;	
		        }
		        	        	
	        }
	        else
	        {
	        	$data['NIP_cari'] = $nip_cari;
		        $config["base_url"] = base_url() . "data_profil_pegawai/daftar/".$nip_cari."/";
		        $config["total_rows"] = $this->mdl_data_profil_pegawai->record_count();
		        $config["per_page"] = 10;
		        $config["uri_segment"] = 4;
	        }
	        
	 
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
	 		
	 		if ($this->uri->segment(4) == '')
	 		{
	 			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;	
	 		}
	 		else
	 		{
	 			$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;	
	 		}
	        
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


	public function detail()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		
		if($data['username']!="" && $data['password']!="")
		{

			$data['view_file'] = "index_detail";
			$data['modules'] = "data_profil_pegawai";
			$data['javascript'] = "data_profil_pegawai.js";
			$data['NIP'] = $this->uri->segment(3);
			$date['query_profil'] = $this->mdl_data_profil_pegawai->get_where($data['NIP']);

			$query = $this->mdl_data_profil_pegawai->get_where($data['NIP']);
			foreach ($query->result() as $row) 
            {
            	$data['title'] = "Data Detail ".$row->Nama_Pegawai;
				$data['title_header'] = "Data Detail ".$row->Nama_Pegawai;
                $data['Nama_Pegawai'] = $row->Nama_Pegawai;
                $data['NIP_Lama'] = $row->NIP_Lama;
                $data['Tmpt_lahir'] = $row->Tmpt_lahir;
                $data['Tgl_Lahir'] = $row->Tgl_Lahir;
                $data['Kd_Gol_Darah'] = $this->mdl_data_profil_pegawai->get_name_gol_darah($row->Kd_Gol_Darah);
                $data['Kd_Agama'] = $this->mdl_data_profil_pegawai->get_name_agama($row->Kd_Agama);
                if($row->Jenis_Kelamin == 'L'){
                	$data['Jenis_Kelamin'] = 'Laki-Laki';
                } else {
                	$data['Jenis_Kelamin'] = 'Perempuan';
                }
                $data['Kd_Status_Kawin'] = $this->mdl_data_profil_pegawai->get_name_kawin($row->Kd_Status_Kawin);
                $data['Kd_Kecamatan'] = $this->mdl_data_profil_pegawai->get_name_kecamatan($row->Kd_Kecamatan);
                $data['Kd_Kelurahan'] = $this->mdl_data_profil_pegawai->get_name_kelurahan($row->Kd_Kelurahan);
				$data['alamat'] = $row->alamat;
				$data['Email'] = $row->Email;
				$data['No_Telp'] = $row->No_Telp;
				$data['No_HP'] = $row->No_HP;

            }
            echo Modules::run('template/admin',$data);

		}
		else
		{
			redirect(base_url().'');
		}

	}

	public function simpan()
	{
		$data_insert['NIP'] = $this->input->post('NIP_baru');
		$data_insert['NIP_Lama'] = $this->input->post('NIP_lama');
		$data_insert['Nama_Pegawai'] = $this->input->post('Nama');
		$data_insert['Tmpt_lahir'] = $this->input->post('tempat_lahir');
		$data_insert['Tgl_Lahir'] = $this->input->post('tahun').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
		$data_insert['Kd_Gol_Darah'] = $this->input->post('gol_darah');
		$data_insert['Kd_Agama'] = $this->input->post('Agama');
		$data_insert['Jenis_Kelamin'] = $this->input->post('jenis_kelamin');
		$data_insert['Kd_Status_Kawin'] = $this->input->post('status_kawin');
		$data_insert['Kd_Kecamatan'] = $this->input->post('kecamatan');
		$data_insert['Kd_Kelurahan'] = $this->input->post('kelurahan');
		$data_insert['Email'] = $this->input->post('email');
		$data_insert['alamat'] = $this->input->post('alamat');
		$data_insert['No_Telp'] = $this->input->post('no_telp');
		$data_insert['No_HP'] = $this->input->post('no_hp');
		$gambar = $this->input->post('pas_photo');

		if(isset($gambar))
		{
			$image_name		 	= $_FILES['pas_photo']['name']; //get image name
			$image_size			= $_FILES['pas_photo']['size']; // get original image size
			$tmp_src		 	= $_FILES['pas_photo']['tmp_name']; // Temp name of image file stored in PHP tmp folder
			$image_type	 		= $_FILES['pas_photo']['type'];
			$image_error 		= $_FILES['pas_photo']['error'];
			$file_move 			= "./assets/back/img_pegawai/";

			echo 'image name1 = '.$image_name.'<br> image size = '.$image_size." <br> file_move = ".$file_move;
			echo '<br> tmp src = '.$tmp_src.'<br> image type = '.$image_type.'<br>';

			$this->load->library('image_upload');
			$data['hasil_upload'] = $this->image_upload->proses_upld($image_name,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name);
			$arr_data = explode('#', $data['hasil_upload']);
			echo "dataupload = ".$data['hasil_upload']."<br>";

			
			$data_insert['Pas_Photo'] = $file_move.$image_name;

		}

		//report
		echo "NIP = ".$data_insert['NIP']."<br>";
		echo "NIP_Lama = ".$data_insert['NIP_Lama']."<br>";
		echo "Nama_Pegawai = ".$data_insert['Nama_Pegawai']."<br>";
		echo "Tmpt_lahir = ".$data_insert['Tmpt_lahir']."<br>";
		echo "Tgl_Lahir = ".$data_insert['Tgl_Lahir']."<br>";
		echo "Kd_Gol_Darah = ".$data_insert['Kd_Gol_Darah']."<br>";
		echo "Kd_Agama = ".$data_insert['Kd_Agama']."<br>";
		echo "Jenis_Kelamin = ".$data_insert['Jenis_Kelamin']."<br>";
		echo "Kd_Status_Kawin = ".$data_insert['Kd_Status_Kawin']."<br>";
		echo "Kd_Kecamatan = ".$data_insert['Kd_Kecamatan']."<br>";
		echo "Kd_Kelurahan = ".$data_insert['Kd_Kelurahan']."<br>";
		echo "Email = ".$data_insert['Email']."<br>";
		echo "alamat= ".$data_insert['alamat']."<br>";
		echo "No_Telp = ".$data_insert['No_Telp']."<br>";
		echo "No_HP = ".$data_insert['No_HP']."<br>";
		echo "Pas_Photo = ".$data_insert['Pas_Photo']."<br>";


		$this->mdl_data_profil_pegawai->_insert($data_insert);
		//redirect(base_url());

	}

	public function ubah_data()
	{
		$id = $this->input->post('NIP_baru_org');	
		$data_update['NIP'] = $this->input->post('NIP_baru');
		$data_update['NIP_Lama'] = $this->input->post('NIP_lama');
		$data_update['Nama_Pegawai'] = $this->input->post('Nama');
		$data_update['Tmpt_lahir'] = $this->input->post('tempat_lahir');
		$data_update['Tgl_Lahir'] = $this->input->post('tahun').'-'.$this->input->post('bln').'-'.$this->input->post('tgl');
		$data_update['Kd_Gol_Darah'] = $this->input->post('gol_darah');
		$data_update['Kd_Agama'] = $this->input->post('Agama');
		$data_update['Jenis_Kelamin'] = $this->input->post('jenis_kelamin');
		$data_update['Kd_Status_Kawin'] = $this->input->post('status_kawin');
		$data_update['Kd_Kecamatan'] = $this->input->post('kecamatan');
		$data_update['Kd_Kelurahan'] = $this->input->post('kelurahan');
		$data_update['Email'] = $this->input->post('email');
		$data_update['alamat'] = $this->input->post('alamat');
		$data_update['No_Telp'] = $this->input->post('no_telp');
		$data_update['No_HP'] = $this->input->post('no_hp');
		$gambar = $this->input->post('pas_photo');

		if(isset($gambar))
		{
			$image_name		 	= $_FILES['pas_photo']['name']; //get image name
			$image_size			= $_FILES['pas_photo']['size']; // get original image size
			$tmp_src		 	= $_FILES['pas_photo']['tmp_name']; // Temp name of image file stored in PHP tmp folder
			$image_type	 		= $_FILES['pas_photo']['type'];
			$image_error 		= $_FILES['pas_photo']['error'];
			$file_move 			= "./assets/back/img_pegawai/";

			echo 'image name1 = '.$image_name.'<br> image size = '.$image_size." <br> file_move = ".$file_move;
			echo '<br> tmp src = '.$tmp_src.'<br> image type = '.$image_type.'<br>';

			$this->load->library('image_upload');
			$data['hasil_upload'] = $this->image_upload->proses_upld($image_name,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name);
			$arr_data = explode('#', $data['hasil_upload']);
			echo "dataupload = ".$data['hasil_upload']."<br>";

			
			$data_update['Pas_Photo'] = $file_move.$image_name;

		}

		//report
		echo "NIP org = ".$id."<br>";
		echo "NIP = ".$data_update['NIP']."<br>";
		echo "NIP_Lama = ".$data_update['NIP_Lama']."<br>";
		echo "Nama_Pegawai = ".$data_update['Nama_Pegawai']."<br>";
		echo "Tmpt_lahir = ".$data_update['Tmpt_lahir']."<br>";
		echo "Tgl_Lahir = ".$data_update['Tgl_Lahir']."<br>";
		echo "Kd_Gol_Darah = ".$data_update['Kd_Gol_Darah']."<br>";
		echo "Kd_Agama = ".$data_update['Kd_Agama']."<br>";
		echo "Jenis_Kelamin = ".$data_update['Jenis_Kelamin']."<br>";
		echo "Kd_Status_Kawin = ".$data_update['Kd_Status_Kawin']."<br>";
		echo "Kd_Kecamatan = ".$data_update['Kd_Kecamatan']."<br>";
		echo "Kd_Kelurahan = ".$data_update['Kd_Kelurahan']."<br>";
		echo "Email = ".$data_update['Email']."<br>";
		echo "alamat= ".$data_update['alamat']."<br>";
		echo "No_Telp = ".$data_update['No_Telp']."<br>";
		echo "No_HP = ".$data_update['No_HP']."<br>";
		echo "Pas_Photo = ".$data_update['Pas_Photo']."<br>";

		$this->mdl_data_profil_pegawai->_update($id,$data_update);
		redirect(base_url());

	}

	public function hapus()
	{
		$id = $this->input->post('NIP_baru');
		$this->mdl_data_profil_pegawai->_delete($id);
		redirect(base_url());
	}


}