<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index()
    {
        $this->load->view('Customer/v_shop');
    }
    public function keranjang()
    {
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $data['keranjang'] = $this->db->get('pemesanan')->result();

        $this->db->select('SUM(sub_total) as total');
        $data['total'] = $this->db->get('pemesanan')->row();
        $this->load->view('Customer/v_keranjang', $data);
    }
    public function checkout()
    {
        $this->load->view('Customer/v_konfirmasi');
    }
    public function tambah_keranjang()
    {
        $post = $this->input->post();
        $this->id_cus = $post["id_cus"];
        $this->id_barang = $post["id_barang"];
        $this->jumlah_barang = $post["jumlah_barang"];
        $this->sub_total = $post["sub_total"] * $post["jumlah_barang"];
        $this->tgl_pemesanan = $post["tgl_pemesanan"];
        $data = $this->db->insert('pemesanan', $this);
        redirect('Customer/Shop/keranjang');
    }
}
