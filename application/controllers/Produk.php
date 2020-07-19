<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_produk');
		$this->load->model('M_komentar');
		$this->load->library('upload');
		$this->load->helper(array('url','form'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda sudah login');
                window.location.href = '".base_url('Owner_controller/A_login')."';
            </script>";//Url tujuan
		}
		
	}

	public function index(){
		$data['kategori'] = $this->M_produk->tampil_kategori();
		$data['produk'] = $this->M_produk->tampil_produk();
		// $data['produk'] = $this->M_keranjang->tampil_barang();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/tambahproduk',$data);
		$this->load->view('element/Owner/Footer_owner');
	}
	public function insert_produk(){

		// $config['upload_path'] = './assets/images/'; //path folder
	    // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    // // $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    // $this->upload->initialize($config);
	    // if(!empty($_FILES['filefoto']['name'])){

	    //     if ($this->upload->do_upload('filefoto')){
	    //         $gbr = $this->upload->data();
	    //         //Compress Image
	    //         $config['image_library']='gd2';
	    //         $config['source_image']='./assets/images/'.$gbr['file_name'];
	    //         $config['create_thumb']= FALSE;
	    //         $config['maintain_ratio']= FALSE;
	    //         $config['quality']= '50%';
	    //         $config['width']= 600;
	    //         $config['height']= 400;
	    //         $config['new_image']= './assets/images/'.$gbr['file_name'];
	    //         $this->load->library('image_lib', $config);
	    //         $this->image_lib->resize();
			
	            $idproduk = $this->M_produk->get_idproduk();
				$nama_produk=$this->input->post('nama_produk');
				$keterangan=$this->input->post('keterangan');
				$kategori=$this->input->post('kategori');
				foreach($this->M_produk->namakat($kategori) as $row){
					$idkat=$row->id_kategori;
				}
				$stok=$this->input->post('stok');
				$harga=$this->input->post('harga');
				$gambar= $this->_uploadImage();
				$gambar2= $this->_uploadImage2();
				$gambar3= $this->_uploadImage3();
				$panjang=$this->input->post('panjang');
				$lebar=$this->input->post('lebar');
				$tinggi=$this->input->post('tinggi');
				$this->M_produk->tambah_produk($idproduk,$nama_produk,$keterangan,$idkat,$stok,$harga,$gambar,$panjang,$lebar,$tinggi,$gambar2,$gambar3);
				echo "<script>
	                alert('Upload berhasil');
	                window.location.href = '".base_url('Produk')."';
	            </script>";//Url tujuan
		// 	}else{
		// 		echo "<script>
	    //             alert('Upload gagal ukuran file terlalu besar minimal 1-2mb');
	    //             window.location.href = '".base_url('Produk')."';
	    //         </script>";//Url tujuan
		// 	}
	                 
	    // }else{
		// 	echo "<script>
	    //             alert('Upload gagal');
	    //             window.location.href = '".base_url('Produk')."';
	    //         </script>";//Url tujuan
		// }
	}

	

	function hapus_produk($id_produk){
	//	$id_produk= $this->uri->segment(3);
		$this->M_produk->deleteProduk($id_produk);
		redirect('Produk');
	}

	function update_produk(){
		$id_produk= $this->uri->segment(3);
		$data['kategori'] = $this->M_produk->tampil_kategori();
		$data['produk'] = $this->M_produk->tampil_produk();
		$data['produk2'] = $this->M_produk->tampil_produk2($id_produk);

		// $data['produk'] = $this->M_keranjang->tampil_barang();
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/editproduk',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	public function AdminKomentar($id_produk){
		$data['komentar'] = $this->M_komentar->komentar_list($id_produk);
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/komentar',$data);
		$this->load->view('element/Owner/Footer_owner');
	}

	function update_produk2(){
		// $config['upload_path'] = './assets/images/'; //path folder
	    // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    // // $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    // $this->upload->initialize($config);
	    // if(!empty($_FILES['filefoto']['name'])){

	    //     if ($this->upload->do_upload('filefoto')){
	    //         $gbr = $this->upload->data();
	    //         //Compress Image
	    //         $config['image_library']='gd2';
	    //         $config['source_image']='./assets/images/'.$gbr['file_name'];
	    //         $config['create_thumb']= FALSE;
	    //         $config['maintain_ratio']= FALSE;
	    //         $config['quality']= '50%';
	    //         $config['width']= 600;
	    //         $config['height']= 400;
	    //         $config['new_image']= './assets/images/'.$gbr['file_name'];
	    //         $this->load->library('image_lib', $config);
	    //         $this->image_lib->resize();
	            $id_produk= $this->uri->segment(4);
				$nama_produk=$this->input->post('nama_produk');
				$kategori=$this->input->post('kategori');
				foreach($this->M_produk->namakat($kategori) as $row){
					$idkat=$row->id_kategori;
				}
				$keterangan=$this->input->post('keterangan');
				$stok=$this->input->post('stok');
				$harga=$this->input->post('harga');
				
				$gambarlama = $this->input->post('oldfoto');
				$gambar = $this->_uploadImage();
				
				$this->M_produk->update_produk($id_produk,$nama_produk,$keterangan,$kategori,$stok,$harga,$idkat,$gambar);
				echo "<script>
	                alert('Edit produk berhasil');	
	                window.location.href = '".base_url('Owner_controller/O_produk')."';
				</script>";//Url tujuan
		// 	}
		// 	else{
		// 		echo "<script>
	    //             alert('Upload gagal ukuran file terlalu besar minimal 1-2mb');
	    //             window.location.href = '".base_url('Produk')."';
	    //         </script>";//Url tujuan
		// 	}
	                 
	    // }else{
		// 	echo "<script>
	    //             alert('Upload gagal');
	    //             window.location.href = '".base_url('Owner_controller/O_produk')."';
	    //         </script>";//Url tujuan
		// }
	}
	public function editProduk($id_produk = null){
		if ($this->input->post('submit')) {
            $this->M_produk->updateProduk($id_produk);
            echo "<script>
	                alert('Edit produk berhasil');	
	                window.location.href = '".base_url('Owner_controller/O_produk')."';
				</script>";//Url tujuan
        }
	}
		
	

    // }
	private function _uploadImage()
    {
        $config['upload_path']          =  './assets/images/depan';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}		
	
	private function _uploadImage2()
    {
        $config['upload_path']          =  './assets/images/samping2';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto2']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto2')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}	
	private function _uploadImage3()
    {
		$config['upload_path']          =  './assets/images/samping3';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto3']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto3')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}	
	// private function _uploadeditImage($gambarlama)
    // {
    //     $config['upload_path']          =  './assets/images/depan';
    //     $config['allowed_types']        = 'gif|jpg|png|JPG';
    //     $config['max_size']             = 9048;
    //     $config['overwrite']            = true;
    //     $config['file_name']            = $_FILES['filefoto']['name'];
    //     // 1MB
    //     // $config['max_width']            = 1024;
	// 	// $config['max_height']           = 768;
	// 	$this->upload->initialize($config);
    //     $this->load->library('upload', $config);

    //     $this->load->library('upload', $config);

    //             if ($this->upload->do_upload('filefoto')) {
    //                 if ($gambarlama != 'camera.jpg') {
    //                     unlink(FCPATH . '/assets/images/depan/' . $gambarlama);
    //                 }
    //                 return $this->upload->data('file_name');
                    
    //             } else {
    //                 echo $this->upload->dispay_errors();
	// 			}
	// 		//	return 'camera.jpg';
	// }					
}
?>