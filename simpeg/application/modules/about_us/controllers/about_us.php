<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About_us extends MX_Controller 
{

	function __construct() 
	{
		parent::__construct();
	}

	function index()
	{
	
	}

	public function info()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "tentang kami";
			$data['title_header'] = "tentang kami";
			$data['view_file'] = "index";
			$data['modules'] = "about_us";
			$data['javascript'] = "about_us.js";
			$this->load->model('mdl_aboutus');
			$data['query_about_us'] = $this->mdl_aboutus->get_where(4);
			echo Modules::run('template/admin',$data);
		}
		else
		{
			redirect(base_url().'admin');		
		}
	}

	public function simpan_about_us()
	{
		$isi_text = $this->input->post('isi_text');
		$this->load->model('mdl_aboutus');
		$data['teks'] = $isi_text;
		$this->mdl_aboutus->_update(4,$data);
		redirect(base_url().'about_us');
		//echo $isi_text;
	}

	public function staff()
	{
		$data['username'] = $this->session->userdata('username');
		$data['password'] = $this->session->userdata('password');
		

		if($data['username']!="" && $data['password']!="")
		{
			$data['title'] = "Informasi Staff";
			$data['title_header'] = "Informasi Staff";
			$data['hasil_upload'] = "kosong";
			$data['view_file'] = "staff";
			$data['modules'] = "about_us";
			$data['javascript'] = "staff.js";
			$this->load->model('mdl_staff');
			$data['query'] = $this->mdl_staff->get('id_staff');
			echo Modules::run('template/admin',$data);
		}
		else
		{
			redirect(base_url().'admin');		
		}
	}

	public function simpan_staff()
	{
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $this->input->post('gambar');

		echo "nama = ".$nama."<br>";
		echo "jabatan = ".$jabatan."<br>";
		echo "deskripsi = ".$deskripsi."<br>";
		echo "gambar = ".$gambar."<br>";

		if(isset($gambar))
		{
			$image_name		 	= $_FILES['gambar']['name']; //get image name
			$image_size			= $_FILES['gambar']['size']; // get original image size
			$tmp_src		 	= $_FILES['gambar']['tmp_name']; // Temp name of image file stored in PHP tmp folder
			$image_type	 		= $_FILES['gambar']['type'];
			$image_error 		= $_FILES['gambar']['error'];
			$file_move 			= "./assets/front/images/team/";

			echo 'image name1 = '.$image_name.'<br> image size = '.$image_size." <br> file_move = ".$file_move;
			echo '<br> tmp src = '.$tmp_src.'<br> image type = '.$image_type.'<br>';

			$this->load->library('image_upload');
			$data['hasil_upload'] = $this->image_upload->proses_upld($image_name,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name);
			$arr_data = explode('#', $data['hasil_upload']);
			echo "dataupload = ".$data['hasil_upload']."<br>";

			
			$data_insert['nama_gambar'] = $image_name;
			$data_insert['gambar'] = $file_move.$image_name;

		}
		$data_insert['nama'] = $nama;
		$data_insert['jabatan'] = $jabatan;
		$data_insert['deskripsi'] = $deskripsi;

		$this->load->model('mdl_staff');
		$this->mdl_staff->_insert($data_insert);
		redirect(base_url().'about_us/staff');
	}

	public function ubah_staff()
	{
		$nama = $this->input->post('nama');
		$jabatan = $this->input->post('jabatan');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $this->input->post('gambar');
		$id_staff = $this->input->post('id_staff');

		echo "nama = ".$nama."<br>";
		echo "jabatan = ".$jabatan."<br>";
		echo "deskripsi = ".$deskripsi."<br>";
		echo "gambar = ".$gambar."<br>";
		echo "id_staff = ".$id_staff."<br>";

		if(isset($gambar))
		{
			$image_name		 	= $_FILES['gambar']['name']; //get image name
			$image_size			= $_FILES['gambar']['size']; // get original image size
			$tmp_src		 	= $_FILES['gambar']['tmp_name']; // Temp name of image file stored in PHP tmp folder
			$image_type	 		= $_FILES['gambar']['type'];
			$image_error 		= $_FILES['gambar']['error'];
			$file_move 			= "./assets/front/images/team/";

			echo 'image name1 = '.$image_name.'<br> image size = '.$image_size;
			echo '<br> tmp src = '.$tmp_src.'<br> image type = '.$image_type.'<br>';

			if ($image_name==''){	
				echo "file tidak jadi";
				$data_update['nama_gambar'] = $image_name;
				return false;
			} else {
				$data_update['nama_gambar'] = $image_name;
				if (file_exists($file_move.$image_name)) 
				{
					unlink($file_move.$image_name);
					$this->load->library('image_upload');
					$data['hasil_upload'] = $this->image_upload->proses_upld($image_name,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name);
					$arr_data = explode('#', $data['hasil_upload']);
					echo "dataupload = ".$data['hasil_upload']." %%delete<br> ";

				}
				else
				{
					$this->load->library('image_upload');
					$data['hasil_upload'] = $this->image_upload->proses_upld($image_name,$image_size,$tmp_src,$image_type,$image_error,$file_move,$image_name);
					$arr_data = explode('#', $data['hasil_upload']);
					echo "dataupload = ".$data['hasil_upload']."<br>";			
				}				
			}

			$data_update['gambar'] = $file_move.$image_name;

		}
		$data_update['nama'] = $nama;
		$data_update['jabatan'] = $jabatan;
		$data_update['deskripsi'] = $deskripsi;

		$this->load->model('mdl_staff');
		$this->mdl_staff->_update($id_staff,$data_update);
		redirect(base_url().'about_us/staff');
	}

	public function delete_staff()
	{
		$link_gambar_delete = $this->input->post('link_gambar_delete');
		$id_staff_delete = $this->input->post('id_staff_delete');	

		$link_gambar_delete = str_replace(base_url(), '', $link_gambar_delete);
		unlink($link_gambar_delete);
		$this->load->model('mdl_staff');
		$this->mdl_staff->_delete($id_staff_delete);
		redirect(base_url().'about_us/staff');
	}
}