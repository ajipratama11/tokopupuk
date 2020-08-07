<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('array');
        $this->load->model('M_pemesanan');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $this->load->view('Customer/v_shop');
    }
    public function keranjang()
    {
        $id_cus = $this->session->userdata('id_customer');
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->where('id_cus', $id_cus);
        $this->db->where('status', "Belum Checkout");
        $data['keranjang'] = $this->db->get('pemesanan')->result();

        $this->db->select('SUM(sub_total) as total');
        $this->db->where('status', "Belum Checkout");
        $this->db->where('id_cus', $id_cus);
        $data['total'] = $this->db->get('pemesanan')->row();
        $this->load->view('Customer/v_keranjang', $data);
    }

    public function pesanan()
    {

        $id_cus = $this->session->userdata('id_customer');
        $this->db->where('id_cus', $id_cus);
        $data['trans'] = $this->db->get('konfirmasi_pemesanan')->result();
        $this->load->view('Customer/v_pesanan', $data);
    }
    public function checkout()
    {
        $waktu = date('Y-m-d');
        $data['waktu'] = formatHariTanggal($waktu);

        $id_cus = $this->session->userdata('id_customer');
        $this->db->select('SUM(sub_total) as total');
        $this->db->where('id_cus', $id_cus);
        $this->db->where('status', "Belum Checkout");
        $data['total'] = $this->db->get('pemesanan')->row();


        $this->db->where('id_cus', $id_cus);
        $this->db->get('pemesanan');

        $this->db->where('id_cus', $id_cus);
        $data['user'] = $this->db->get('customer')->row();
        if (!$id_cus) {
            redirect('Customer/Customer');
        } else {
            $this->load->view('Customer/v_konfirmasi', $data);
        }
    }
    public function tambah_keranjang()
    {
        $status = $this->session->userdata('id_customer');
        if (!$status) {
            $this->session->set_flashdata(
                'login',
                '<div class="alert alert-success" >
                    <p> Sory, login dulu yaaa!!!</p>
                </div>'
            );
            $this->session->unset_userdata('username');
            redirect('Customer/Customer');
        } else {


            $post = $this->input->post();
            $id_cus = $this->id_cus = $post["id_cus"];
            $id_barang = $this->id_barang = $post["id_barang"];
            $jumlah =  $this->jumlah_barang = $post["jumlah_barang"];
            $total = $this->sub_total = $post["sub_total"] * $post["jumlah_barang"];
            $this->tgl_pemesanan = $post["tgl_pemesanan"];
            $this->status = "Belum Checkout";


            $this->db->where('status', "Belum Checkout");
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


        $id = $this->session->userdata('id_customer');
        $post = $this->input->post();
        $id_cus = $this->id_cus = $post["id_cus"];
        $this->tanggal_checkout = $post["tanggal_checkout"];
        $this->bank = $post["bank"];
        $id_trans = $this->id_trans = md5(time() . $id);
        $this->alamat_pengiriman = $post["alamat_pengiriman"];
        $this->status_pembayaran = "Belum Bayar";
        $this->total_bayar = $post["total_bayar"];
        $this->bukti_transfer = "Belum Bayar";
        $this->jurnal = "Belum";
        $data = $this->db->insert('konfirmasi_pemesanan', $this);
        if ($data) {

            $this->db->set('status', "Sudah Checkout");
            $this->db->set('id_trans', $id_trans);
            $this->db->where('id_cus', $id_cus);
            $this->db->where('status', "Belum Checkout");
            $this->db->update('pemesanan');

            redirect('Customer/Shop/pesanan');
        }
    }
    public function update_pembayaran()
    {
        $post = $this->input->post();
        $id_cus = $this->id_cus = $post["id_cus"];
        $id_trans = $this->id_trans = $post["id_trans"];
        $this->status_pembayaran = "Belum Dikonfirmasi";
        $this->bukti_transfer = $this->_uploadImage();

        $this->db->where('id_cus', $id_cus);
        $this->db->where('id_trans', $id_trans);
        $data = $this->db->update('konfirmasi_pemesanan', $this);
        if ($data) {
            redirect('Customer/Shop/pesanan');
        }
    }
    //$this->_uploadImage()

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

    public function update_cart()
    {
        $id_cus = $this->session->userdata('id_customer');
        $post = $this->input->post();
        $id_pemesanan = $post["id_pemesanan"];
        $result = array();

        foreach ($id_pemesanan as $key => $val) {

            $result[] = array(
                "id_pemesanan" => $id_pemesanan[$key],
                "jumlah_barang"  => $_POST['jumlah_barang'][$key],
                "sub_total"  => $_POST['jumlah_barang'][$key] * $_POST['harga_barang'][$key]

            );
        }
        $this->db->update_batch('pemesanan', $result, 'id_pemesanan');
        redirect('Customer/Shop/keranjang');
    }
    public function nota()
    {
        $idpesan = $this->uri->segment(4);
        $data['pemesanan'] = $this->M_pemesanan->tampil_pesan($idpesan);
        $this->load->view('Customer/v_nota', $data);
    }
}
