<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper(array('url'));
    }

    public function index()
    {

        $this->load->view('Customer/v_daftar');
    }

    public function verify($token = null)
    {
        $this->db->where('token', $token);
        $data = $this->db->get('customer')->row();
        if ($data > 0) {
            redirect('Customer/Beranda');
        }
    }

    public function daftar()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->alamat = $post["alamat"];
        $this->kode_pos = $post["kode_pos"];
        $this->no_hp = $post["no_hp"];
        $this->email = $post["email"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $token = $this->token = md5(time() . $post["nama"]);
        $data = $this->db->insert('customer', $this);
        if ($data) {
            $to = $post["email"];
            $subject = "Email Verification Toko Pupuk";
            $message = "<a href='http://localhost/tokopupuk/Customer/Customer/verify/ $token'> Register </a>";
            $headers = "MINE-Version: 1.0" . "\r\n";
            $headers .= 'From: Fahrizal Azi <fahrizalazi1@gmail.com>' . "\r\n";
            $headers .= "Content-type:text/html;charest=UTF-8" . "\r\n";

            mail($to, $subject, $message, $headers);
            echo "Verif Dikirim ke Email";
        }
    }
}
