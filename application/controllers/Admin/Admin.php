<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('M_profil');
		$this->load->model('Admin_models/MA_transaksi');
		$this->load->model('M_faq');
		$this->load->helper(array('url'));
		if($this->session->userdata('status') != "admin"){
			echo "<script>
                alert('Anda harus login terlebih dahulu');
                window.location.href = '".base_url('Admin/Login')."';
            </script>";//Url tujuan
		}
	}

	public function index(){
        $data['admin'] = $this->M_profil->admin();
		$this->load->view('element/Header');
		$this->load->view('Admin/v_admin', $data);
		$this->load->view('element/Footer');
	}
}