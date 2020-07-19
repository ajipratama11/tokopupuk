<?php 
 defined('BASEPATH') or exit('No direct script access allowed');
class M_produk extends CI_Model{


	private $bra = "BRA";
	private $_table = "produk";
	public $id_produk;
	public $nama_produk;
	public $keterangan;
	public $kategori_id_kategori;
	public $stok;
	public $harga;
	public $panjang;
	public $lebar;
	public $tinggi;
	public $gambar = "camera.jpg";
	public $gambar2 = "camera.jpg";
	public $gambar3 = "camera.jpg";
	function __construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            [
                'field' => 'nik',
                'label' => 'NIK',
                'rules' => 'required | numeric'
            ],
            [
                'field' => 'nip',
                'label' => 'NIP',
                'rules' => 'required | numeric'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ]
        ];
    }

	function tampil_kategori(){
		return $this->db->get('kategori')->result();
	}
	function tampil_produk(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori ORDER BY id_produk DESC");
		return $query->result();
	}
	function tampil_produk2($id_produk){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori WHERE id_produk='$id_produk'");
		return $query->result();
	}
	function katprod($idk){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori WHERE kategori.id_kategori='$idk'");
		return $query->result();
	}
	function katprod2(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori");
		return $query->result();
	}
	function tampil_detailproduk($id_produk){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON kategori.id_kategori=produk.kategori_id_kategori WHERE id_produk='$id_produk'");
		return $query->result();
	}

	function tambah_produk($idproduk,$nama_produk,$keterangan,$idkat,$stok,$harga,$gambar,$panjang,$lebar,$tinggi,$gambar2, $gambar3){
		$query = $this->db->query("INSERT INTO `produk`(`id_produk`, `nama_produk`, `keterangan`, `kategori_id_kategori`, `stok`, `harga`, `gambar`, `panjang`, `lebar`,`tinggi`,`gambar2`,`gambar3`) VALUES ('$idproduk','$nama_produk','$keterangan','$idkat','$stok','$harga','$gambar','$panjang','$lebar','$tinggi','$gambar2','$gambar3')");
	}
	function get_idproduk(){
          $this->db->select('RIGHT(produk.id_produk,4) as kode', FALSE);
		  $this->db->order_by('id_produk','DESC');    
		  $this->db->limit(1);    
		  $query = $this->db->get('produk');     
		  if($query->num_rows() <> 0){      
		
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		  }
		  else {      
		   //jika kode belum ada      
		   $kode = 1;    
		  }
		  $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT); 
		  $kodejadi = "PR".$kodemax;  
		  return $kodejadi;
	}
	function hapus_produk($id_produk){
		$query = $this->db->query("DELETE FROM `produk` WHERE id_produk='$id_produk'");
	}
	function update_produk($id_produk,$nama_produk,$keterangan,$kategori,$stok,$harga,$idkat, $gambar){
		$query = $this->db->query("UPDATE `produk` SET `nama_produk`='$nama_produk',`gambar`='$gambar',`keterangan`='$keterangan',`kategori_id_kategori`='$idkat',`stok`='$stok',`harga`='$harga' WHERE id_produk='$id_produk'");
	}
	function namakat($kategori){
		$query = $this->db->query("SELECT * FROM kategori WHERE nama_kategori='$kategori'");
		return $query->result();
	}

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $this->db->order_by("id_produk", "DESC");
        $query = $this->db->get("produk");
        
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("produk");
    }

    function mcron($datenow){
		$query = $this->db->query("SELECT * FROM produk JOIN keranjang ON keranjang.produk_id_produk=produk.id_produk JOIN `pesan` ON pesan.id_pesan=keranjang.pesan_id_pesan WHERE '$datenow'>pesan.jatuh_tempo  AND pesan.status='Proses'");
		return $query->result();
	}

	function tampil_produk3(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='BRA' ORDER BY `id_produk` DESC");
		return $query->result();
	}
	function tampil_produk4(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='Tas' ORDER BY `id_produk` DESC");
		return $query->result();
	}

	function tampil_produk5(){
		$query = $this->db->query("SELECT * FROM produk JOIN kategori ON `kategori`.`id_kategori`=`produk`.`kategori_id_kategori` WHERE nama_kategori='Pernak Pernik' ORDER BY `id_produk` DESC");
		return $query->result();
	}

	public function find($id_produk)
	{
		$result = $this->db->where('id_produk', $id_produk)
						   ->limit(1)
						   ->get('produk');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
	function updateProduk($id_produk)
    {
        $post = $this->input->post();
		$this->id_produk = $post['id_produk'];;
		$this->nama_produk =$post['nama_produk'];
		$this->keterangan = $post['keterangan'];
		$this->kategori_id_kategori = $post['kategori'];
		$this->stok = $post['stok'];
		$this->harga = $post['harga'];
		$this->panjang = $post['panjang'];
		$this->lebar = $post['lebar'];
		$this->tinggi = $post['tinggi'];
        if (!empty($_FILES["filefoto"]["name"])) {
            if ($post["oldfoto"] != 'camera.jpg') {
			}
			unlink(FCPATH . 'assets/images/depan/' . $post['oldfoto']);
            $this->gambar = $this->_uploadImage();
        } else {
            $this->gambar = $post["oldfoto"];
		}
		if (!empty($_FILES["filefoto2"]["name"])) {
            if ($post["oldfoto2"] != 'camera.jpg') {
			}
			unlink(FCPATH . 'assets/images/samping2/' . $post['oldfoto2']);
            $this->gambar2 = $this->_uploadImage2();
        } else {
            $this->gambar2 = $post["oldfoto2"];
		}
		if (!empty($_FILES["filefoto3"]["name"])) {
            if ($post["oldfoto3"] != 'camera.jpg') {
			}
			unlink(FCPATH . 'assets/images/samping3/' . $post['oldfoto3']);
            $this->gambar3 = $this->_uploadImage3();
        } else {
            $this->gambar3 = $post["oldfoto3"];
        }
        $this->db->update($this->_table, $this, array("id_produk" => $id_produk));
	}

	public function getById($id_produk)
    {
        return $this->db->get_where($this->_table, ["id_produk" => $id_produk])->row();
    }

	function deleteProduk($id_produk)
    {
        $this->_deleteImage($id_produk);
        $this->_deleteImage2($id_produk);
        $this->_deleteImage3($id_produk);
        return $this->db->delete($this->_table, array("id_produk" => $id_produk));
    }


    private function _deleteImage($id_produk)
	{
    $product = $this->getById($id_produk);
    if ($product->gambar != "camera.jpg") {
	    $filename = explode(".", $product->gambar)[0];
		return array_map('unlink', glob(FCPATH."assets/images/depan/$filename.*"));
    }
	}
	private function _deleteImage2($id_produk)
	{
    $product = $this->getById($id_produk);
    if ($product->gambar2 != "camera.jpg") {
	    $filename = explode(".", $product->gambar2)[0];
		return array_map('unlink', glob(FCPATH."assets/images/samping2/$filename.*"));
    }
	}
	private function _deleteImage3($id_produk)
	{
    $product = $this->getById($id_produk);
    if ($product->gambar3 != "camera.jpg") {
	    $filename = explode(".", $product->gambar3)[0];
		return array_map('unlink', glob(FCPATH."assets/images/samping3/$filename.*"));
    }
	}
	
	private function _uploadImage()
    {
        $config['upload_path']          =  './assets/images/depan/';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}
	
	private function _uploadImage2()
    {
        $config['upload_path']          =  './assets/images/samping2/';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto2']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto2')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
	}
	private function _uploadImage3()
    {
        $config['upload_path']          =  './assets/images/samping3/';
        $config['allowed_types']        = 'gif|jpg|png|JPG';
        $config['max_size']             = 9048;
        $config['overwrite']            = true;
        $config['file_name']            = $_FILES['filefoto3']['name'];
        // 1MB
        // $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('filefoto3')) {
            return $this->upload->data("file_name");
        }

        return "camera.jpg";
    }
	 
}
?>