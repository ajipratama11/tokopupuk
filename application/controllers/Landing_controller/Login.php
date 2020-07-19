<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('M_login');
        $this->load->model('M_produk');
        $this->load->library('form_validation');
    }
    public function index() {
        $data['kategori'] = $this->M_produk->tampil_kategori();

        $this->load->view('mebel/login', $data);

    }
    public function regis() {
        $data['kategori'] = $this->M_produk->tampil_kategori();
        $this->load->view('mebel/register', $data);

    }
    

    // Register user
    public function register(){

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'noTelp', 'required');  
        $this->form_validation->set_rules('password', 'Password', 'required');

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $password = $this->input->post('password');

        $cek = $this->db->query("SELECT * FROM kostumer WHERE email='$email'")->num_rows();

        
        if($this->form_validation->run() === FALSE) {
            $this->load->view('mebel/register');
        } else {
            if($cek>=1){
                echo "<script>
                        alert('Email sudah terdaftar');
                        window.location.href = '".base_url('Landing_controller/Login/regis')."';
                    </script>";
            }else{
                $data = [
                    'nama_kostumer'     => htmlspecialchars($nama, TRUE),
                    'email'             => htmlspecialchars($email, TRUE),
                    'no_telp'           => $telp,
                    'password'          => $password,
                    'date_created'      => time()
                ];
    
                $this->db->insert('kostumer', $data);
    
                echo "<script>
                    alert('Register Berhasil');
                    window.location.href = '".base_url('Landing_controller/Login/regis')."';
                </script>";
            }
        }
    }

    //ubahpassword
    public function ubahpassword()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('telp', 'noTelp', 'required');  
        $this->form_validation->set_rules('password1', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password', 'required');

        $nama = $this->input->post('nama_kostumer');
        $email = $this->input->post('email');
        $telp = $this->input->post('no_telp');
        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');

        $cek = $this->db->query("SELECT * FROM kostumer WHERE nama_kostumer='$nama' AND email='$email' AND no_telp='$telp'")->num_rows();

        
        // if($this->form_validation->run() === FALSE){
        //     $this->load->view('landing/loginuser');
            
        // } else {
            if($password1!=$password2){
                echo "<script>
                    alert('Password Tidak Sama');
                    window.location.href = '".base_url('Landing_controller/Login')."';
                    </script>"; 
            } else{
                if($cek>0){

                    $this->M_login->ubahpassword($nama,$email,$telp,$password2);
                     
                     echo "<script>
                     alert('Password Berhasil Diubah');
                     window.location.href = '".base_url('Landing_controller/Login')."';
                     </script>";
                 }else{
                     echo "<script>
                             alert('Nama, Email, atau No Telp yang anda Masukkan Salah');
                             window.location.href = '".base_url('Landing_controller/Login')."';
                         </script>";
                 }
            }
        // }
    }

    // Login User
    public function login(){
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if($this->form_validation->run() == FALSE) {
            $this->load->view('mebel/Login');
        } else {
            $this->aksi_login();
        }
    }

    function aksi_login(){
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		foreach($this->M_login->iduser2($username) as $row){
			$idkostumer=$row->id_kostumer;
			$namakostumer = $row->nama_kostumer;
		}
		$where = array(
			'email' => $username,
			'password' => $password
			);
		$cek = $this->M_login->cek_login3("kostumer",$where)->num_rows();
		if($cek > 0){
			$data_session = array(
				'email' => $username,
				'iduser' => $idkostumer,
				'namauser' => $namakostumer,
				'status' => "login"
				);
                
                $this->M_login->hapusanorderlama();
			$this->session->set_userdata($data_session);
 
			redirect('Dashboard');
 
		}else{
			echo "<script>
                alert('Username dan password salah');
                window.location.href = '".base_url('Landing_controller/Login')."';
            </script>";//Url tujuan
		}
	}


    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_level');

        echo "<script>
                alert('Berhasil logged out!');
                window.location.href = '".base_url('Dashboard')."';
            </script>";//Url tujuan

    }

    public function beranda() {
        $this->load->view('Owner_view/VO_beranda');
    }

}
?>