<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_keranjang');
		$this->load->model('M_produk');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Landing_controller/Login')."';
            </script>";//Url tujuan
		}
		
	}

	public function index(){
		echo 'Kembali ke keranjang';
	}

	public function pembayaran(){
		$iduser =  $this->session->userdata("iduser");
		$data['kategori'] = $this->M_produk->tampil_kategori();
		foreach ($this->cart->contents() as $item) {
			$idpesan=$item['idpesan'];
		}
		//jika idpesan sudah ada, maka set diskon 0. jika belum ada maka set diskon dari db
		foreach($this->M_keranjang->voucher2($idpesan,$iduser) as $row){
			$total = $row->total_voucher;
		}
		$voucher = $this->db->query("SELECT * FROM voucher JOIN kostumer_voucher ON voucher.id_voucher=kostumer_voucher.id_voucher WHERE kostumer_voucher.idpesan='$idpesan' AND kostumer_voucher.id_kostumer_id='$iduser' ORDER BY voucher.total_voucher DESC LIMIT 1")->num_rows();
		if($voucher === 1){
			$diskon = $total;
		}else{
			$diskon = 0;
		}
		$idvoucher = $this->input->post('idvoucher');
		$destination = $this->input->post('propinsi_tujuan');
		$origin = $this->input->post('destination');
		$namapengirim = $this->input->post('namapengirim');
		$kecamatan = $this->input->post('kecamatan');
		$desa = $this->input->post('desa');
		$kodepos = $this->input->post('kodepos');
		$telp = $this->input->post('no_telp');
		$rt = $this->input->post('rt');
		$rw = $this->input->post('rw');
		$data = array('destination' => $destination,
								'origin' => $origin,	 
								'namapengirim' => $namapengirim,
								'kecamatan' => $kecamatan,
								'desa' => $desa,
								'kodepos' => $kodepos,
								'telp' => $telp,
								'rt' => $rt,
								'rw' => $rw,
								'diskon' => $diskon,
								'idpesan' => $idpesan
				);
			
		$this->load->view('mebel/pembayaran', $data);
	}
	public function data(){
		$data['kategori'] = $this->M_produk->tampil_kategori();
		$kurir = $this->input->post('kurir');

		$iduser = $this->session->userdata("iduser");
		foreach ($this->cart->contents() as $item) {
			$idpesan=$item['idpesan'];
		}
		if ($cart = $this->cart->contents()){
			$data['idpesan'] = $idpesan;
			$data['pengiriman'] = $this->input->post('harga'); 
			$data['kurir'] = $this->input->post('kurir');
			$data['provinsi'] = $this->input->post('provinsi');
			$data['kota'] = $this->input->post('kota');
			$data['namapengirim'] = $this->input->post('namapengirim');
			$data['kecamatan'] = $this->input->post('kecamatan');
			$data['desa'] = $this->input->post('desa');
			$data['kodepos'] = $this->input->post('kodepos');
			$data['layanan'] = $this->input->post('layanan');
			$data['telp'] = $this->input->post('telp');
			
			$this->load->view('landing/pembayaran',$data);
			
		}else{
			echo "<script>
                alert('Mohon pilih produk terlebih dahulu');
                window.location.href = '".base_url('Landing')."';
            </script>";
		}
		
	}
	
	public function insert_pesan(){
        $iduser = $this->session->userdata("iduser");
		foreach ($this->cart->contents() as $item) {
			$idpesan=$item['idpesan'];
		}

		date_default_timezone_set('Asia/Jakarta');
		$tgl=date('Y-m-d H:i:s');
		$jatuh_tempo=date('Y-m-d H:i:s',strtotime('+24 hours'));
		$status = 'Proses';
		$total_pesan = $this->input->post('total_pesan');
		$kirim = $this->M_keranjang->get_idkirim();
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$namapengirim = $this->input->post('namapengirim');
		$kecamatan = $this->input->post('kecamatan');
		$desa = $this->input->post('desa');
		$kodepos = $this->input->post('kodepos');
		$rt = $this->input->post('rt');
		$harga_kirim = $this->input->post('harga_kirim');
		$rw = $this->input->post('rw');
		$telp = $this->input->post('telp');
	
		$this->M_keranjang->insert_kirim($kirim,$provinsi,$kota,$rt,$harga_kirim,$rw,$namapengirim,$kecamatan,$desa,$kodepos,$telp);

		$this->M_keranjang->input_pesan($idpesan,$tgl,$status,$iduser,$kirim,$total_pesan,$jatuh_tempo);

		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $a)
					{
						$data_detail = array('jumlah' =>$a['qty'],
										'total' => $a['subtotal'],
										'panjang' => $a['panjang'],
										'lebar' => $a['lebar'],
										'tinggi' => $a['tinggi'],
										'produk_id_produk' => $a['id'],
										'id_kostumer_id' => $iduser,
										'pesan_id_pesan' => $idpesan);
						$this->M_keranjang->tambah_detail_keranjang($data_detail);
						
					}
			}
            $this->cart->destroy();
            
            

		redirect('Transaksi');
	}
}
