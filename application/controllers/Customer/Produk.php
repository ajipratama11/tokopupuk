<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index()
    {

        $this->load->view('Customer/v_beranda');
    }
    public function detail_produk($id_barang = null)
    {
        $this->db->where('barang.id_barang', $id_barang);
        $data['detail'] = $this->db->get('barang')->row();
        $this->load->view('Customer/v_detail', $data);
    }
}
