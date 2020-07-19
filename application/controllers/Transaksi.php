<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('M_transaksi');
		$this->load->model('M_produk');
		$this->load->model('Admin_models/MA_transaksi');
		$this->load->model('Owner_models/MO_transaksi');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "login"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Landing_controller/Login')."';
            </script>";//Url tujuan
		}
		
	}

	public function index(){
		$data['kategori'] = $this->M_produk->tampil_kategori();
		$iduser = $this->session->userdata("iduser");
		$data['pesan'] = $this->M_transaksi->tampil_pesan($iduser);
		$this->load->view('mebel/transaksi',$data);

	}
	public function data($data)
	{
	}
	public function detail_transaksi(){
		$data['kategori'] = $this->M_produk->tampil_kategori();
		$data['status'] = $this->input->post("status");
		$idkirim = $this->uri->segment(3);
		$iduser = $this->session->userdata("iduser");
		$data['kodepos'] = $this->input->post("kode_pos");
		$data['idpesan'] =$this->input->post('idpesan');
		$idpesan2 =$this->input->post('idpesan');
		$data['inv'] = $this->M_transaksi->invoice($idpesan2,$iduser);
		$data['inv2'] = $this->M_transaksi->tampil_pengiriman($idkirim);
		$data['pengiriman'] = $this->input->post('harga_kirim');
		$data['total2'] = $this->input->post('total_pesan');
		$this->load->view('V_invoice',$data);
	}
}
?>