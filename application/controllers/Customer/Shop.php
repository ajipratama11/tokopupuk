<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('array');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
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
        $waktu = date('Y-m-d');
        $data['waktu'] = formatHariTanggal($waktu);

        $id_cus = $this->session->userdata('id_customer');
        $this->db->select('SUM(sub_total) as total');
        $this->db->where('id_cus', $id_cus);
        $data['total'] = $this->db->get('pemesanan')->row();

        
        $this->db->where('id_cus', $id_cus);
        $this->db->get('pemesanan');

        $this->db->where('id_cus', $id_cus);
        $data['user'] = $this->db->get('customer')->row();
        $this->load->view('Customer/v_konfirmasi', $data);
    }
    public function tambah_keranjang()
    {
        $status = $this->session->userdata('status');
        if (!$status) {
            $this->session->unset_userdata('username');
            redirect('../../');
        } else {

            $post = $this->input->post();
            $id_cus = $this->id_cus = $post["id_cus"];
            $id_barang = $this->id_barang = $post["id_barang"];
            $jumlah =  $this->jumlah_barang = $post["jumlah_barang"];
            $total = $this->sub_total = $post["sub_total"] * $post["jumlah_barang"];
            $this->tgl_pemesanan = $post["tgl_pemesanan"];
            $this->status = "Belum Checkout";

            $this->db->where('id_cus', $id_cus);
            $this->db->where('id_barang', $id_barang);
            $cek = $this->db->get('pemesanan')->row_array();
            if ($cek) {
                $this->db->set('jumlah_barang', $cek['jumlah_barang'] + $jumlah);
                $this->db->set('sub_total', $cek['sub_total'] + $total);
                $this->db->where('id_cus', $id_cus);
                $this->db->where('id_barang', $id_barang);
                $this->db->update('pemesanan');
                redirect('Customer/Shop/keranjang');
            } else {
                $data = $this->db->insert('pemesanan', $this);
                redirect('Customer/Shop/keranjang');
            }
        }
    }

    public function bayar()
    {
        $post = $this->input->post();
        $this->id_cus = $post["id_cus"];
        $this->tanggal_checkout = $post["tanggal_checkout"];
        $this->bank = $post["bank"];
        $this->alamat_pengiriman = $post["alamat_pengiriman"];
        $this->status_pembayaran = "Belum Dikonfirmasi";
        $this->bukti_transfer = $this->_uploadImage();
        $data = $this->db->insert('konfirmasi_pemesanan', $this);
        if ($data) {
            redirect('Customer/Beranda');
        }
    }

    private function _uploadImage()
    {
        $config['upload_path']          =  './upload/';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['overwrite']            = true;
        $config['max_size']             = 5048; // 1MB
        $config['overwrite']            = true;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('bukti_transfer')) {
            $error = $this->upload->display_errors();
            // menampilkan pesan error
            print_r($error);
        } else {
            return $this->upload->data('file_name');
        }
    }
}
