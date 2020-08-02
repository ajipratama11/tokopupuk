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
    public function penjualanList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getPenjualan($postData);

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

    public function jurnalList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getJurnal($postData);

        echo json_encode($data);
    }
    public function neracaList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getNeraca($postData);

        echo json_encode($data);
    }
    public function reffList()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->MA_Laporan->getReff($postData);

        echo json_encode($data);
    }

    public function pengeluaran()
    {
        $this->db->select('SUM(stok_barang*harga_beli) as total, barang.*,suplier.*');
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $this->db->group_by('barang.id_suplier');
        $this->db->group_by('barang.tgl_masuk_barang');
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
    public function laporan_penjualan()
    {
        $post = $this->input->post();
        $nama_suplier = $post['nama_suplier'];
        $bulan = $post['bulan'];

        $this->db->join('suplier', 'suplier.id_suplier=barang.id_suplier');
        $this->db->where('nama_suplier', $nama_suplier);
        $this->db->like('tgl_masuk_barang', $bulan, 'both');
        $data['list'] = $this->db->get('pemesanan')->result();

        $this->db->select('SUM(harga_beli*stok_barang) as total, nama_suplier');
        $this->db->join('suplier', 'suplier.id_suplier=barang.id_suplier');
        $this->db->where('nama_suplier', $nama_suplier);
        $this->db->like('tgl_masuk_barang', $bulan, 'both');
        $data['total'] = $this->db->get('barang')->row();

        $this->load->view('Admin/v_lap_suplier', $data);
    }
    public function penjualan()
    {
        $this->load->view('element/Header');
        $this->load->view('Admin/v_penjualan');
        $this->load->view('element/Footer');
    }

    public function jurnal()
    {
        $this->load->view('element/Header');
        $this->db->group_by('year(tgl_transaksi)');
        $data['jurnal'] = $this->db->get('transaksi')->result();
        $this->load->view('Admin/v_jurnal_umum', $data);
        $this->load->view('element/Footer');
    }
    public function tambah_jurnal()
    {
        $this->load->view('element/Header');
        $this->load->view('Admin/v_tambah_jurnal');
        $this->load->view('element/Footer');
    }
    public function buku_besar()
    {
        $this->load->view('element/Header');
        $this->load->view('Admin/v_buku_besar');
        $this->load->view('element/Footer');
    }

    public function tambahJurnal()
    {
        $post = $this->input->post();
        $this->tgl_transaksi = $post['tgl_transaksi'];
        $this->no_reff = $post['no_reff'];
        $this->saldo = $post['saldo'];
        $this->jenis_saldo = $post['jenis_saldo'];
        $this->tgl_input = date('d-m-Y') . ' ' . date("h:i:s");
        $data = $this->db->insert('transaksi', $this);
        if ($data) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-info" >
                    <p> Jurnal ditambahkan!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }
    function getJenis()
    {
        $id_jenis = $this->input->post('id', TRUE);
        $this->db->where('id_jenis', $id_jenis);
        $data = $this->db->get('akun')->result();
        echo json_encode($data);
    }
    public function detail_jurnal()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['jurnal'] = $this->db->get('transaksi')->result();

        $this->db->select('SUM(saldo) as total');

        $this->db->where('jenis_saldo', 1);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['debit'] = $this->db->get('transaksi')->row();

        $this->db->select('SUM(saldo) as total');
        $this->db->where('jenis_saldo', 2);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['kredit'] = $this->db->get('transaksi')->row();

        $this->load->view('element/Header');
        $this->load->view('Admin/v_jurnal_detail', $data);
        $this->load->view('element/Footer');
    }

    public function neraca_saldo()
    {
        $this->load->view('element/Header');
        $this->db->group_by('year(tgl_transaksi)');
        $data['jurnal'] = $this->db->get('transaksi')->result();
        $this->load->view('Admin/v_neraca_saldo', $data);
        $this->load->view('element/Footer');
    }
    public function detail_neraca_saldo()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $this->db->order_by('id_transaksi', 'ASC');
        $this->db->join('akun', 'akun.no_reff=transaksi.no_reff');
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['jurnal'] = $this->db->get('transaksi')->result();

        $this->db->select('SUM(saldo) as total');

        $this->db->where('jenis_saldo', 1);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['debit'] = $this->db->get('transaksi')->row();

        $this->db->select('SUM(saldo) as total');
        $this->db->where('jenis_saldo', 2);
        $this->db->where('month(transaksi.tgl_transaksi)', $bulan);
        $this->db->where('year(transaksi.tgl_transaksi)', $tahun);
        $data['kredit'] = $this->db->get('transaksi')->row();

        $this->load->view('element/Header');
        $this->load->view('Admin/v_neraca_detail', $data);
        $this->load->view('element/Footer');
    }

    public function ubahJurnal()
    {
        $post = $this->input->post();
        $this->tgl_transaksi = $post['tgl_transaksi'];
        $this->id_transaksi = $post['id_transaksi'];
        $this->jenis_saldo = $post['jenis_saldo'];
        $this->no_reff = $post['no_reff'];
        $this->saldo = $post['saldo'];
        $this->tgl_input = date('d-m-Y') . ' ' . date("h:i:s");
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $data = $this->db->update('transaksi', $this);
        if ($data) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-info" >
                    <p> Jurnal dirubah!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }
    public function hapusJurnal()
    {
        $post = $this->input->post();
        $this->id_transaksi = $post['id_transaksi'];
        $this->db->where('id_transaksi', $post['id_transaksi']);
        $data = $this->db->delete('transaksi', $this);
        if ($data) {
            $this->session->set_flashdata(
                'sukses',
                '<div class="alert alert-danger" >
                    <p> Jurnal dihapus!!!</p>
                </div>'
            );
            redirect('Admin/Laporan/jurnal');
        }
    }
}
