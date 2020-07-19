      <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Dashboard extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_produk');
			$this->load->model('M_profil');
			$this->load->model('M_pesanan');
			$this->load->model('M_komentar');
			$this->load->library('upload');
			$this->load->helper(array('url'));
			// if($this->session->userdata('status') != "login"){
			// 	echo "<script>
			//         alert('Anda harus login terlebih dahulu');
			//         window.location.href = '".base_url('Login')."';
			//     </script>";//Url tujuan
			// }

		}
		public function index()
		{

			$data['kategori'] = $this->M_produk->tampil_kategori();
			// $data['produk'] = $this->M_produk->tampil_produk3();
			// $data['produk2'] = $this->M_produk->tampil_produk4();
			// $data['produk3'] = $this->M_produk->tampil_produk5();
			$this->load->view('mebel/dashboard', $data);
		}
		public function kategori()
		{

			$data['kategori'] = $this->M_produk->tampil_kategori();
			$idk = $this->uri->segment(3);
			$data['data'] = $this->M_produk->tampil_kategori();
			if ($idk != null) {
				$data['produk'] = $this->M_produk->katprod($idk);
				$this->load->view('mebel/kategori', $data);
			} else {
				$data['produk'] = $this->M_produk->katprod2();
				$this->load->view('mebel/kategori', $data);
			}
		}
		public function contact()
		{

			$data['kategori'] = $this->M_produk->tampil_kategori();
			// $data['produk'] = $this->M_produk->tampil_produk3();
			// $data['produk2'] = $this->M_produk->tampil_produk4();
			// $data['produk3'] = $this->M_produk->tampil_produk5();
			$this->load->view('mebel/contact', $data);
		}
		public function faq()
		{

			$data['kategori'] = $this->M_produk->tampil_kategori();
			// $data['produk'] = $this->M_produk->tampil_produk3();
			// $data['produk2'] = $this->M_produk->tampil_produk4();
			// $data['produk3'] = $this->M_produk->tampil_produk5();
			$this->load->view('mebel/faq', $data);
		}
			public function tambah_faq2()
		{
			$nama = $this->input->post('nama');
			$kritik =  $this->input->post('kritik');
			$data = [
				'nama'             =>$nama ,
				'kritik'          => $kritik
			];
			$this->db->insert('faq', $data);
			redirect('Dashboard/faq');
		}


		public function testimonial()
		{

			$data['kategori'] = $this->M_produk->tampil_kategori();
			// $data['produk'] = $this->M_produk->tampil_produk3();
			// $data['produk2'] = $this->M_produk->tampil_produk4();
			// $data['produk3'] = $this->M_produk->tampil_produk5();
			$this->load->view('mebel/testimonial', $data);
		}
		public function detailproduk($id_produk)
		{
			$data['kategori'] = $this->M_produk->tampil_kategori();
			$data['data'] = $this->M_produk->tampil_kategori();
			$data['produk'] = $this->M_produk->tampil_detailproduk($id_produk);
			$data['komentar'] = $this->M_komentar->komentar_list($id_produk);
			$data['testimoni'] = $this->M_komentar->testimoni_list($id_produk);
			$this->load->view('mebel/detailproduk', $data);
		}

		public function jobs(){
			$this->load->view('mebel/coba');
		}

		public function tambah_ke_keranjang()
		{
			// $produk = $this->M_produk->find($id_produk);


			$data = array(
				'id'      => $this->input->post('id_produk'),
				'qty'     => $this->input->post('stok'),
				'price'   => $this->input->post('harga'),
				'name'    => $this->input->post('nama_produk'),
				'panjang'    => $this->input->post('panjang'),
				'lebar'    => $this->input->post('lebar'),
				'tinggi'    => $this->input->post('tinggi'),
				'idpesan' => $this->M_pesanan->get_idpesan()
			);

			if ($this->session->userdata('status') != "login") {
				echo "<script>
				alert('Anda harus login terlebih dahulu');
				window.location.href = '" . base_url('Landing_controller/Login') . "';
			</script>";//Url tujuan
			} else {
				$this->cart->insert($data);
				redirect('Dashboard');
			}
		}

		public function detail_keranjang()
		{
			$data['kategori'] = $this->M_produk->tampil_kategori();
			$iduser = $this->session->userdata("iduser");
			$data['pelanggan'] = $this->M_profil->kostumer($iduser);
			if ($this->session->userdata('status') != "login") {
				echo "<script>
				alert('Anda harus login terlebih dahulu');
				window.location.href = '" . base_url('Landing_controller/Login') . "';
			</script>";//Url tujuan
			} else {
				$this->load->view('mebel/keranjang', $data);
			}
		}

		public function voucher(){
			$iduser =  $this->session->userdata("iduser");
			$kodevoucher =  $this->input->get('kodevoucher');
			$totalbelanja =  $this->cart->total();
			$date = date('Y-m-d');
			foreach ($this->cart->contents() as $items) {
				$idpesan = $items['idpesan'];
			}
			foreach($this->M_profil->voucher($kodevoucher) as $row){
				$idvoucher= $row->id_voucher;
				$total = $row->total_voucher;
				$nama = $row->nama_voucher;
			}
			$cek1 = $this->db->query("SELECT * FROM voucher WHERE kode_voucher='$kodevoucher' AND '$date' BETWEEN tgl_awal AND tgl_akhir")->num_rows();
			$cek3 = $this->db->query("SELECT * FROM voucher WHERE kode_voucher='$kodevoucher' AND minimum_belanja<='$totalbelanja' AND '$date' BETWEEN tgl_awal AND tgl_akhir")->num_rows();
			

			if($cek1 === 1) {
				if($cek3 === 1){
					$cek2 = $this->db->query("SELECT * FROM kostumer_voucher WHERE id_voucher='$idvoucher' AND id_kostumer_id='$iduser'")->num_rows();
					$cek4 = $this->db->query("SELECT * FROM kostumer_voucher WHERE idpesan='$idpesan' AND id_voucher='$idvoucher'")->num_rows();
					$cek5 = $this->db->query("SELECT * FROM kostumer_voucher WHERE idpesan='$idpesan' AND id_kostumer_id='$iduser'")->num_rows();
					// if($cek5 === 1){
						if($cek2 === 0){
							$user_token = [
								'id_voucher' => $idvoucher,
								'idpesan' => $idpesan,
								'id_kostumer_id' => $iduser
							];
							$this->db->insert('kostumer_voucher', $user_token);
								echo '<div class="alert alert-success" role="alert">
								 Ada voucher Sebanyak '.$total.' Untuk Anda
										</div>';
							}else{
								echo '<div class="alert alert-success" role="alert">
								Anda sudah pernah reedem voucher '.$nama.' 
								   </div>';
							}
						// }else{
						// 	echo '<div class="alert alert-success" role="alert">
						// 	anda sudah menggunakan voucher ini yang ke 4'.$idpesan.'
						// 	   </div>';
						// }
					// }else{
					// 	echo '<div class="alert alert-success" role="alert">
					// 	 anda sudah menggunakan voucher ini yang ke 2'.$idpesan.'
					// 		</div>';
					// }
				}else{
					echo '<div class="alert alert-success" role="alert">
						 belanja anda kurang, silahkan belanja lagi untuk mendapatkan potongan harga
							</div>';
				}
			}else{
				echo '<div class="alert alert-success" role="alert">
				 kode voucher salah atau sudah expired
					</div>';
			}
			

		}

		public function hapus_keranjang()
		{
			// $this->cart->contents(['id']);
			$this->cart->destroy();
			redirect('Dashboard/detail_keranjang');
		}


		function data_komentar()
		{
			$barang = $this->uri->segment(3);
			$data = $this->M_komentar->komentar_list($barang);
			echo json_encode($data);
		}

		function get_komentar()
		{
			$kobar = $this->input->get('id');
			$data = $this->M_komentar->get_komentar_by_kode($kobar);
			echo json_encode($data);
		}

		function simpan_komentar()
		{
			$produk = $this->input->post('id_produk_id');
			$id =$this->input->post('id_kostumer_id');
			$data = [
				'id_kostumer_id'     => $id,
				'komentar'             => $this->input->post('komentar'),
				'id_produk_id'           => $produk,
				'date'          => $this->input->post('date'),	
				'komen_status'          => $this->input->post('komen_status')
			];

			$this->db->insert('komentar', $data);
			if($id != 0){
				redirect('Dashboard/detailproduk/' . $produk);
			}else{
				redirect('Produk/AdminKomentar/' . $produk);
			}
		}
		function simpan_testimoni()
		{
			$id = $this->input->post('id_kostumer_id');
			$produk = $this->input->post('id_produk_id');
			$sudahbeli = $this->db->query("SELECT * FROM pesan WHERE id_kostumer_id='$id'")->num_rows();
                if($sudahbeli<=1){
						echo "<script>
                        alert('Anda Belum Berbelanja');
                        window.location.href = '".base_url('Dashboard/detailproduk/'.$produk)."';
                    </script>";
                    }else{
						$data = [
							'id_kostumer_id'     => $id,
							'id_produk_id'           => $produk,
							'gambar'				=> $this->_uploadImage(),
							'keterangan'             => $this->input->post('keterangan'),
							'date'          => $this->input->post('date')
						];
			
						$this->db->insert('testimoni', $data);
						echo "<script>
                        alert('Berhasil memberikan Testimoni');
                        window.location.href = '".base_url('Dashboard/detailproduk/'.$produk)."';
                    </script>";
                    }
		}

		private function _uploadImage()
		{
			$config['upload_path']          =  './assets/images/';
			$config['allowed_types']        = 'gif|jpg|png|JPG';
			$config['max_size']             = 9048;
			$config['overwrite']            = true;
			$config['file_name']            = $_FILES['gambar']['name'];
			// 1MB
			// $config['max_width']            = 1024;
			// $config['max_height']           = 768;
			$this->upload->initialize($config);
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				return $this->upload->data("file_name");
			}

			return "camera.jpg";
		}




		function getCity($province)
		{

			$curl = curl_init();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://api.rajaongkir.com/basic/city?province=$province",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: fbd791dbdaa5ed2f93cd83f0f68887ef"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				//echo $response;
				$data = json_decode($response, true);
				//echo json_encode($k['rajaongkir']['results']);


				for ($j = 0; $j < count($data['rajaongkir']['results']); $j++) {


					echo "<option value='" . $data['rajaongkir']['results'][$j]['city_id'] . "'>" . $data['rajaongkir']['results'][$j]['city_name'] . " (" . $data['rajaongkir']['results'][$j]['type'] . ")" . "</option>";
					/*
		  	 if($data['rajaongkir']['results'][$j]['type']=="Kabupaten"){
		  	 	echo "Kabupaten";
		  	 }esle{
		  	 	echo "Kota";
		  	 }
		  	 */
				}
			}
		}

		function getCost()
		{
			$idpsn = $this->input->get('idpsn');
			$origin = $this->input->get('origin');
			$destination = $this->input->get('destination');
			$berat = $this->input->get('berat');
			$courier = $this->input->get('courier');

			$data = array(
				'idpsn' => $idpsn,
				'origin' => $origin,
				'destination' => $destination,
				'berat' => $berat,
				'courier' => $courier

			);

			$this->load->view('rajaongkir/GetCost', $data);
		}
	}
