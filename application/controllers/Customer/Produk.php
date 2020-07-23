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
        $waktu = date('Y-m-d');
        $data['waktu'] = formatHariTanggal($waktu);

        $this->db->where('barang.id_barang', $id_barang);
        $data['detail'] = $this->db->get('barang')->row();

        $this->db->limit('4');
        $this->db->where('barang.id_barang', $id_barang);
        $data['produk'] = $this->db->get('barang')->result();

        $this->load->view('Customer/v_detail', $data);
    }
    public function kategori($id_kategori = null)
    {
        $this->db->where('id_kategori_barang', $id_kategori);
        $data['pupuk'] = $this->db->get('barang')->result();
        $this->db->where('id_kategori', $id_kategori);
        $data['nama'] = $this->db->get('kategori_barang')->row();
        $this->load->view('Customer/v_shop', $data);
    }
}
