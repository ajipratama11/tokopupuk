<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_models/MA_Laporan');
    }

    public function index()
    {
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $data['suplier'] = $this->db->get('barang')->result();


        $data['nama_suplier'] = $this->db->get('suplier')->result();
        $this->load->view('element/Header');
        $this->load->view('Admin/v_lap_pembelian', $data);
        $this->load->view('element/Footer');
    }
    public function barangList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getSuplier($postData);

        echo json_encode($data);
    }
    public function suplierList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getSuplier2($postData);

        echo json_encode($data);
    }

    public function pengeluaran()
    {
        $this->db->select('SUM(stok_barang*harga_beli) as total, barang.*,suplier.*');
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $this->db->group_by('barang.id_suplier');
        $data['hasil'] = $this->db->get('barang')->result();
        $this->load->view('element/Header');
        $this->load->view('Admin/v_pengeluaran', $data);
        $this->load->view('element/Footer');
    }

    public function laporan_suplier()
    {
        $post = $this->input->post();
        $nama_suplier = $post['nama_suplier'];
        $bulan = $post['bulan'];

        $this->db->join('suplier', 'suplier.id_suplier=barang.id_suplier');
        $this->db->where('nama_suplier', $nama_suplier);
        $this->db->like('tgl_masuk_barang', $bulan, 'both');
        $data['list'] = $this->db->get('barang')->result();

        $this->db->select('SUM(harga_beli*stok_barang) as total, nama_suplier');
        $this->db->join('suplier', 'suplier.id_suplier=barang.id_suplier');
        $this->db->where('nama_suplier', $nama_suplier);
        $this->db->like('tgl_masuk_barang', $bulan, 'both');
        $data['total'] = $this->db->get('barang')->row();

        $this->load->view('Admin/v_lap_suplier', $data);
    }
}
